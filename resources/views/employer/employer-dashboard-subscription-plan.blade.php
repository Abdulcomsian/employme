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
        <span><b>Total Spent: </b></span><spa>{{employerSpentAmount()}} USD</span>
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
                            <h3 class="price m0">${{$userSubscription->plan->price}}</h3>
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
                <div class="col-lg-4 col-md-6">
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
                        <div class="price fw-500"><sub>$</sub> 27.<sup>99</sup></div>
                        <ul class="style-none">
                            <li>30 job posting </li>
                            <li>15 featured job </li>
                            <li>Job post live for 60 days </li>
                        </ul>
                        <a href="#" class="get-plan-btn tran3s w-100 mt-30">Choose Plan</a>
                    </div>
                    <!-- /.pricing-card-one -->
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card-one border-0 mt-25">
                        <div class="pack-name">Diamond</div>
                        <div class="price fw-500"><sub>$</sub> 39.<sup>99</sup></div>
                        <ul class="style-none">
                            <li>60 job posting </li>
                            <li>30 featured job </li>
                            <li>Job post live for 130 days </li>
                        </ul>
                        <a href="#" class="get-plan-btn tran3s w-100 mt-30">Choose Plan</a>
                    </div>
                    <!-- /.pricing-card-one -->
                </div>
            </div>
        </section>
        <!-- ./pricing-section -->
    </div>
</div>
@endsection