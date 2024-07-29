<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\EmployerDetails;
use Illuminate\Support\Facades\Validator;
use App\Models\UserSubscription;
use Carbon\Carbon;
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

        $validator = Validator::make( $request->all() , [
            'payment_type' => 'required|string',
            'reciept' => 'required_if:payment_type,bank-transfer|file',
            'duration' => 'required|numeric',
            'payee_number' => 'required_if:payment_type,card-payment'
        ]);
        

        if($validator->fails())
        {
            $errors = implode(", ", $validator->errors()->all());
            toastr()->error($errors);
            return redirect()->back();
        }


        $plan = Plan::find($request->plan_id);

        if(!$request->hasFile('reciept'))
        {
            toastr()->error('Please add reciept');
            return redirect()->back();
        }

        $userSubscription = new UserSubscription();
        $userSubscription->user_id =auth()->user()->id;
        $userSubscription->plan_id = $plan->id;
        $userSubscription->duration = $request->duration;
        $userSubscription->payment_type = $request->payment_type;

        if($request->payment_type === "bank-transfer"){
            $file = $request->file('reciept');
            $filename = time().'-'.str_replace(" ", "_" , $file->getClientOriginalName());
            $file->move(public_path('uploads/reciept') , $filename);
            $userSubscription->reciept = $filename;
        }else{
            $userSubscription->mobile_number = $request->payee_number;
        }

        $userSubscription->save();



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
  
        toastr()->success('You subscription has been submitted and is pending approval. We will update you via email once it is approved.');
        return redirect()->back();
      
    }

    public function updateSubscriptionStatus(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'subscriptionId' => 'numeric|required|exists:user_subscriptions,id',
            'status' => 'numeric|required'
        ]);

        if($validator->fails())
        {
            return response()->json(['status' => false , 'error' => $validator->errors()->all()]);
        }

        $userSubscription = UserSubscription::where('id' , $request->subscriptionId)->first();
        if($userSubscription->status == 1){
            $duration = $userSubscription->duration;
            $userSubscription->starts_from = Carbon::now()->format('Y-m-d');
            $userSubscription->ends_at = Carbon::now()->addMonth($duration)->format('Y-m-d');
        }else{
            $userSubscription->starts_from = null;
            $userSubscription->ends_at = null;
        }
        $userSubscription->is_approved = $request->status;
        $userSubscription->save();

        return response()->json(['status' => true , 'msg' => 'Subscription status updated successfully']);

    }
}
