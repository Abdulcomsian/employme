<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\EmployerDetails;
use Illuminate\Support\Facades\Validator;
use App\Models\UserSubscription;
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
        $request->validate([
            'payment_type' => 'required|string',
            'reciept' => 'required|file',
            'duration' => 'required|numeric',
        ]);


        $plan = Plan::find($request->plan_id);

        if(!$request->hasFile('reciept'))
        {
            toastr()->error('Please add reciept');
            return redirect()->back();
        }

        $file = $request->file('reciept');
        $filename = time().'-'.str_replace(" ", "_" , $file->getClientOriginalExtension());
        $file->move(public_path('uploads/reciept') , $filename);

        
        UserSubscription::create([
                        'plan_id' => $plan->id, 
                        'payment_type' => $request->payment_type,
                        'user_id' => auth()->user()->id , 
                        'reciept' => $filename , 
                        'duration' => $request->duration
                    ]);


                

        // previous stripe subscription code starts here
        // $userSubscription = User::find(Auth::id())->subscriptions('default')->where('stripe_status',"!=","canceled")->first();
        // $updateEmployerDetails = EmployerDetails::where('user_id',Auth::id())->first();
        // if(!empty($userSubscription))
        // {
        //     if($userSubscription->stripe_price != $plan->stripe_plan)
        //     {
        //         $userSubscription->swap($plan->stripe_plan);
        //         $updateEmployerDetails->update(['subscription_plan_id' => $request->plan_id]);
        //     }
        // }else{
        //     $subscription = $request->user()->newSubscription($request->plan_id, $plan->stripe_plan)
        //     ->create($request->token);
        //     $updateEmployerDetails->update(['subscription_plan_id'=>$request->plan_id]);
        // }
        // subscription code ends here
  
        toastr()->success('Your subscription has been added wait until approved by admin');
        return redirect()->back();
      
    }
}
