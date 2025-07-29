<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\PasswordReset;
use Illuminate\Support\Carbon;
use Mail;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
     $request->validate([
         'email' => 'required|email',
         'password' => 'required|min:8',
     ]);
 
     $user = User::where('email', $request->email)->first();
 
     if (!$user) {
         return response()->json(['success' => false, 'message' => 'User not found'], 404);
     }
 
     if ($user->status != 'approved') {
         return response()->json([
             'success' => false,
             'message' => 'Your application is now under review, and you can expect a decision within 7 to 28 days. We appreciate your patience during this process.',
         ], 403);
     }
 
     if (!Hash::check($request->password, $user->password)) {
         return response()->json(['success' => false, 'message' => 'Invalid email or password'], 401);
     }
 
   
     
        $plainTextToken = $user->createToken('merchant-api-token')->plainTextToken;
     return response()->json([
         'success' => true,
         'message' => 'Login successful',
         'token' => $plainTextToken,
         
     ]);
    }

    public function forgotpassword(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users,email'
    ]);

    $otp = rand(100000, 999999);
   $token = Str::random(64);
    PasswordReset::updateOrCreate(
        ['email' => $request->email],
        [
            'token' =>$token,
            'otp' => $otp,
            'is_verified' => false,
            'expires_at' => Carbon::now()->addMinutes(10)
        ]
    );

    // Send Mail
    Mail::send('emails.forgototp', ['otp' => $otp], function ($m) use ($request) {
        $m->from('no-reply@winngoopages.co.uk', 'Accounting Software');
        $m->to($request->email)->subject('Your OTP for Password Reset');
    });

    return response()->json(['message' => 'OTP sent to your email.']);
}

public function verifyotp(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'otp' => 'required|digits:6'
    ]);

    $reset = PasswordReset::where('email', $request->email)->first();

    if (!$reset) {
        return response()->json(['message' => 'OTP not found.'], 404);
    }

    if (now()->greaterThan($reset->expires_at)) {
        return response()->json(['message' => 'OTP expired.'], 400);
    }

    if ($reset->otp != $request->otp) {
        return response()->json(['message' => 'Invalid OTP.'], 400);
    }

    $reset->is_verified = true;
    $reset->save();

    return response()->json(['message' => 'OTP verified successfully.']);
}


public function resetPassword(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users,email',
        'password' => 'required|confirmed|min:6',
    ]);

    $reset = PasswordReset::where('email', $request->email)
                          ->where('is_verified', true)
                          ->first();

    if (!$reset) {
        return response()->json(['message' => 'OTP not verified or expired.'], 400);
    }

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return response()->json(['message' => 'User not found.'], 404);
    }

    $user->password = Hash::make($request->password); 
    $user->save();

    $reset->delete();

    return response()->json([
        'status' => true,
        'message' => 'Password has been reset successfully.'
    ]);
}


public function logout(Request $request)
{
   
    $request->user()->currentAccessToken()->delete();

    return response()->json([
        'status' => true,
        'message' => 'Successfully logged out'
    ]);
}

public function profile()
{
    $employerProfile = Auth::guard('api')->user(); 

    if (!$employerProfile) {
        return response()->json([
            'success' => false,
            'message' => 'Unauthorized access.'
        ], 401);
    }

    return response()->json([
        'success' => true,
        'data' => $employerProfile
    ]);
}


        
    public function changepassword(Request $request)
{
       $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:6|confirmed',
    ]);

    $client =  Auth::guard('api')->user(); 

   
    if (!Hash::check($request->current_password, $client->password)) {
        return response()->json([
            'status' => 'error',
            'message' => 'Current password is incorrect.'
        ], 400);
    }

    
    $client->password = Hash::make($request->new_password);
    $client->save();

    return response()->json([
        'status' => 'success',
        'message' => 'Password changed successfully.'
    ]);
}


}
