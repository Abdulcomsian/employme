<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
class SubscriptionController extends Controller
{
    public function index()
    {
        $plans = Plan::get();
  
        return view("owner.plans", compact("plans"));
    }  
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function show(Plan $plan, Request $request)
    {
        $intent = auth()->user()->createSetupIntent();
  
        return view("owner.subscription", compact("plan", "intent"));
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function subscription(Request $request)
    {
        $plan = Plan::find($request->plan);
  
        $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)
                        ->create($request->token);
  
        // return view("subscription_success");
        // toastr()->success('Your have successfully Subscribed the Plan');
        // return redirect()->back();
        return response()->json([
            "status" => true, 
            "message" => "Subscribed Sucessfulyy",
        ]);
    }
}
