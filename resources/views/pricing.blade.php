@extends('components.master')

<style>
  table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
  }

  th,
  td {
    text-align: center;
    padding: 1% !important;
    border: 1px solid #ddd;

  }

  tr:nth-child(even) {
    background-color: #f2f2f2
  }


  .prices {
    color: #000;
    margin-bottom: 0;
    padding-top: 10px;
    padding-bottom: 10px;
    font-size: 2em !important;
    font-weight: 700;
    line-height: 1;
  }

  .heading-small {
    color: #000;
    margin-top: 3px;
    margin-bottom: 3px;
    /* font-family: Switzer, sans-serif; */
    font-family: Switzer;
    font-size: 1em !important;
    font-weight: 500;
    line-height: 1.25;
  }

  .span-small {
    color: #a5a5a5;
    padding-left: 2px;
    padding-right: 2px;
    font-size: 24px !important;
    font-weight: 400;
  }


  @media screen and (max-width:1000px) {
    .prices {
      font-size: 1.4em !important;
    }

    .span-small {
      font-size: 16px !important;
    }
  }

  @media screen and (max-width:768px) {
    .heading-small {
      font-size: 0.8em !important;
    }

    .prices {
      font-size: 1em !important;
    }

    .span-small {
      font-size: 14px !important;
    }

    th,
    td {
      font-size: 14px;
    }
  }

  @media screen and (max-width:500px) {
    .heading-small {
      font-size: 0.8em !important;
    }

    .prices {
      font-size: 1.29em !important;
    }

    .span-small {
      font-size: 8px !important;
    }

    th,
    td {
      font-size: 8px;
    }
  }
</style>


@section('content')

<!-- 
<div class="section blog-post">
    <div class="container titles w-container">
      <h1 class="heading-large">Unlock Your Hiring Potential</h1>
    </div>
  </div>
  <div class="section">
    <div class="container w-container">
      <div class="w-layout-grid main-grid">
        <div id="w-node-_5b9c4a0e-3173-6e0b-6dc6-29b4273af39d-273af39c" class="gray-wrapper">
          <div class="content-wrapper gap">
            <div class="content-wrapper">
              <h3 class="heading-small outline">Basic Candidate Access</h3>
              <div class="price-wrapper">
                <p class="price large">$59<span class="span-small">/mo</span></p>
                <div class="p-small text-gray">Pay Per Hire Fee $700 <br>
                  To be paid upon the successful approval of the visa <br> <br> <br></div>
              </div>
            </div>

            <div class="content-wrapper gap">
              <a href="#" class="button-1 plan w-inline-block">
                <div>Get Started</div>
              </a>
            </div>
            <div class="list-wrapper">
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div>Access to the Candidate Marketplace</div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div>Visa application support for 2 teacher hires per year</div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div> <strong>
                    Essential customer support </strong> </div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div> Send interview requests</div>
              </div>
            </div>
          </div>
        </div>
        <div id="w-node-eef37878-bfbb-d61f-afae-c7e863fd87b4-273af39c" class="gray-wrapper ">
          <div class="content-wrapper gap">
            <div class="content-wrapper">
              <h3 class="heading-small outline">Jobs Marketplace Access</h3>
              <div class="price-wrapper">
                <p class="price large">$69<span class="span-small">/mo</span></p>
                <div class="p-small text-gray">Pay Per Hire Fee $800 <br>
                  To be paid upon the successful approval of the visa <br> <br> <br></div>
              </div>
            </div>
            <div class="content-wrapper gap">
              <a href="#" class="button-1 plan w-inline-block">
                <div>Get Started</div>
              </a>
            </div>
            <div class="list-wrapper">
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div>
                  Access to the Jobs Marketplace</div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div>Visa application support for each hire</div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div> <strong>Essential customer support </strong> </div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div>Receive interview requests</div>
              </div>
            </div>
          </div>
        </div>
        <div id="w-node-ebd09504-cc8b-1fdb-13b9-0328b773d151-273af39c" class="gray-wrapper">
          <div class="content-wrapper gap">
            <div class="content-wrapper">
              <h3 class="heading-small outline">Flexi Plan</h3>
              <div class="price-wrapper">
                <p class="price large">$39<span class="span-small">/mo</span></p>
                <div class="p-small text-gray">Monthly Pay Per Hire Fee $150 <br>
                  The initial monthly "pay-per-hire fee" is payable on the candidate's start date. Payments stop if
                  employment ends</div>
              </div>
            </div>
            <div class="content-wrapper gap">
              <a href="#" class="button-1 plan w-inline-block">
                <div>Get Started</div>
              </a>
            </div>
            <div class="list-wrapper">
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div>Candidate Marketplace access</div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div>Jobs Marketplace access</div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div>Visa support for each teacher hire</div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div> <strong>Essential customer support </strong> </div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div>
                  Receive & send interview requests</div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div>Substitute teacher assistance</div>
              </div>
            </div>
          </div>
        </div>
        <div id="w-node-ebd09504-cc8b-1fdb-13b9-0328b773d151-273af39c" class="gray-wrapper" style="border: 2px solid hsla(8, 100.00%, 67.86%, 1.00);">
          <div class="content-wrapper gap">
            <div class="content-wrapper">
              <h3 class="heading-small outline">Advanced Candidate Access</h3>
              <div class="price-wrapper">
                <p class="price large">$79<span class="span-small">/mo</span></p>
                <div class="p-small text-gray">Pay Per Hire $650 <br>
                  To be paid upon the successful approval of the visa</div>
              </div>
            </div>
            <div class="content-wrapper gap">
              <a href="#" class="button-1 plan w-inline-block">
                <div>Get Started</div>
              </a>
            </div>
            <div class="list-wrapper">
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div>Access to the Candidate Marketplace</div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div>Visa application support for 3 Teacher hires per year</div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div> <strong>Essential customer support</strong> </div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div> Substitute teacher assistance</div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div>Candidate priority access</div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div>
                  Custom company branding</div>
              </div>
            </div>
          </div>
        </div>
        <div id="w-node-ebd09504-cc8b-1fdb-13b9-0328b773d151-273af39c" class="gray-wrapper">
          <div class="content-wrapper gap">
            <div class="content-wrapper">
              <h3 class="heading-small outline">Combined Marketplace Access</h3>
              <div class="price-wrapper">
                <p class="price large">$129<span class="span-small">/mo</span></p>
                <div class="p-small text-gray">Pay Per Hire $600 <br>
                  To be paid upon the successful approval of the visa</div>
              </div>
            </div>
            <div class="content-wrapper gap">
              <a href="#" class="button-1 plan w-inline-block">
                <div>Get Started</div>
              </a>
            </div>
            <div class="list-wrapper">
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div>
                  Candidate marketplace access</div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div>Jobs Marketplace access</div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div> Visa application support for 5 teacher hires per year</div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div> <strong>Premium customer support </strong> </div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div>Receive & send interview requests</div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div>Substitute teacher assistance</div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div> Candidate priority access</div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div>Custom company branding</div>
              </div>
            </div>
          </div>
        </div>
        <div id="w-node-ebd09504-cc8b-1fdb-13b9-0328b773d151-273af39c" class="gray-wrapper">
          <div class="content-wrapper gap">
            <div class="content-wrapper">
              <h3 class="heading-small outline">Enterprise Plan</h3>
              <div class="price-wrapper">
                <p class="price large">Custom</p>
                <div class="p-small text-gray">
                  Pay Per Hire Custom Fee</div>
                <br>
              </div>
            </div>
            <div class="content-wrapper gap">
              <a href="#" class="button-1 plan w-inline-block">
                <div>Get Started</div>
              </a>
            </div>
            <div class="list-wrapper">
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div>
                  Customized plan tailored to specific needs of larger companies</div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div>Access to both Candidate Marketplace And Job Posting on the Jobs Marketplace</div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div>Flexible pricing based on the volume of hires</div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div>Visa application support for unlimited teacher hires per year</div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div>Candidate priority access</div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div>
                  Website advertising</div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check">
                </div>
                <div>Brand packaging</div>
              </div>

            </div>
          </div>
        </div>
      </div>
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
              <div class="faq-icon"><img src="{{asset('assets/images/cta-arrow-black.svg')}}" loading="lazy" alt="" class="plus-icon">
              </div>
            </a>
            <div class="faq-container">
              <p class="main-paragraph"> <strong>Subscription Plans</strong> <br> Every subscription plan incurs a
                monthly billing cycle and dictates the required payment for continued access to the platform. For
                example, if you opt for the Basic Candidate Access plan, you will be billed $59 each month for access to
                the platform. Additionally, upon the successful visa approval of a candidate, a charge of $700 will
                apply. <br> <br>
                Please note that you have the flexibility to cancel your subscription at any time. However, we recommend
                reviewing our cancellation policy for comprehensive details. </p>
            </div>
            <br>
            <div class="faq-container">
              <p class="main-paragraph"> <strong>Pay-Per-Hire</strong> <br> The payment corresponding to candidate
                hiring is contingent on the chosen subscription plan. Crucially, charges are applied upon the successful
                approval of the final visa.</p>
            </div>
          </div>
          <div class="faq-wrapper">
            <a href="#" class="faq-link w-inline-block">
              <h3 class="heading-regular">Cancellations</h3>
              <div class="faq-icon"><img src="{{asset('assets/images/cta-arrow-black.svg')}}" loading="lazy" alt="" class="plus-icon">
              </div>
            </a>
            <div class="faq-container">
              <p class="main-paragraph"><strong>Basic Candidate Access</strong> <br> Cancellation Fee (Before Visa
                Approval): If the employer cancels the subscription after signing the employment contract with a
                candidate, the employer shall be liable to pay 40% of the pay-per-hire fee as a cancellation penalty.
                <br> <br> Cancellation Fee (After Visa Approval): If the employer cancels the subscription after visa
                approval but before the teacher's employment starts, the employer shall be liable to pay the full
                pay-per-hire fee of $700. </p>
            </div>
            <div class="faq-container">
              <p class="main-paragraph"><strong>Advance Candidate Access</strong> <br> Cancellation Fee (Before Visa
                Approval): If the employer cancels the subscription after signing the employment contract with a
                candidate, the employer shall be liable to pay 40% of the pay-per-hire fee as a cancellation penalty.
                <br> <br> Cancellation Fee (After Visa Approval): If the employer cancels the subscription after visa
                approval but before the teacher's employment starts, the employer shall be liable to pay the full
                pay-per-hire fee of $650. </p>
            </div>
            <div class="faq-container">
              <p class="main-paragraph"><strong>Jobs Marketplace Access</strong> <br> Cancellation Fee (Before Visa
                Approval): If the employer cancels the subscription after signing the employment contract with a
                candidate, the employer shall be liable to pay 50% of the pay-per-hire fee as a cancellation penalty.
                <br> <br> Cancellation Fee (After Visa Approval): If the employer cancels the subscription after visa
                approval but before the teacher's employment starts, the employer shall be liable to pay the full
                pay-per-hire fee of $800. </p>
            </div>
            <div class="faq-container">
              <p class="main-paragraph"><strong>Combined Marketplace Access</strong> <br> Cancellation Fee (Before Visa
                Approval): If the employer cancels the subscription after signing the employment contract with a
                candidate, the employer shall be liable to pay 50% of the pay-per-hire fee as a cancellation penalty.
                <br> <br> Cancellation Fee (After Visa Approval): If the employer cancels the subscription after visa
                approval but before the teacher's employment starts, the employer shall be liable to pay the full
                pay-per-hire fee of $600. </p>
            </div>
            <div class="faq-container">
              <p class="main-paragraph"><strong>Flexi Plan</strong> <br>Cancellation Fee (Before Visa Approval): If the
                employer cancels the subscription after signing the employment contract with a candidate, the employer
                shall be liable to pay 800,000 won as a cancellation penalty. <br> <br>Cancellation Fee (After Visa
                Approval): If the employer cancels the subscription after visa approval but before the teacher's
                employment starts, the employer shall be liable to pay 1.2 million won as a cancellation fee.</p>
            </div>
          </div>
          <div class="faq-wrapper">
            <a href="#" class="faq-link w-inline-block">
              <h3 class="heading-regular">Visa Support</h3>
              <div class="faq-icon"><img src="{{asset('assets/images/cta-arrow-black.svg')}}" loading="lazy" alt="" class="plus-icon">
              </div>
            </a>
            <div class="faq-container">
              <p class="main-paragraph"><strong>What's included</strong> <br>30-minute visa consultation aimed at
                educating employers on the visa process <br> <br>Our team will liaise with the candidate to ensure the
                accurate submission of required documents. <br> <br> Comprehensive guidance to candidates regarding
                visa-related steps and the specifics of items to be sent to the academy. <br> <br>Visa support becomes
                accessible upon the formal signing of an employment contract. <br> <br> Thorough validation and
                background verification of submitted documents. </p>
            </div>
            <div class="faq-container">
              <p class="main-paragraph"> <strong>What's NOT INCLUDED </strong> <br> Employme does not facilitate or manage
                candidate flight bookings or travel arrangements. <br> <br> Visa assistance services are available
                exclusively during standard business hours, from Monday to Friday, spanning 9:00 am to 6:00 pm. <br>
                <br>Each subscription plan outlines a specific quota for the number of teachers eligible to receive visa
                application support. <br> <br> Our assistance is confined to matters directly pertinent to the visa
                approval process, and extends no further than the purview of such activities. </p>
            </div>
          </div>

          <div class="faq-wrapper">
            <a href="#" class="faq-link w-inline-block">
              <h3 class="heading-regular">Refund & Billing Policy</h3>
              <div class="faq-icon"><img src="{{asset('assets/images/cta-arrow-black.svg')}}" loading="lazy" alt="" class="plus-icon">
              </div>
            </a>
            <div class="faq-container">
              <p class="main-paragraph"><strong>Subscription Refunds </strong> <br> You have a grace period of 15 days
                for subscription refunds. After this period, refunds for the subscription fee will not be available.
              </p>
            </div>
            <div class="faq-container">
              <p class="main-paragraph"> <strong>Pay-Per-Hire Fee</strong> <br> The Pay-Per-Hire fee becomes due upon
                the approval of the candidate's visa. Payment is required within 10 days from this approval date.
                Failure to meet this payment deadline grants Employme the right to pursue collection in accordance with
                Korean law. In cases of delayed payment, the employer has a further 15 business days from the initial
                due date to settle the outstanding amount before any non-payment actions are initiated by Employme. <br>
                <br> Please refer to our Terms of Service and Agreement for a thorough explanation of our refund and
                billing policies. </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="container w-container">
      <div class="rounded-block bg-cyan">
        <div class="w-layout-grid main-grid inner-padding-small">
          <div id="w-node-_410ec65a-e716-ed7a-b8c8-857240624ef0-40624eef"
            class="wrapper-call-to-action inner-padding-small">
            <h2 class="heading-large margin-bottom-small">Have a question? <span class="span-scribble">Request a
                demo?</span></h2>
            <div class="form-block margin-bottom-xsmall w-form">
              <form id="email-form" name="email-form" data-name="Email Form" method="get" class="form"
                data-wf-page-id="64cb35cd05058fe9b18f585d" data-wf-element-id="410ec65a-e716-ed7a-b8c8-857240624ef4">
                <input type="text" class="text-field w-input" maxlength="256" name="Name" data-name="Name"
                  placeholder="Name" id="Name" required=""><input type="email" class="text-field w-input"
                  maxlength="256" name="Email" data-name="Email" placeholder="Email" id="Email-4" required=""><input
                  type="submit" value="Contact Us" data-wait="Please wait..." class="button w-button"></form>
              <div class="success rounded w-form-done">
                <div>Thank you! Your submission has been received!</div>
              </div>
              <div class="error w-form-fail">
                <div>Oops! Something went wrong while submitting the form.</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->




  <div class="section blog-post">
    <div class="container titles w-container">
      <h1 class="heading-large">Unlock Your Hiring Potential</h1>
    </div>
  </div>
  <div class="section">
    <div class="container w-container">
      <div class="w-layout-grid main-grid pricing-grid">
        <div id="w-node-_4f0b7a0d-22b0-c5f9-47ab-22a9e9732807-e973279d" class="plan-column">
          <div class="w-layout-grid inner-grid-plan">
            <div class="content-wrapper">
              <h3 class="heading-small outline margin-bottom-small" style="border:none;display: flex;width: 100%;justify-content: space-between;"> 
              <span style="border: 1px solid rgba(0, 0, 0, .15);padding: 12px 20px;border-radius: 50px;line-height: 2;">Freedom</span>
                <select class="form-control" name="" id="" style="width: 150px;">
                  <option value="">1 Month</option>
                  <option value="">3 Month</option>
                  <option value="">6 Month</option>
                  <option value="">12 Month</option>
                </select>
              </h3>
              <p class="price">300,000<span class="span-small">/1 mo</span></p>
              <p class="p-small min-h">Get started with a 1-month trial if you&#x27;re signing up for the first time</p>
            </div>
            <div class="list-wrapper">
              <a href="#" class="button plan margin-bottom-xsmall w-inline-block">
                <div>Get Started</div>
              </a>
              <div class="list-flex">
                <div class="circle-check"><img src="../images/icon-check.svg" loading="lazy" alt="" class="icon-check"></div>
                <div>Post job adverts</div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="../images/icon-check.svg" loading="lazy" alt="" class="icon-check"></div>
                <div>Access to a pool of qualified candidates</div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="../images/icon-check.svg" loading="lazy" alt="" class="icon-check"></div>
                <div>Inbuilt direct messaging with candidates</div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="../images/icon-check.svg" loading="lazy" alt="" class="icon-check"></div>
                <div>Schedule interviews and send employment contracts directly</div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="../images/icon-check.svg" loading="lazy" alt="" class="icon-check"></div>
                <div>Streamlined recruitment and visa process</div>
              </div>
              <div class="list-flex">
                <div class="circle-check"><img src="../images/icon-check.svg" loading="lazy" alt="" class="icon-check"></div>
                <div>Company page to promote your business</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="container inner-padding-medium w-container">
      <div class="w-layout-grid">
        <div id="w-node-e2859498-0993-2f9f-534e-3b34e3fb87e5-e3fb87e4" class="grid-wrapper sticky-faq customersupport">
          <h3 class="heading-medium">Frequently asked questions</h3>
        </div>
        <div id="w-node-e2859498-0993-2f9f-534e-3b34e3fb87e8-e3fb87e4" class="content-wrapper">
          <div class="faq-wrapper">
            <a href="#" class="faq-link w-inline-block">
              <h3 class="heading-regular">Account Sharing Policy</h3>
              <div class="faq-icon"><img src="{{asset('assets/images/cta-arrow-black.svg')}}" loading="lazy" alt="" class="plus-icon"></div>
            </a>
            <div class="faq-container">
              <p class="main-paragraph">To maintain the integrity of our platform and ensure fair access for all users, we strictly prohibit the sharing of employer accounts between or among different business entities or individuals (including Franchises). Each employer account is intended solely for the use of the registered business entity associated with it.<br><br><strong>Policy Details</strong><br><br><strong>Individual Access: </strong>Each employer account is assigned to a specific franchise or business entity. Only authorized personnel from that business entity are permitted to access the account.<br><br><strong>No Sharing: </strong>Employers are strictly prohibited from sharing their account login details with other business entities, employees, or any third parties.<br><br><strong>Single Account Usage: </strong>Employers must use their designated account for all hiring activities related to their business entity. Using the account for any other purposes or sharing it with others is strictly forbidden.<br><br><strong>Account Monitoring:</strong> We conduct regular audits and checks to monitor account activity and ensure compliance with this policy. Any unauthorized account sharing or misuse will result in immediate account suspension or termination.<br><br><strong>Consequences of Violation</strong><br><br><strong>Account Suspension:</strong> In cases of suspected account sharing or misuse, the account may be temporarily suspended pending investigation.<br><br><strong>Account Termination:</strong> Continued violation of the account sharing policy may result in permanent termination of the employer&#x27;s account, with no refund of subscription fees. Employme reserves the right to collect any loss incurred as a result of the violation.<br></p>
            </div>
          </div>
          <div class="faq-wrapper">
            <a href="#" class="faq-link w-inline-block">
              <h3 class="heading-regular">Cancellations</h3>
              <div class="faq-icon"><img src="{{asset('assets/images/cta-arrow-black.svg')}}" loading="lazy" alt="" class="plus-icon"></div>
            </a>
            <div class="faq-container">
              <p class="main-paragraph">Within the first 3 days of your initial purchase, there is no cancellation fee, and you will receive a full refund. Please be aware that upon cancellation, your company profile and job postings will no longer be visible to candidates.<br><br>After the initial 3 days, no refunds will be issued, and your service will continue until the end of the current billing period. <br></p>
            </div>
          </div>
          <div class="faq-wrapper">
            <a href="#" class="faq-link w-inline-block">
              <h3 class="heading-regular">Platform Visa Support</h3>
              <div class="faq-icon"><img src="{{asset('assets/images/cta-arrow-black.svg')}}" loading="lazy" alt="" class="plus-icon"></div>
            </a>
            <div class="faq-container">
              <p class="main-paragraph">Employme is a complete hiring marketplace designed to guide employers through the entirety of the recruitment process, covering talent acquisition through to visa finalization. Due to our platform&#x27;s step-by-step guidance, we do not offer individualized visa assistance. This approach empowers you with greater control and expedites the hiring process.</p>
            </div>
          </div>
          <div class="faq-wrapper">
            <a href="#" class="faq-link w-inline-block">
              <h3 class="heading-regular">Refund &amp; Billing Policy</h3>
              <div class="faq-icon"><img src="{{asset('assets/images/cta-arrow-black.svg')}}" loading="lazy" alt="" class="plus-icon"></div>
            </a>
            <div class="faq-container">
              <p class="main-paragraph">You have a grace period of 3 days for subscription refunds. After this period, refunds for the subscription fee will not be available.<br></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection