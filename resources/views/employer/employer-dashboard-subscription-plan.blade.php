@extends('employer.layout.main')

@section('title')
Subscription Plan
@endsection

@section('content')

<div class="dashboard-body">
    <div class="position-relative">
         <!-- ************************ Header **************************** -->
		 	@include('employer.layout.header_menu')
        <!-- End Header -->

        <h2 class="main-title">Membership</h2>
        <span><b>Total Spent: </b></span><spa>{{employerSpentAmount()}} ₩</span>
        <div class="membership-plan-wrapper mb-20">
            @if($userSubscription)
            <div class="row gx-0">
                <div class="col-xxl-7 col-lg-6 d-flex flex-column">
                    <div class="column w-100 h-100">
                        <h4>Current Plan ({{$userSubscription->plan->name}})</h4>
                        <p>Unlimited access to our legal document library and online rental application tool, billed monthly.</p>
                    </div>
                </div>
                <div class="col-xxl-5 col-lg-6 d-flex flex-column">
                    <div class="column border-left w-100 h-100">
                        <div class="d-flex">
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
            @endif
        </div>
        <!-- /.membership-plan-wrapper -->

        <section class="pricing-section">
            <div class="row justify-content-center">
               {{-- <div class="col-lg-4 col-md-6">
                    <div class="pricing-card-one border-0 mt-25">
                        <div class="pack-name">Standard</div>
                        <div class="price fw-500">0</div>
                        <ul class="style-none">
                            <li>15 job posting </li>
                            <li>7 featured job </li>
                            <li>Job post live for 30 days </li>
                        </ul>
                        <a href="#" class="get-plan-btn tran3s w-100 mt-30">Choose Plan</a>
                    </div>
                    <!-- /.pricing-card-one -->
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card-one popular-two mt-25">
                        <div class="popular-badge">popular</div>
                        <div class="pack-name">Gold</div>
                        <div class="price fw-500"><sub>₩</sub> 27.<sup>99</sup></div>
                        <ul class="style-none">
                            <li>30 job posting </li>
                            <li>15 featured job </li>
                            <li>Job post live for 60 days </li>
                        </ul>
                        <a href="#" class="get-plan-btn tran3s w-100 mt-30">Choose Plan</a>
                    </div>
                    <!-- /.pricing-card-one -->
                </div>--}}
                @isset($allPlans)
                @foreach($allPlans as $index=>$plan)
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card-one border-0 mt-25">
                        <div class="pack-name">{{$plan->title}}</div>
                        <div class="price fw-500"><sub>₩</sub> {{$plan->price/1000}}K<!--<sup>99</sup>--></div>
                        <ul class="style-none">
                            <li>{{$plan->duration}} {{$plan->duration > 1 ? 'Months' : 'Month'}} Duration </li>
                            <li>60 job posting </li>
                            <li>30 featured job </li>
                            <li>Job post live for 130 days </li>
                        </ul>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#RescheduleRequestModal" class="get-plan-btn tran3s w-100 mt-30 change-plan-id" id="{{$plan->id}}" onclick = "changePlan({{$plan->id}})" >Choose Plan</a>
                    </div>
                    <!-- /.pricing-card-one -->
                </div>
                @endforeach
                @endisset
            </div>
        </section>
        <!-- ./pricing-section -->
    </div>
</div>
<div class="modal fade" id="RescheduleRequestModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="container">
            <div class="user-data-form modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center">
                    <h3>Reschedule Form</h3>
                </div>
                <div class="form-wrapper m-auto">
                    <form  id = "payment-form" action = "{{route('subscription.create')}}" method = "POST">
                        @csrf
                        <input type = "hidden" id = "plan_id" name = "plan_id" value = "">
                        <div id="interview-request-errors-list"></div>
                        <div class="row">
                                    <div class="col-md-12">
											<label for="">Card details</label>
											<div id="card-element"></div>
									</div>
                          
                        
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
</script>

@endpush
@endsection