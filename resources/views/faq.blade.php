@extends('components.master')

@section('content')


<div class="section blog-post">
    <div class="container titles w-container">
      <h1 class="heading-large">Your questions answered.</h1>
    </div>
  </div>
  <div class="section">
    <div class="container inner-padding-medium w-container">
      <div class="w-layout-grid main-grid">
        <div id="w-node-e2859498-0993-2f9f-534e-3b34e3fb87e5-e3fb87e4" class="grid-wrapper sticky-faq">
          <h3 class="heading-medium">Frequently asked questions</h3>
        </div>
        <div id="w-node-e2859498-0993-2f9f-534e-3b34e3fb87e8-e3fb87e4" class="content-wrapper">
          <div class="faq-wrapper">
            <a href="#" class="faq-link w-inline-block">
              <h3 class="heading-regular">How Payments Work</h3>
              <div class="faq-icon"><img src="{{asset('assets/images/cta-arrow-black.svg')}}" loading="lazy" alt="" class="plus-icon"></div>
            </a>
            <div class="faq-container">
              <p class="main-paragraph"> <strong>Subscription Plans</strong> <br> Every subscription plan incurs a monthly billing cycle and dictates the required payment for continued access to the platform. For example, if you opt for the Basic Candidate Access plan, you will be billed $59 each month for access to the platform. Additionally, upon the successful visa approval of a candidate, a charge of $700 will apply. Please note that you have the flexibility to cancel your subscription at any time. However, we recommend reviewing our cancellation policy for comprehensive details.</p>
            </div>
            <br> 
            <div class="faq-container">
              <p class="main-paragraph"> <strong>Pay-Per-Hire</strong> <br> The payment corresponding to candidate hiring is contingent on the chosen subscription plan. Crucially, charges are applied upon the successful approval of the final visa.</p>
            </div>
          </div>
          <div class="faq-wrapper">
            <a href="#" class="faq-link w-inline-block">
              <h3 class="heading-regular">Cancellations</h3>
              <div class="faq-icon"><img src="{{asset('assets/images/cta-arrow-black.svg')}}" loading="lazy" alt="" class="plus-icon"></div>
            </a>
            <div class="faq-container">
              <p class="main-paragraph"><strong>Basic Candidate Access</strong> <br> Cancellation Fee (Before Visa Approval): If the employer cancels the subscription after signing the employment contract with a candidate, the employer shall be liable to pay 40% of the pay-per-hire fee as a cancellation penalty. <br> <br> Cancellation Fee (After Visa Approval): If the employer cancels the subscription after visa approval but before the teacher's employment starts, the employer shall be liable to pay the full pay-per-hire fee of $700. </p>
            </div>
            <div class="faq-container">
              <p class="main-paragraph"><strong>Advance Candidate Access</strong> <br> Cancellation Fee (Before Visa Approval): If the employer cancels the subscription after signing the employment contract with a candidate, the employer shall be liable to pay 40% of the pay-per-hire fee as a cancellation penalty. <br> <br> Cancellation Fee (After Visa Approval): If the employer cancels the subscription after visa approval but before the teacher's employment starts, the employer shall be liable to pay the full pay-per-hire fee of $650. </p>
            </div>
            <div class="faq-container">
              <p class="main-paragraph"><strong>Jobs Marketplace Access</strong> <br> Cancellation Fee (Before Visa Approval): If the employer cancels the subscription after signing the employment contract with a candidate, the employer shall be liable to pay 50% of the pay-per-hire fee as a cancellation penalty. <br> <br> Cancellation Fee (After Visa Approval): If the employer cancels the subscription after visa approval but before the teacher's employment starts, the employer shall be liable to pay the full pay-per-hire fee of $800. </p>
            </div>
            <div class="faq-container">
              <p class="main-paragraph"><strong>Combined Marketplace Access</strong> <br> Cancellation Fee (Before Visa Approval): If the employer cancels the subscription after signing the employment contract with a candidate, the employer shall be liable to pay 50% of the pay-per-hire fee as a cancellation penalty. <br> <br> Cancellation Fee (After Visa Approval): If the employer cancels the subscription after visa approval but before the teacher's employment starts, the employer shall be liable to pay the full pay-per-hire fee of $600. </p>
            </div>
            <div class="faq-container">
              <p class="main-paragraph"><strong>Flexi Plan</strong> <br>Cancellation Fee (Before Visa Approval):  If the employer cancels the subscription after signing the employment contract with a candidate, the employer shall be liable to pay 800,000 won as a cancellation penalty. <br> <br>Cancellation Fee (After Visa Approval): If the employer cancels the subscription after visa approval but before the teacher's employment starts, the employer shall be liable to pay 1 million won as a cancellation fee.</p>
            </div>
          </div>
          <div class="faq-wrapper">
            <a href="#" class="faq-link w-inline-block">
              <h3 class="heading-regular">Visa Support</h3>
              <div class="faq-icon"><img src="{{asset('assets/images/cta-arrow-black.svg')}}" loading="lazy" alt="" class="plus-icon"></div>
            </a>
            <div class="faq-container">
              <p class="main-paragraph"><strong>What's included</strong> <br>30-minute visa consultation aimed at educating employers on the visa process <br> <br>Our team will liaise with the candidate to ensure the accurate submission of required documents. <br> <br> Comprehensive guidance to candidates regarding visa-related steps and the specifics of items to be sent to the academy. <br> <br>Visa support becomes accessible upon the formal signing of an employment contract. <br> <br> Thorough validation and background verification of submitted documents. </p>
            </div>
            <div class="faq-container">
              <p class="main-paragraph"> <strong>What's NOT INCLUDED </strong> Employme does not facilitate or manage candidate flight bookings or travel arrangements. <br> <br> Visa assistance services are available exclusively during standard business hours, from Monday to Friday, spanning 9:00 am to 6:00 pm. <br> <br>Each subscription plan outlines a specific quota for the number of teachers eligible to receive visa application support. <br> <br> Our assistance is confined to matters directly pertinent to the visa approval process, and extends no further than the purview of such activities. </p>
            </div>
          </div>

          <div class="faq-wrapper">
            <a href="#" class="faq-link w-inline-block">
              <h3 class="heading-regular">Refund & Billing Policy</h3>
              <div class="faq-icon"><img src="{{asset('assets/images/cta-arrow-black.svg')}}" loading="lazy" alt="" class="plus-icon"></div>
            </a>
            <div class="faq-container">
              <p class="main-paragraph"><strong>Subscription Refunds </strong> <br> You have a grace period of 15 days for subscription refunds. After this period, refunds for the subscription fee will not be available. </p>
            </div>
            <div class="faq-container">
              <p class="main-paragraph"> <strong>Pay-Per-Hire Fee</strong> <br> The Pay-Per-Hire fee becomes due upon the approval of the candidate's visa. Payment is required within 10 days from this approval date. Failure to meet this payment deadline grants Employme the right to pursue collection in accordance with Korean law. In cases of delayed payment, the employer has a further 15 business days from the initial due date to settle the outstanding amount before any non-payment actions are initiated by Employme. <br> <br> Please refer to our Terms of Service and Agreement for a thorough explanation of our refund and billing policies. </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div>
  </div>


@endsection