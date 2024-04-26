@extends('employer.layout.main')

@section('title')
Subscription Plan
@endsection

@section('page-head')
    <style>
        #plan{
            width: 200px!important;
        }
        #plan-choose-btn{
            width: 130px!important;
            background: #ff715b;
            color: white;
        }
        .nice-select {
            width: 300px;
        }
    </style>
@endsection
@section('content')

<div class="dashboard-body">
    <div class="position-relative">
         <!-- ************************ Header **************************** -->
		 	@include('employer.layout.header_menu')
        <!-- End Header -->

        <h2 class="main-title">Membership</h2>
        <span><b>Total Spent: </b></span><spa>{{employerSpentAmount()}} ₩</span>
        @if($userSubscription && $userSubscription->plan)
        <div class="membership-plan-wrapper mb-20">
            <div class="row gx-0">
                <div class="col-xxl-6 col-lg-6 d-flex flex-column">
                    <div class="column w-100 h-100">
                        <h4>Current Plan ({{$userSubscription->plan->name}})</h4>
                        <p>Unlimited access to our legal document library and online rental application tool, billed monthly.</p>
                    </div>
                </div>
                <div class="col-xxl-6 col-lg-6 d-flex flex-column">
                    <div class="column border-left w-100 h-100">
                        <div class="">
                            <h3 class="price m0">₩{{$userSubscription->plan->price}}</h3>
                            <div class="ps-4 flex-fill">
                                <h6>Monthly Plan</h6>
                                <span class="text1 d-block">Your subscription renews <span class="fw-500">{{$userSubscription->renewal_date}}</span></span>
                                <a href="#" onclick="event.preventDefault();
                                                                document.getElementById('destroy-form').submit();" class="cancel-plan tran3s">Cancel Current Plan</a>
                            </div>
                            <form id="destroy-form" action="{{route('cancelSubscription')}}" method="POST" style="display: none;">
                                    @csrf
                                <input type="hidden" name="subscription_id" value="{{$userSubscription->id}}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row my-5">
            <div class="col-md-12">
                <div class="d-flex justify-content-center">
                    <div class="d-flex flex-column">
                        <label for="plan" class="text-start my-2"><strong>Choose Plan</strong></label><br>
                        <div class="d-flex">
                            <select name="plan" id="plan" class="nice-select">
                                <option value="">Select Plan</option>
                                @foreach($allPlans as $index => $plan)
                                <option value="{{$plan->id}}">{{$plan->price/1000}}K</option>
                                @endforeach
                            </select>
                            <button class="btn mx-3" id="plan-choose-btn">Choose</button>
                        </div>
                        <div id="plan-detail">
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif


        <!-- /.membership-plan-wrapper -->

        <section class="pricing-section">
            <div class="row justify-content-center">
                {{-- @isset($allPlans)
                @foreach($allPlans as $index=>$plan)
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card-one border-0 mt-25">
                        <div class="pack-name">{{$plan->title}}</div>
                        <div class="price fw-500"><sub>₩</sub> {{$plan->price/1000}}K<!--<sup>99</sup>--></div>
                        <ul class="style-none">
                            <li>{{$plan->duration}} {{$plan->duration > 1 ? 'Months' : 'Month'}} Duration </li>
                            <li>{{$plan->allowed_jobs > 1 ? $plan->allowed_jobs.' '.'job posts' : 'Only One Job Post' }}</li>
                            <li>Job post live for 130 days </li>
                        </ul>
                    </div>
                </div>
                @endforeach
                @endisset --}}
            </div>
        </section>
        <!-- ./pricing-section -->
    </div>
</div>
<div class="modal fade" id="SubscriptionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="container">
            <div class="user-data-form modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center">
                    <h3>Subscription Form</h3>
                </div>
                <div class="form-wrapper p-5">
                    <form  id="payment-form" action = "{{route('subscription.create')}}" method="POST">
                        @csrf
                        <input type="hidden" id="plan_id" name="plan_id" value="">
                        <div id="interview-request-errors-list"></div>
                        <div class="row">
                                    <div class="col-md-12 my-2"><label for="">Card details</label><div id="card-element"></div></div>
                          
                        
                            <div class="col-md-6">
                                <button class="btn-submit fw-500 tran3s d-block mt-20" id="card-button" data-secret="{{ $intent->client_secret }}" type = "submit" >
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                
                </div>
                <!-- /.form-wrapper -->
            </div>
            <!-- /.user-data-form -->
        </div>
    </div>
</div>

@push('page-script')
<script src="https://js.stripe.com/v3/"></script>
<script>

   
    
    
  // const form = document.getElementById('payment-form')
  function changePlan(id)
    {
        document.getElementById('plan_id').value = id;
    }
    jQuery(document).ready(function($) {
        $(document).on("click" , "#plan-choose-btn" , function(e){
            let plan = document.getElementById("plan").value;
            if(plan.trim())
            {
                document.getElementById('plan_id').value = plan;
                $("#SubscriptionModal").modal("show");
            }
        })
        
    const stripe = Stripe('{{ env('STRIPE_KEY') }}')
  const elements = stripe.elements()
  const cardElement = elements.create('card')

  cardElement.mount('#card-element')

    const form = document.getElementById('payment-form')
    const cardBtn = document.getElementById('card-button')
    // const cardHolderName = document.getElementById('card-holder-name')
    form.addEventListener('submit', async (e) => {
        e.preventDefault()
  
        cardBtn.disabled = true
        const { setupIntent, error } = await stripe.confirmCardSetup(
            cardBtn.dataset.secret, {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: '{{auth()->user()->name}}'
                    }   
                }
            }
        )
  
        if(error) {
            cardBtn.disable = false
        } else {
            let token = document.createElement('input')
            token.setAttribute('type', 'hidden')
            token.setAttribute('name', 'token')
            token.setAttribute('value', setupIntent.payment_method)
            form.appendChild(token)
            form.submit();
        }
    })
  })
 

    $(document).on("change" , "#plan" , function(e){
        let plan_id = document.getElementById("plan").value;
        if(plan_id)
        {
            $.ajax({
                type : "post",
                url : "{{route('employer.subscription-plan')}}",
                data : { plan_id : plan_id , "_token" : "{{csrf_token()}}"},
                success : function(res){
                    if(res.status){
                        document.getElementById("plan-detail").innerHTML = res.html;
                    }
                }
            })
        }
    })
</script>

@endpush
@endsection