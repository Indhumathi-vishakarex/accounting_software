<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Str;


use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function clientRegistration()
    {
        $personalData = session('client_data', []);
        return view('clients.client-registration', compact('personalData'));
    }
    // public function clientList()
    // {
    //     $clients = User::latest()->get();
    //     return view('clients.clients-list', compact('clients'));
    //      $perPage = $request->get('per_page', 12); 
    // $clients = User::latest()->paginate($perPage);
    // }
    public function clientList(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $clients = User::latest()->paginate($perPage);

        return view('clients.clients-list', compact('clients'));
    }


    public function clientProfile($id)
    {
        $client = User::findOrFail($id);

        
        $purchases = Purchase::where('user_id', $id)->orderBy('invoice_date', 'desc')->get();
       

        return view('clients.client-profile', compact('client', 'purchases'));
    }
    public function editClient($id)
    {
        $client = User::findOrFail($id);


        return view('clients.client-edit', compact('client'));
    }

    public function previewStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            // 'phone' => 'required|numeric',
            'phone' => 'required|regex:/^[0-9]{10}$/',

            'password' => 'required|min:6',
            'business_name' => 'required|string',
            'business_no' => 'required|regex:/^[0-9]{10}$/',
            'trading_name' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'post_code' => 'required|string',
            'business_date' => 'required|date',
            'book_date' => 'required|date',
            'vat_register' => 'required|in:yes,no',
            'vat_scheme' => 'nullable|in:Accrual Based,Cash Based,Flat Rate',

            'vat_reg_no' => 'nullable|string',
            'vat_date' => 'nullable|date',
            'vat_type' => 'nullable|string',
            'profile' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20048',
        ]);


        $validated['password_plain'] = $request->password;



        if ($request->hasFile('profile')) {
            $fileName = time() . '_' . uniqid() . '.' . $request->file('profile')->getClientOriginalExtension();
            $request->file('profile')->move(public_path('photos'), $fileName);
            $validated['profile_path'] = 'photos/' . $fileName;
        }


        session(['client_data' => $validated]);



        return view('clients.preview-store', ['data' => $validated]);
    }

    public function activateClient($email, $code)
    {

        $client = User::where('email', $email)
            ->where('email_verification_code', $code)
            ->first();

        if (!$client) {

            return redirect()->route('client-registration')->with('error', 'Invalid or expired activation link.');
        }

        if ($client->email_verified_at) {

            return redirect()->route('client-registration')->with('info', 'Email already verified.');
        }

        $client->email_verified_at = now();
        $client->email_verification_code = null;
        $client->save();

        return redirect()->route('client-list')->with('success', 'Your account has been activated successfully!');
    }





    public function storeClient()
    {
        $data = session('client_data');

        if (!$data) {
            return redirect()->back()->with('error', 'No client data found in session.');
        }

        // Generate email verification code (UUID format)
        $bytes = random_bytes(16);
        $bytes[6] = chr(ord($bytes[6]) & 0x0f | 0x40);
        $bytes[8] = chr(ord($bytes[8]) & 0x3f | 0x80);
        $emailVerificationCode = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($bytes), 4));

        $client = new User();
        $client->name = $data['name'];
        $client->last_name = $data['last_name'];
        $client->email = $data['email'];
        $client->phone = $data['phone'];
        $client->password = bcrypt($data['password_plain']);
        $client->business_name = $data['business_name'];
        $client->business_no = $data['business_name'];
        $client->trading_name = $data['trading_name'];
        $client->address = $data['address'];
        $client->city = $data['city'];
        $client->state = $data['state'];
        $client->country = $data['country'];
        $client->post_code = $data['post_code'];
        $client->business_date = $data['business_date'];
        $client->book_date = $data['book_date'];
        $client->vat_register = $data['vat_register'];
        $client->vat_scheme = $data['vat_scheme'] ?? null;
        $client->vat_reg_no = $data['vat_reg_no'] ?? null;
        $client->vat_date = $data['vat_date'] ?? null;
        $client->vat_type = $data['vat_type'] ?? null;
        $client->profile = $data['profile_path'] ?? null;
        $client->email_verification_code = $emailVerificationCode;

        $client->save();

        $activationLink = route('client.activate', [
            'email' => $client->email,
            'code' => $emailVerificationCode
        ]);



        Mail::send('clients.client-verification', [
            'client' => $client,
            'verificationLink' => $activationLink
        ], function ($message) use ($client) {
            $message->from('no-reply@winngoopages.co.uk', 'Accounting Software');
            $message->to($client->email, $client->name)
                ->subject('Accounting Software - Verify Your Account');
        });

        // Clear session
        session()->forget('client_data');

        return redirect()->route('client-registration')
            ->with('success', 'Client registered successfully! Activation link sent to email.');
    }
}
