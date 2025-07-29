<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Payments;
use App\Models\Paymentlists;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;

class RegisterController extends Controller
{
    //
    // update teh ocde 
    // public function register(Request $request)
    // {
    //       $fileName = null;
    //     $validator = Validator::make($request->all(), [
    //         'payment_list_id' => 'required|integer|exists:payment_list,id',
    //         'name' => 'required|string|max:255',
    //         'last_name' => 'required|string|max:255',
    //         'phone' => 'required|string|min:10|max:15',
    //         'business_name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users,email',
    //         'email_confirmation' => 'required|string|email|max:255|same:email', 
    //         'password' => 'required|string|min:8|confirmed',
    //         'business_no' => 'nullable|string|max:255',
    //         'trading_name' => 'nullable|string|max:255',
    //         'address' => 'nullable|string|max:255',
    //         'city' => 'required|string|max:255',
    //         'state' => 'required|string|max:255',
    //         // 'post_code' => 'required|string',
    //         'post_code' => [
    //             'required',
    //             'string',
    //             'regex:/^([A-Z]{1,2}[0-9][0-9A-Z]? ?[0-9][A-Z]{2})$/i'
    //         ],
            
    //         'country' => 'required|string|max:255',
    //         'stripe_token' => 'required|string',
    //         'total_amount' => 'required|numeric|min:0.5',
    //         'profile' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
    //         'business_date' => 'required|date',
    //         'book_date' => 'required|date',
    //         'vat_register' => 'required|in:Yes,No',

    //     ]);

   
       
    //     if ($request->hasFile('profile')) {
    //         $fileName = time() . '_' . uniqid() . '.' . $request->file('profile')->getClientOriginalExtension();
    //         $request->file('profile')->move(public_path('photos'), $fileName);
    //     }
        

    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()], 422);
    //     }

    //     try {
    //         Stripe::setApiKey(env('STRIPE_SECRET'));
            
    //           $charge = \Stripe\Charge::create([
    //             "amount" => $request->total_amount * 100,
    //             "currency" => "gbp",
    //             "source" => $request->stripe_token,
    //             "description" => "Accounting Software Payment"
    //         ]);
    //         // Generate verification code
    //       $data = random_bytes(16);
    //     assert(strlen($data) == 16);
    //     $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    //     $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    //     $guid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));


    //         // Create Employer
    //         $user = User::create([
    //             'payment_list_id' => $request->payment_list_id,
    //             'email' => $request->email,
    //             'email_verification_code' => $guid,
    //             'email_verification_code_gen_date' => date('Y-m-d H:i:s'),
    //             'email_verified_at' =>  null,
    //             'email_verified_at' => null,
    //             'password' => Hash::make($request->password),
    //             'name' => $request->name,
    //             'last_name' => $request->last_name,
    //             'phone' => $request->phone,
    //             'business_name' => $request->business_name,
    //             'business_no' => $request->business_no,
    //             'trading_name' => $request->trading_name,
    //             'address' => $request->address,
    //             'city' => $request->city,
    //             'state' => $request->state,
    //             'post_code' => $request->post_code,
    //             'country' => $request->country,
    //             'profile' => $fileName ? 'photos/' . $fileName : null,
    //             'business_date' => $request->business_date,
    //             'book_date' => $request->book_date,
    //             'vat_register' => $request->vat_register,
    //             'vat_scheme' => $request->vat_scheme,
    //             'vat_reg_no' => $request->vat_reg_no,
    //             'vat_date' => $request->vat_date,
    //             'vat_type' => $request->vat_type,
    //         ]);
            

          

    //         Payments::create([
    //             'user_id' => $user->id,
    //             'card_holder_name' => $charge->payment_method_details->card->name ?? 'N/A',
    //             'card_last_four' => $charge->payment_method_details->card->last4 ?? '****',
    //             'exp_month' => $charge->payment_method_details->card->exp_month ?? 0,
    //             'exp_year' => $charge->payment_method_details->card->exp_year ?? 0,
    //             'stripe_payment_id' => $charge->id,
    //             'amount' => $charge->amount / 100,
    //             'currency' => 'GBP',
    //             'status' => 'successful'
    //         ]);

          

    //         Mail::send('emails.user_verification', [
    //         'fname' => $request->name,
    //         'lname' => $request->last_name,
    //         'guid' => $guid, 
    //         'email' => $request->email 
    //     ], function ($m) use ($request) {
    //         $m->from('no-reply@winngoopages.co.uk', 'Accounting Software');
    //         $m->to($request->email, $request->firstname . ' ' . $request->last_name)
    //           ->subject('Accounting Software - Account Verification Link');
    //     });


    //           Mail::send('emails.user_register', [
    //             'fname' => $request->name,
    //             'lname' => $request->last_name,
    //             'email' => encrypt($request->email)
    //         ], function ($m) use ($request) {
    //             $m->from('info@wimbgo.com', 'Accounting Software');
    //             $m->to($request->email, $request->firstname . ' ' . $request->last_name)
    //               ->subject('Payment Successful - Application Under Review');
    //         });

    //       return response()->json([
    //         'message' => 'Payment completed successfully.Your application is now under review, and you can expect a decision within 7 to 28 days. We appreciate your patience during this process.'
    //     ],201);


    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Registration failed: ' . $e->getMessage()
    //         ], 500);
    //     }
    // }
    
 public function register(Request $request)
    {
           $fileName = null;
        $validator = Validator::make($request->all(), [
           'payment_list_id' => 'required|integer|exists:payment_list,id',
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|min:10|max:15',
            'business_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'email_confirmation' => 'required|string|email|max:255|same:email', 
            'password' => 'required|string|min:8|confirmed',
            'business_no' => 'nullable|string|max:255',
            'trading_name' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            // 'post_code' => 'required|string',
            'post_code' => [
                'required',
                'string',
                'regex:/^([A-Z]{1,2}[0-9][0-9A-Z]? ?[0-9][A-Z]{2})$/i'
            ],
            
            'country' => 'required|string|max:255',
            'stripe_token' => 'required|string',
            'total_amount' => 'required|numeric|min:0.5',
            'profile' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'business_date' => 'required|date',
            'book_date' => 'required|date',
            'vat_register' => 'required|in:Yes,No',

        ]);

   
       
        if ($request->hasFile('profile')) {
            $fileName = time() . '_' . uniqid() . '.' . $request->file('profile')->getClientOriginalExtension();
            $request->file('profile')->move(public_path('photos'), $fileName);
        }
        

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            
              $charge = \Stripe\Charge::create([
                "amount" => $request->total_amount * 100,
                "currency" => "gbp",
                "source" => $request->stripe_token,
                "description" => "Accounting Software Payment"
            ]);
            // Generate verification code
          $data = random_bytes(16);
        assert(strlen($data) == 16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
        $guid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));


            // Create Employer
            $user = User::create([
                'payment_list_id' => $request->payment_list_id,
                'email' => $request->email,
                'email_verification_code' => $guid,
                'email_verification_code_gen_date' => date('Y-m-d H:i:s'),
                'email_verified_at' =>  null,
                'email_verified_at' => null,
                'password' => Hash::make($request->password),
                'name' => $request->name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'business_name' => $request->business_name,
                'business_no' => $request->business_no,
                'trading_name' => $request->trading_name,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'post_code' => $request->post_code,
                'country' => $request->country,
                'profile' => $fileName ? 'photos/' . $fileName : null,
                'business_date' => $request->business_date,
                'book_date' => $request->book_date,
                'vat_register' => $request->vat_register,
                'vat_scheme' => $request->vat_scheme,
                'vat_reg_no' => $request->vat_reg_no,
                'vat_date' => $request->vat_date,
                'vat_type' => $request->vat_type,
            ]);
            

          

            Payments::create([
                'user_id' => $user->id,
                'card_holder_name' => $charge->payment_method_details->card->name ?? 'N/A',
                'card_last_four' => $charge->payment_method_details->card->last4 ?? '****',
                'exp_month' => $charge->payment_method_details->card->exp_month ?? 0,
                'exp_year' => $charge->payment_method_details->card->exp_year ?? 0,
                'stripe_payment_id' => $charge->id,
                'amount' => $charge->amount / 100,
                'currency' => 'GBP',
                'status' => 'successful'
            ]);

            $invoice = Invoice::create([
                'user_id' => $user->id,
                'invoice_id' => 'INV-'.rand(10000,99999),
                'amount' => $charge->amount / 100,
                'type' =>'paid'
                ]);

                $invoice_id = $invoice -> invoice_id;
                $amount = $invoice -> amount;
                if (isset($amount)) {
                    // Format the amount to 2 decimal places
                    $formattedAmount = number_format($amount, 2, '.', '');
                } else {
                   
                    $formattedAmount = '0.00'; 
                }
// $business_data = Paymentlists::where('id', $user->payment_list_id)->first();
$business_data = Paymentlists::find($user->payment_list_id)->first();
                // $business_data =  Paymentlists::where('id',$user->payment_list_id)->first();
               $invoiceData = [
    'fname' => $request->name,
    'lname' => $request->last_name,
    'invoice_id' => $invoice->invoice_id,
    'amount' => number_format($invoice->amount, 2, '.', ''),
    'date' => now()->format('Y-m-d'),
    'description' => $charge->description,
    'currency' => strtoupper($charge->currency),
    'type' => $business_data->type ?? 'N/A'
];

$pdf = PDF::loadView('emails.invoice_paid', $invoiceData);

$filename = 'invoice_' . time() . '.pdf';
$pdfPath = 'invoices/' . $filename;

$pdf->save(public_path($pdfPath));

$invoice->invoice_path = $pdfPath;
$invoice->save();
    

            Mail::send('emails.user_verification', [
            'fname' => $request->name,
            'lname' => $request->last_name,
            'guid' => $guid, 
            'email' => $request->email 
        ], function ($m) use ($request) {
            $m->from('no-reply@winngoopages.in', 'Accounting Software');
            $m->to($request->email, $request->firstname . ' ' . $request->last_name)
              ->subject('Accounting Software - Account Verification Link');
        });


            //   Mail::send('emails.user_register', [
            //     'fname' => $request->name,
            //     'lname' => $request->last_name,
            //     'email' => encrypt($request->email)
            // ], function ($m) use ($request) {
            //     $m->from('info@wimbgo.com', 'Accounting Software');
            //     $m->to($request->email, $request->firstname . ' ' . $request->last_name)
            //       ->subject('Payment Successful - Application Under Review');
            // });

        //   return response()->json([
        //     'message' => 'Payment completed successfully.Your application is now under review, and you can expect a decision within 7 to 28 days. We appreciate your patience during this process.'
        // ]);
        Mail::send('emails.user_register', ['fname' => $request->name, 'lname' => $request->last_name, 'email' => encrypt($request->email)], function ($m) use ($request,  $filename) {
            $m->from('no-reply@winngoopages.in', 'Accounting Software');
            $m->to($request->email, $request->firstname . ' ' . $request->last_name)->subject('Payment Successful - Application Under Review');
            $m->attach(public_path('invoices/' . $filename));
        });
       return response()->json([
        'message' => 'Payment completed successfully.<br/>An account verification link has been sent to your email address.Please click on the link to complete the sign up process.',
        'download_url' => asset($pdfPath),
       ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Registration failed: ' . $e->getMessage()
            ], 500);
        }
    }

    public function checkEmail(Request $request) 
    {
       $exists = User::where('email', $request->email)->exists();
        return response()->json(['exists' => $exists]);
    }

    public function verifyEmail($email, $guid)
    {
        try {
            $user = User::where('email', $email)
                ->where('email_verification_code', $guid)
                ->first();

            if (!$user) {
                return redirect('/')->with('error', 'Invalid verification link.');
            }

            if ($user->email_verified_at) {
                return redirect('/')->with('info', 'Email already verified.');
            }

            $user->update([
                'email_verified_at' => now(),

            ]);

            return redirect('/')->with('success', 'Email verified successfully! You can now login.');
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Verification failed: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
{
    $profileupdate = User::findOrFail($id);

     if ($request->hasFile('profile')) {
        $fileName = time() . '.' . $request->profile->extension();
        $request->profile->move(public_path('photos'), $fileName);
        $profileupdate->profile = 'photos/' . $fileName;
    }

  $fieldsToUpdate = [
     
        'business_name',
        'trading_name',
        'business_no',
        'address',
        'city',
        'post_code',
        'country',
        'state',
        'phone'
    ];

    foreach ($fieldsToUpdate as $field) {
        if ($request->has($field)) {
            $profileupdate->$field = $request->$field;
        }
    }

    $profileupdate->save();

    return response()->json([
        'message' => "User data updated successfully.",
        'data' => $profileupdate
    ]);
}


}
