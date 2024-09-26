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
                <select class="form-control" name="" id="plan-price-list" style="width: 150px;">
                  <option value="300,000">1 Month</option>
                  <option value="810,000">3 Month</option>
                  <option value="1,530,000">6 Month</option>
                  <option value="2,880,000">12 Month</option>
                </select>
              </h3>
              <p id="plan-price" class="price">300,000<span class="span-small">/1 mo</span></p>
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
  <script>
    let planPriceList = document.getElementById("plan-price-list");
    planPriceList.addEventListener("change" , function(e){
      let value = this.value;
      document.getElementById("plan-price").innerText = value
    })
  </script>
@endsection