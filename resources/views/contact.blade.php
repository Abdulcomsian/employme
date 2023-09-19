@extends('components.master')

@section('content')

<div class="section">
    <div class="container title w-container">
      <div class="w-layout-grid main-grid margin-bottom-small">
        <div id="w-node-_12c10da2-d926-3eee-09c7-97900004ab9c-b18f57e0" class="overflow-wrapper">
          <h1 class="heading-medium margin-bottom-xsmall">We’d love to hear from you.</h1>
          <div class="paragraph-wrapper margin-bottom-xsmall">
            <h4 class="heading-small">Geral communication</h4>
            <p class="p-small">For general queries, including partnership opportunities, please email <a href="mailto:#">annyeong@employme.com</a>
            </p>
          </div>
          <div class="paragraph-wrapper margin-bottom-xsmall">
            <h4 class="heading-small">Help &amp; support</h4>
            <p class="p-small">Require assistance in resolving matters with your employer? <a href="#">Get Support</a>
            </p>
          </div>
          <div class="paragraph-wrapper margin-bottom-xsmall">
            <h4 class="heading-small">Address</h4>
            <p class="p-small">410-2 Masan-dong, Gimpo, Gyeonggi-do
              South Kore </p>
          </div>
        </div>
        <div id="w-node-f8854203-a303-13c2-c3ed-69e72ef67e46-b18f57e0" class="contain-form rounded bg-babyblue">
          <div class="form-container">
            <div class="form-wrapper left">
              <div class="full-form w-form">
                <form id="email-form" name="email-form" data-name="Email Form" method="get" class="inner-form" data-wf-page-id="64cb35cd05058fe9b18f57e0" data-wf-element-id="f8854203-a303-13c2-c3ed-69e72ef67e4a">
                  <div class="inner-input">
                    <div class="label-form">Full name</div><input type="text" class="text-field w-input" maxlength="256" name="Name" data-name="Name" placeholder="e.g. John Smith" id="Name" required="">
                  </div>
                  <div class="inner-input">
                    <div class="label-form">Email Address</div><input type="email" class="text-field w-input" maxlength="256" name="Email" data-name="Email" placeholder="e.g. john@email.com" id="Email-4" required="">
                  </div>
                  <div class="inner-input margin-bottom-xsmall">
                    <div class="label-form">Message</div><textarea placeholder="Message..." maxlength="5000" id="Message" name="Message" data-name="Message" required="" class="textarea-message w-input"></textarea>
                  </div>
                  <div class="inner-input margin-bottom-xsmall"><input type="submit" value="Submit" data-wait="Please wait..." class="button w-button"></div>
                </form>
                <div class="success rounded w-form-done">
                  <div>Thank you! Your submission has been received!</div>
                </div>
                <div class="error rounded w-form-fail">
                  <div>Oops! Something went wrong while submitting the form.</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="social-icons-wrapper">
        <a href="http://www.facebook.com" target="_blank" class="link-social w-inline-block"><img src="../images/facebook-icon.svg" loading="lazy" alt="" class="icon-social med"></a>
        <a href="http://www.instagram.com/joaopaulots" target="_blank" class="link-social w-inline-block"><img src="../images/instagram-icon.svg" loading="lazy" alt="" class="icon-social med"></a>
        <a href="http://www.linkedin.com" target="_blank" class="link-social w-inline-block"><img src="../images/linkedin-icon.svg" loading="lazy" alt="" class="icon-social med"></a>
        <a href="http://www.twitter.com" target="_blank" class="link-social w-inline-block"><img src="../images/twitter-icon.svg" loading="lazy" alt="" class="icon-social med"></a>
        <a href="#" class="link-social w-inline-block"><img src="../images/icon-mail.svg" loading="lazy" alt="" class="icon-social profile"></a>
      </div>
    </div>
  </div>

@endsection