<?php

namespace App\Http\Controllers\Admin;

use App\Models\Features;
use App\Models\subscription;

use Illuminate\Http\Request;


class SubscriptionController extends Controller
{
    public function storePlans(Request $request)
    {
        
       
        $request->validate([
            'plan_name' => 'required|string|max:255',
            'plan_type' => 'required|in:Monthly,Yearly',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'features' => 'nullable|array',
            'features.*' => 'string|max:255',

            'status' => 'nullable|in:active,inactive',
        ]);

        // Create subscription
        $subscription = new Subscription();
        $subscription->plan_name = $request->plan_name;
        $subscription->plan_type = $request->plan_type;
        $subscription->price = $request->price;
        $subscription->duration = $request->duration;
        $subscription->status = $request->status ?? 'active'; // default active
        $subscription->save();

        // Store features if any
        if ($request->has('features')) {
            foreach ($request->features as $featureText) {
                Features::create([
                    'subscription_plan_id' => $subscription->id,
                    'features' => $featureText
                ]);
            }
        }

        return redirect()->back()->with('success', 'Subscription plan created successfully.');
    }
}
