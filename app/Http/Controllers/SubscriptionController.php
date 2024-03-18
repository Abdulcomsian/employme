<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\EmployerDetails;
use Illuminate\Support\Facades\Validator;
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
        // dd($request->all());
        // $validator = Validator::make($request->all(), [
        //     'terms_and_conditions_acceptance' => 'required|in:I Accept',
        // ]);
  
        // if ($validator->fails()){
        //     return response()->json([
        //             "status" => false,
        //             "errors" => $validator->errors()
        //         ]);
        // }
        $plan = Plan::find($request->plan_id);
        $userSubscription = User::find(Auth::id())->subscriptions('default')->first();
        $updateEmployerDetails = EmployerDetails::where('user_id',Auth::id())->first();
        if(!empty($userSubscription))
        {
            if($userSubscription->stripe_price != $plan->stripe_plan)
            {
                $userSubscription->swap($plan->stripe_plan);
                $updateEmployerDetails->update(['subscription_plan_id'=>$request->plan_id]);
            }
        }else{
            $subscription = $request->user()->newSubscription($request->plan_id, $plan->stripe_plan)
            ->create($request->token);
            $updateEmployerDetails->update(['subscription_plan_id'=>$request->plan_id]);
        }
        
  
        // return view("subscription_success");
        toastr()->success('Your have successfully Subscribed the Plan');
        return redirect()->back();
        // return response()->json([
        //     "status" => true, 
        //     "message" => "Subscribed Sucessfulyy",
        //     "redirect" => url("employer/employer-profile")
        // ]);
    }
}
