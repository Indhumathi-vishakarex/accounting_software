<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paymentlists;


class SubscriptionController extends Controller
{
    //
    public function getPaymentList()
    {
        $paymentList = Paymentlists::all(); 
        return response()->json([
            'success' => true,
            'data' => $paymentList
        ]);
    }

    public function renewSubscription(Request $request)
{
    $validator = Validator::make($request->all(), [
        'user_id' => 'required|exists:users,id',
        'payment_list_id' => 'required|exists:payment_list,id',
        'stripe_token' => 'required|string',
        'total_amount' => 'required|numeric|min:0.5',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    try {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $charge = \Stripe\Charge::create([
            "amount" => $request->total_amount * 100,
            "currency" => "gbp",
            "source" => $request->stripe_token,
            "description" => "Renewal Payment for Subscription"
        ]);

        $user = User::find($request->user_id);

        // Save renewal payment
        Payments::create([
            'user_id' => $user->id,
            'card_holder_name' => $charge->payment_method_details->card->name ?? 'N/A',
            'card_last_four' => $charge->payment_method_details->card->last4 ?? '****',
            'exp_month' => $charge->payment_method_details->card->exp_month ?? 0,
            'exp_year' => $charge->payment_method_details->card->exp_year ?? 0,
            'stripe_payment_id' => $charge->id,
            'amount' => $charge->amount / 100,
            'currency' => 'GBP',
            'status' => 'renewed'
        ]);

        // Optionally update user table with renewal date
        $user->update([
            'payment_list_id' => $request->payment_list_id,
            'subscription_renewed_at' => now()
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Subscription renewed successfully.'
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Renewal failed: ' . $e->getMessage()
        ], 500);
    }
}

}
