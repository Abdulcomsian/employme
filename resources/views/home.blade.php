@extends('components.master')

@section('content')

<div class="main-hero bg-purple">
  <section class="section padding-bottom-medium">
    <div id="w-node-_3a0f5fec-828a-eafa-5dce-f5c5693cd89f-b18f5798" class="wrapper-container header">
      <div class="container header w-container">
        <div class="w-layout-grid main-grid">
          <div id="w-node-e93d0b9b-71e9-4dbd-e250-ce2fc27474eb-b18f5798" class="content-wrapper">
            <div class="heading-xlarge margin-bottom-small custom-heading">Join the<span class="span-smile orange">
              </span>platform <br> and get <span class="scribble-002">hired</span> &nbsp;</div>
            <div class="hero-cta-wrapper margin-bottom-xsmall">
              <div class="form-wrapper">
                <div class="full-form w-form">
                  <form id="search-btn" name="wf-form-Email-Hero" data-name="Email Hero" method="get" class="form single" data-wf-page-id="64cb35cd05058fe9b18f5798" data-wf-element-id="6a2fefe4-3854-232c-5cc0-bbdb809a3280"><input type="email" class="text-field w-input" maxlength="256" name="Email-5" data-name="Email 5" placeholder="Search Job Keywords" id="search" required=""><input type="submit" value="" data-wait="Please wait..." class="button small w-button"></form>
                  <!-- <div class="success w-form-done">
                      <div>Thank you! Your submission has been received!</div>
                    </div>
                    <div class="error w-form-fail">
                      <div>Oops! Something went wrong while submitting the form.</div>
                    </div> -->
                </div>
              </div>
            </div>
          </div>
          <div id="w-node-_61666704-67e4-53b5-2126-8750936417d0-b18f5798" class="content-wrapper">
            <!-- <p class="main-paragraph margin-bottom-xsmall">Unlock access to qualified candidates. Join our Platform.</p>
              <p class="main-paragraph margin-bottom-xsmall " style="margin-top: -20px;">Join now and access a pool of talented candidates.</p> -->
            <p class="main-paragraph margin-bottom-xsmall">Explore All Job Opportunities <br>
              from Korean Employers</p>

            <a href="{{route('jobMarketplace')}}" class="button-circle w-inline-block hire bg-remove-hover">
              <img src="{{asset('assets/images/arrow-2.svg')}}" loading="lazy" alt="" class="cta-arrow circle">
              <div class="button-fill"></div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="w-layout-grid main-grid gallery">
      <div id="w-node-_597b5782-9c5d-c351-155c-f0935ccfea19-b18f5798" data-w-id="597b5782-9c5d-c351-155c-f0935ccfea19" class="vertical-rail _001">
        <div class="image-hero-wrapper radius">
          <img src="{{ asset('assets/images/vertical-shot-cheerful-dark-skinned-unshaven-man-looks-positively-upwards-being-good-mood.jpg') }}" loading="lazy" sizes="(max-width: 991px) 256px, 224px" srcset="{{ asset('assets/images/vertical-shot-cheerful-dark-skinned-unshaven-man-looks-positively-upwards-being-good-mood-p-500.jpg') }} 500w, {{ asset('assets/images/vertical-shot-cheerful-dark-skinned-unshaven-man-looks-positively-upwards-being-good-mood-p-800.jpg') }} 800w, {{ asset('assets/images/vertical-shot-cheerful-dark-skinned-unshaven-man-looks-positively-upwards-being-good-mood-p-1080.jpg') }} 1080w, {{ asset('assets/images/vertical-shot-cheerful-dark-skinned-unshaven-man-looks-positively-upwards-being-good-mood.jpg') }} 1200w" alt="" class="cover-image">
        </div>


        <div class="image-hero-wrapper _005"><img src="{{asset('assets/images/ui-062.svg')}}" loading="lazy" alt="" class="cover-image"></div>
      </div>
      <div id="w-node-c28216ed-64d1-4a15-5bad-3aa5fd046d54-b18f5798" data-w-id="c28216ed-64d1-4a15-5bad-3aa5fd046d54" class="vertical-rail middle">
        <div class="image-hero-wrapper circle">
          <img src="{{ asset('assets/images/indoor-portrait-young-female-posing-red-background-laugh-keep-her-eyes-closed.jpg') }}" loading="lazy" sizes="(max-width: 479px) 100vw, (max-width: 991px) 18vw, 308px" srcset="{{ asset('assets/images/indoor-portrait-young-female-posing-red-background-laugh-keep-her-eyes-closed-p-500.jpg') }} 500w, {{ asset('assets/images/indoor-portrait-young-female-posing-red-background-laugh-keep-her-eyes-closed-p-800.jpg') }} 800w, {{ asset('assets/images/indoor-portrait-young-female-posing-red-background-laugh-keep-her-eyes-closed-p-1080.jpg') }} 1080w, {{ asset('assets/images/indoor-portrait-young-female-posing-red-background-laugh-keep-her-eyes-closed-p-1600.jpg') }} 1600w, {{ asset('assets/images/indoor-portrait-young-female-posing-red-background-laugh-keep-her-eyes-closed.jpg') }} 1800w" alt="" class="cover-image">
        </div>

        <div class="image-hero-wrapper">
          <img src="{{ asset('assets/images/portrait-handsome-man-with-sunglasses-orange-background.jpg') }}" loading="lazy" sizes="(max-width: 479px) 100vw, (max-width: 767px) 92vw, (max-width: 991px) 94vw, 96vw" srcset="{{ asset('assets/images/portrait-handsome-man-with-sunglasses-orange-background-p-500.jpg') }} 500w, {{ asset('assets/images/portrait-handsome-man-with-sunglasses-orange-background-p-800.jpg') }} 800w, {{ asset('assets/images/portrait-handsome-man-with-sunglasses-orange-background-p-1080.jpg') }} 1080w, {{ asset('assets/images/portrait-handsome-man-with-sunglasses-orange-background-p-1600.jpg') }} 1600w, {{ asset('assets/images/portrait-handsome-man-with-sunglasses-orange-background-p-2000.jpg') }} 2000w, {{ asset('assets/images/portrait-handsome-man-with-sunglasses-orange-background-p-2600.jpg') }} 2600w, {{ asset('images/portrait-handsome-man-with-sunglasses-orange-background-p-3200.jpg') }} 3200w" alt="" class="cover-image">
        </div>

      </div>
      <div id="w-node-_1f1baebe-7b78-ebb8-5eed-2ceb340b97fb-b18f5798" class="vertical-rail middle">
        <div class="image-hero-wrapper radius">
          <img src="{{ asset('assets/images/74.jpg') }}" loading="lazy" sizes="(max-width: 991px) 256px, 224px" srcset="{{ asset('assets/images/74-p-500.jpg') }} 500w, {{ asset('assets/images/74-p-800.jpg') }} 800w, {{ asset('assets/images/74-p-1080.jpg') }} 1080w, {{ asset('assets/images/74-p-1600.jpg') }} 1600w, {{ asset('assets/images/74-p-2000.jpg') }} 2000w, {{ asset('assets/images/74-p-2600.jpg') }} 2600w, {{ asset('assets/images/74-p-3200.jpg') }} 3200w" alt="" class="cover-image">
        </div>

      </div>
      <div id="w-node-_436b2aba-b60b-e6d9-59e2-8e3841f13566-b18f5798" class="vertical-rail bottom">
        <div class="image-hero-wrapper _004"><img src="{{ asset('assets/images/ui-061.svg')}}" loading="lazy" alt=""></div>
        <div class="image-hero-wrapper circle">
          <img src="{{ asset('images/Frame-98.png') }}" loading="lazy" sizes="(max-width: 479px) 100vw, (max-width: 991px) 18vw, 308px" srcset="{{ asset('assets/images/Frame-98-p-500.png') }} 500w, {{ asset('images/Frame-98-p-800.png') }} 800w, {{ asset('images/Frame-98.png') }} 1399w" alt="" class="cover-image">
        </div>

      </div>
    </div>
  </section>
</div>
<section class="section bg-gray padding-bottom-small">
  <div class="overflow">
    <div class="inner-ticker end">
      <div class="flex-ticker">
        <div class="flex-rail">
          <div class="inner-text-scrolling">
            <div>International Talent</div>
            <img src="{{ asset('assets/images/g-013.svg') }}" loading="lazy" alt="" class="image">
            <div>Korean Employers</div>
            <img src="{{ asset('assets/images/g-016.svg') }}" loading="lazy" alt="" class="image">
            <div>Bridging The Gap</div>
            <img src="{{ asset('assets/images/Star-5.svg') }}" loading="lazy" alt="" class="image">
          </div>

          <div class="inner-text-scrolling">
            <img src="{{ asset('assets/images/g-013.svg') }}" loading="lazy" alt="" class="image">
            <div>Korean Employers</div>
            <img src="{{ asset('assets/images/g-016.svg') }}" loading="lazy" alt="" class="image">
            <div>Bridging The Gap</div>
            <img src="{{ asset('assets/images/Star-5.svg') }}" loading="lazy" alt="" class="image">
          </div>
          <div class="inner-text-scrolling">
            <img src="{{ asset('assets/images/g-013.svg') }}" loading="lazy" alt="" class="image">
            <div>Korean Employers</div>
            <img src="{{ asset('assets/images/g-016.svg') }}" loading="lazy" alt="" class="image">
            <div>Bridging The Gap</div>
            <img src="{{ asset('assets/images/Star-5.svg') }}" loading="lazy" alt="" class="image">
          </div>
        </div>
        <div class="flex-rail">
          <div class="inner-text-scrolling">
            <img src="{{ asset('assets/images/g-013.svg') }}" loading="lazy" alt="" class="image">
            <div>Korean Employers</div>
            <img src="{{ asset('assets/images/g-016.svg') }}" loading="lazy" alt="" class="image">
            <div>Bridging The Gap</div>
            <img src="{{ asset('assets/images/Star-5.svg') }}" loading="lazy" alt="" class="image">
          </div>
          <div class="inner-text-scrolling">
            <img src="{{ asset('assets/images/g-013.svg') }}" loading="lazy" alt="" class="image">
            <div>Korean Employers</div>
            <img src="{{ asset('assets/images/g-016.svg') }}" loading="lazy" alt="" class="image">
            <div>Bridging The Gap</div>
            <img src="{{ asset('assets/images/Star-5.svg') }}" loading="lazy" alt="" class="image">
          </div>
          <div class="inner-text-scrolling">
            <img src="{{ asset('assets/images/g-013.svg') }}" loading="lazy" alt="" class="image">
            <div>Korean Employers</div>
            <img src="{{ asset('assets/images/g-016.svg') }}" loading="lazy" alt="" class="image">
            <div>Bridging The Gap</div>
            <img src="{{ asset('assets/images/Star-5.svg') }}" loading="lazy" alt="" class="image">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container w-container">
    <div id="w-node-_59a6c22b-8d1b-c5a4-5cbb-e1f5a8063d14-b18f5798" class="gap-wrapper">
      <div id="w-node-_85a7ff2a-02c7-4e27-4712-5c02f14d44d1-b18f5798" class="center-wrapper">
        <div class="overflow headers">
          <div class="flex-hat">
            <div class="bullet"></div>
            <div class="heading-small regular">
              We help you</div>
          </div>
          <div class="h-wrapper">
            <h2 class="heading-xlarge">Ditch The Recruiter</h2>
          </div>
        </div>
      </div>
      <!-- <div class="rounded-block bg-green"> -->
      <!-- <div class="rounded-block" style="margin-top: -50px;">
          <div class="w-layout-grid main-grid custom-grid">
            <div id="w-node-_1dc1b062-d679-2ced-19b1-9ba419d15dd6-b18f5798" class="box-wrapper no-hover custom-height">
              <div class="center-wrapper _w-min">
                <h2 class="heading-large " >Talk With Your <br> Future Employer</h2>
                <p class="main-paragraph inner-padding-small text-align-center">Job offers with transparency—no surprises. Build your profile, engage employers directly, and delve into their offerings. </p>
                <div style="-webkit-transform:translate3d(0, 4em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 4em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 4em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 4em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0); " class="button-wrapper">
                  <a href="#" class="link-block w-inline-block">
                    <div class="btn-label-wrapper">
                      <div class="label-button">Our Services</div>
                      <div class="arrow-wrapper"><img src="../images/cta-arrow-black.svg" loading="lazy" alt="" class="icon-arrow-flip"><img src="../images/cta-arrow-white.svg" loading="lazy" alt="" class="icon-arrow-flip"></div>
                    </div>
                    <div class="button-hover-fill"></div>
                  </a>
                </div>
              </div>
            </div>
            <div id="w-node-_1dc1b062-d679-2ced-19b1-9ba419d15ddf-b18f5798" class="graphics-wrapper">
              <div class="scale-up"><img src="../images/ui-036.png" loading="lazy" sizes="(max-width: 479px) 100vw, (max-width: 767px) 80vw, (max-width: 991px) 84vw, 87vw" srcset="../images/ui-036-p-500.png 500w, ../images/ui-036-p-800.png 800w, ../images/ui-036-p-1080.png 1080w, ../images/ui-036-p-1600.png 1600w, ../images/ui-036.png 1861w" alt="" class="contain-image"></div>
            </div>
          </div>
        </div> -->



      <div class="rounded-block">
        <div class="w-layout-grid main-grid">
          <div id="w-node-_1dc1b062-d679-2ced-19b1-9ba419d15dd6-b18f5798" class="box-wrapper-1  no-hover">
            <div class="center-wrapper _w-min">
              <h2 class="heading-large ">Talk With Your <br> Future Employer</h2>
              <p class="main-paragraph inner-padding-small text-align-center">Job offers with transparency—no
                surprises. Build your profile, engage employers directly, and delve into their offerings. </p>
              <div style="-webkit-transform:translate3d(0, 4em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 4em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 4em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, -0.5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0); " class="button-wrapper">
                <a href="services" class="link-block w-inline-block">
                  <div class="btn-label-wrapper">
                    <div class="label-button">Our Services</div>
                    <div class="arrow-wrapper"><img src="{{ asset('assets/images/cta-arrow-black.svg')}}" loading="lazy" alt="" class="icon-arrow-flip"><img src="{{ asset('assets/images/cta-arrow-white.svg')}}" loading="lazy" alt="" class="icon-arrow-flip"></div>
                  </div>
                  <div class="button-hover-fill"></div>
                </a>
              </div>
            </div>
          </div>
          <div id="w-node-_1dc1b062-d679-2ced-19b1-9ba419d15ddf-b18f5798" class="graphics-wrapper">
            <div class="scale-up">
              <img src="{{ asset('assets/images/ui-036.png') }}" loading="lazy" sizes="(max-width: 479px) 100vw, (max-width: 767px) 80vw, (max-width: 991px) 84vw, 87vw" srcset="{{ asset('assets/images/ui-036-p-500.png') }} 500w, {{ asset('assets/images/ui-036-p-800.png') }} 800w, {{ asset('assets/images/ui-036-p-1080.png') }} 1080w, {{ asset('assets/images/ui-036-p-1600.png') }} 1600w, {{ asset('assets/images/ui-036.png') }} 1861w" alt="" class="contain-image">
            </div>

          </div>
        </div>
      </div>





      <div class="w-layout-grid main-grid margin-bottom-small">
        <div id="w-node-df6b7e03-bb73-87a9-bfd4-1931cd314867-b18f5798" style="opacity:0;-webkit-transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="gray-wrapper custom-gray-warpper  icons no-hover">
          <div class="icon-box purple"><img src="{{asset('assets/images/ic-007-color.svg')}}" loading="lazy" alt="" class="icon-content"></div>
          <div style=" -webkit-transform: translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0) " class="content-wrapper">
            <h3 class="heading-small neg-30-margin">Jobs Marketplace</h3>
            <p class="p-small">Effortlessly discover job opportunities that prioritize transparency
              <br> <span style="color: transparent;">more content</span>
            </p>
          </div>
        </div>


        <div id="w-node-df6b7e03-bb73-87a9-bfd4-1931cd31486f-b18f5798" data-w-id="df6b7e03-bb73-87a9-bfd4-1931cd31486f" style="opacity:0;-webkit-transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="gray-wrapper custom-gray-warpper icons no-hover">
          <div class="icon-box blue"><img src="{{asset('assets/images/ic-002-color.svg')}}" loading="lazy" alt="" class="icon-content">
          </div>
          <div style="-webkit-transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="content-wrapper">
            <h3 class="heading-small  neg-30-margin">Candidate Marketplace</h3>
            <p class="p-small">Showcase your skills and expertise to attract employers who apply to you
              <br> <span style="color: transparent;">more content</span>
            </p>
          </div>
        </div>
        <div id="w-node-df6b7e03-bb73-87a9-bfd4-1931cd314877-b18f5798" data-w-id="df6b7e03-bb73-87a9-bfd4-1931cd314877" style="opacity:0;-webkit-transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="gray-wrapper custom-gray-warpper icons no-hover">
          <div class="icon-box green"><img src="{{asset('assets/images/ic-006-color.svg')}}" loading="lazy" alt="" class="icon-content"></div>
          <div style="-webkit-transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="content-wrapper">
            <h3 class="heading-small  neg-30-margin">Interview Requests</h3>
            <p class="p-small">Request interviews with employers or allow them to request interviews with you</p>
          </div>
        </div>
        <div id="w-node-df6b7e03-bb73-87a9-bfd4-1931cd31487f-b18f5798" data-w-id="df6b7e03-bb73-87a9-bfd4-1931cd31487f" style="opacity:0;-webkit-transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="gray-wrapper custom-gray-warpper icons no-hover">
          <div class="icon-box orange"><img src="{{asset('assets/images/ic-013.svg')}}" loading="lazy" alt="" class="icon-content">
          </div>
          <div style="-webkit-transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="content-wrapper">
            <h3 class="heading-small  neg-30-margin">Visa Support</h3>
            <p class="p-small">Know precisely what you need to do and when to do it for a smooth visa process</p>
          </div>
        </div>
        <div id="w-node-df6b7e03-bb73-87a9-bfd4-1931cd314867-b18f5798" data-w-id="df6b7e03-bb73-87a9-bfd4-1931cd314867" style="opacity:0;-webkit-transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="gray-wrapper custom-gray-warpper icons no-hover">

          <div class="icon-box royal"><img src="{{asset('assets/images/ic-004.svg')}}" loading="lazy" alt="" class="icon-content">
          </div>
          <div style="-webkit-transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="content-wrapper">
            <h3 class="heading-small  neg-30-margin">Candidate-Employer Messaging</h3>
            <p class="p-small">Avoid dealing with recruiters and connect directly with your future employer <br> <span style="color: white;"> no more content</span></p>
          </div>
        </div>

        <div id="w-node-df6b7e03-bb73-87a9-bfd4-1931cd31486f-b18f5798" data-w-id="df6b7e03-bb73-87a9-bfd4-1931cd31486f" style="opacity:0;-webkit-transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="gray-wrapper custom-gray-warpper icons no-hover">
          <div class="icon-box yellow"><img src="{{asset('assets/images/ic-003-color.svg')}}" loading="lazy" alt="" class="icon-content"></div>

          <div style="-webkit-transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="content-wrapper">
            <h3 class="heading-small  neg-30-margin">Qualified Employers & Candidates</h3>
            <p class="p-small">Employers and candidates can mutually evaluate each other, raising the bar of standards
              in the process <span style="color: white;"> no more content</span> </p>
          </div>
        </div>
        <div id="w-node-df6b7e03-bb73-87a9-bfd4-1931cd314877-b18f5798" data-w-id="df6b7e03-bb73-87a9-bfd4-1931cd314877" style="opacity:0;-webkit-transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="gray-wrapper custom-gray-warpper icons no-hover">
          <div class="icon-box royal"><img src="{{asset('assets/images/ic-005.svg')}}" loading="lazy" alt="" class="icon-content">
          </div>
          <div style="-webkit-transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="content-wrapper">
            <h3 class="heading-small  neg-30-margin">End-To-End Process</h3>
            <p class="p-small">Streamline your application process, seamlessly navigating from job search to visa
              approval, all in one convenient platform</p>
          </div>
        </div>
        <div id="w-node-df6b7e03-bb73-87a9-bfd4-1931cd31487f-b18f5798" data-w-id="df6b7e03-bb73-87a9-bfd4-1931cd31487f" style="opacity:0;-webkit-transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 3em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="gray-wrapper custom-gray-warpper icons no-hover">
          <div class="icon-box red"><img src="{{asset('assets/images/ic-012.svg')}}" loading="lazy" alt="" class="icon-content"></div>
          <div style="-webkit-transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, -5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="content-wrapper">
            <h3 class="heading-small  neg-30-margin">Dispute Mediation</h3>
            <p class="p-small">Rely on us during workplace challenges. We provide guidance and represent your
              interests with your employer for solutions</p>
          </div>
        </div>
      </div>
      <div class="center-wrapper">
        <div class="overflow-heading">
          <div class="overflow-heading">
            <div class="_w-header">
              <h2 class="heading-large inner-padding-micro">Candidate Marketplace<span class="span-smile"> </span>for
                employers</h2>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="overflow-grid plan">
          <div class="w-layout-grid main-grid">
            <div id="w-node-_85a7ff2a-02c7-4e27-4712-5c02f14d44e6-b18f5798" data-w-id="85a7ff2a-02c7-4e27-4712-5c02f14d44e6" class="box-wrapper start">
              <div style="-webkit-transform:translate3d(0, 4em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 4em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 4em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 4em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="content-wrapper gap"><img src="../images/g-011.svg" loading="lazy" alt="" class="quote-icon">
                <p class="main-paragraph p-medium">Thanks Mollie! Your Webflow components are amazing and the visual layout is wonderful.</p>
                <div class="ratings"><img src="../images/Star-rating-yellow.svg" loading="lazy" alt="" class="ratings-stars"><img src="../images/Star-rating-yellow.svg" loading="lazy" alt="" class="ratings-stars"><img src="../images/Star-rating-yellow.svg" loading="lazy" alt="" class="ratings-stars"><img src="../images/Star-rating-yellow.svg" loading="lazy" alt="" class="ratings-stars"><img src="../images/Star-rating-yellow.svg" loading="lazy" alt="" class="ratings-stars"></div>
                <div class="hr-flex vertical">
                  <div class="w-layout-grid grid-logo"><img src="../images/ROUSEY.svg" loading="lazy" id="w-node-_85a7ff2a-02c7-4e27-4712-5c02f14d44ee-b18f5798" alt="" class="image-logo">
                    <div>
                      <div class="heading-small">Kayla Harisson</div>
                      <div class="uppercase-small">Design Director at Rousey</div>
                    </div>
                  </div>
                </div>
              </div>
              <div style="opacity:0" class="graphics-wrapper"><img src="../images/av-1.png" loading="lazy" sizes="(max-width: 479px) 100vw, (max-width: 767px) 75vw, (max-width: 991px) 368px, 322px" srcset="../images/av-1-p-500.png 500w, ../images/av-1-p-800.png 800w, ../images/av-1-p-1080.png 1080w, ../images/av-1.png 1530w" alt="" class="quote-author"></div>
            </div>
            <div id="w-node-ff1a2ad2-de6e-797c-be64-c58d62825e69-b18f5798" data-w-id="ff1a2ad2-de6e-797c-be64-c58d62825e69" class="box-wrapper start">
              <div style="-webkit-transform:translate3d(0, 4em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 4em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 4em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 4em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="content-wrapper gap"><img src="../images/g-011.svg" loading="lazy" alt="" class="quote-icon">
                <p class="p-medium">Would definitely recommend Mollie and will definitely be purchasing again. </p>
                <div class="ratings"><img src="../images/Star-rating-yellow.svg" loading="lazy" alt="" class="ratings-stars"><img src="../images/Star-rating-yellow.svg" loading="lazy" alt="" class="ratings-stars"><img src="../images/Star-rating-yellow.svg" loading="lazy" alt="" class="ratings-stars"><img src="../images/Star-rating-yellow.svg" loading="lazy" alt="" class="ratings-stars"><img src="../images/Star-rating-yellow.svg" loading="lazy" alt="" class="ratings-stars"></div>
                <div class="hr-flex vertical">
                  <div class="w-layout-grid grid-logo"><img src="../images/spark.svg" loading="lazy" id="w-node-ff1a2ad2-de6e-797c-be64-c58d62825e71-b18f5798" alt="" class="image-logo">
                    <div>
                      <div class="heading-small">Michael Page</div>
                      <div class="uppercase-small">manager at spark</div>
                    </div>
                  </div>
                </div>
              </div>
              <div style="opacity:0" class="graphics-wrapper"><img src="../images/av-2.png" loading="lazy" sizes="(max-width: 479px) 100vw, (max-width: 767px) 75vw, (max-width: 991px) 368px, 322px" srcset="../images/av-2-p-500.png 500w, ../images/av-2-p-800.png 800w, ../images/av-2-p-1080.png 1080w, ../images/av-2.png 1530w" alt="" class="quote-author"></div>
            </div>
            <div id="w-node-_25c4c32a-6361-1fe2-d648-2d8a7f59fbb0-b18f5798" data-w-id="25c4c32a-6361-1fe2-d648-2d8a7f59fbb0" class="box-wrapper start">
              <div style="-webkit-transform:translate3d(0, 4em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 4em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 4em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 4em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="content-wrapper gap">
                <div class="content-wrapper"><img src="../images/g-011.svg" loading="lazy" alt="" class="quote-icon">
                  <p class="p-medium">This is unbelievable. After using Mollie Template my business skyrocketed</p>
                  <div class="ratings"><img src="../images/Star-rating-yellow.svg" loading="lazy" alt="" class="ratings-stars"><img src="../images/Star-rating-yellow.svg" loading="lazy" alt="" class="ratings-stars"><img src="../images/Star-rating-yellow.svg" loading="lazy" alt="" class="ratings-stars"><img src="../images/Star-rating-yellow.svg" loading="lazy" alt="" class="ratings-stars"><img src="../images/Star-rating-yellow.svg" loading="lazy" alt="" class="ratings-stars"></div>
                </div>
                <div class="hr-flex vertical">
                  <div class="w-layout-grid grid-logo"><img src="../images/McNeeley.svg" loading="lazy" id="w-node-_25c4c32a-6361-1fe2-d648-2d8a7f59fbb8-b18f5798" alt="" class="image-logo">
                    <div>
                      <div class="heading-small">Chuck Liddell</div>
                      <div class="uppercase-small">Design Director at mcneeley</div>
                    </div>
                  </div>
                </div>
              </div>
              <div style="opacity:0" class="graphics-wrapper"><img src="../images/av-3.png" loading="lazy" sizes="(max-width: 479px) 100vw, (max-width: 767px) 75vw, (max-width: 991px) 368px, 322px" srcset="../images/av-3-p-500.png 500w, ../images/av-3-p-800.png 800w, ../images/av-3-p-1080.png 1080w, ../images/av-3.png 1530w" alt="" class="quote-author"></div>
            </div>
          </div>
        </div> -->
      <div class="w-layout-grid main-grid overflow">
        <div id="w-node-_85a7ff2a-02c7-4e27-4712-5c02f14d452a-b18f5798" class="center-wrapper">
          <div class="overflow-heading">
            <div class="_w-header">
              <h2 class="heading-large inner-padding-micro">Get Started<br>Get<span class="text-ui-arrow">
                </span>Hired</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="rounded-block bg-purple gap">
        <div class="overflow-grid plan">
          <div class="w-layout-grid main-grid">
            <div id="w-node-c894ce13-db6d-6b27-2d28-4d0eeebe00e9-b18f5798" data-w-id="c894ce13-db6d-6b27-2d28-4d0eeebe00e9" class="box-wrapper plan recommended  no-hover">
              <div class="content-wrapper">
                <div class="w-layout-grid inner-grid-plan">
                  <div class="content-wrapper">
                    <h3 class="heading-small outline margin-bottom-small">Stage 1</h3>
                    <!-- <p class="price">$9<span class="span-small">/mo</span></p> -->
                    <p class="price">Apply </p>

                    <p class="p-small min-h">Begin your journey by signing up and completing our automated interview
                      process</p>
                  </div>
                  <div class="list-wrapper">
                    <a href="signup" class="button plan-button  plan margin-bottom-xsmall w-inline-block">
                      <div>Join Now</div>
                    </a>
                    <div class="list-flex">
                      <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check"></div>
                      <div>Check Your Eligibility</div>
                    </div>
                    <div class="list-flex">
                      <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check"></div>
                      <div>Create Your Profile</div>
                    </div>
                    <div class="list-flex">
                      <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check"></div>
                      <div>Prepare Required Documents</div>
                    </div>
                    <div class="list-flex">
                      <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check"></div>
                      <div>Complete Virtual Interview</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="w-node-c894ce13-db6d-6b27-2d28-4d0eeebe0111-b18f5798" data-w-id="c894ce13-db6d-6b27-2d28-4d0eeebe0111" class="box-wrapper plan no-hover">
              <div class="w-layout-grid inner-grid-plan">
                <div class="content-wrapper">
                  <h3 class="heading-small outline margin-bottom-small">Stage 2</h3>
                  <!-- <p class="price">$29<span class="span-small">/mo</span></p> -->
                  <p class="price">Connect</p>


                  <p class="p-small min-h">Apply for job opportunities or receive interview requests directly from
                    employers</p>
                </div>
                <div class="list-wrapper">
                  <!-- <a href="#" class="button plan-button plan margin-bottom-xsmall w-inline-block">
                    <div>Connect with Employers</div>
                  </a> -->
                  <div class="list-flex">
                    <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check"></div>
                    <div>Request Interviews With Employers</div>
                  </div>
                  <div class="list-flex">
                    <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check"></div>
                    <div>Respond To Interview Requests From Employers</div>
                  </div>
                  <div class="list-flex">
                    <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check"></div>
                    <div>
                      Negotiate Terms Of Employment</div>
                  </div>
                  <div class="list-flex">
                    <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check"></div>
                    <div>Review Employment Contract</div>
                  </div>



                </div>
              </div>
            </div>
            <div id="w-node-c894ce13-db6d-6b27-2d28-4d0eeebe0152-b18f5798" data-w-id="c894ce13-db6d-6b27-2d28-4d0eeebe0152" class="box-wrapper plan no-hover">
              <div class="w-layout-grid inner-grid-plan">
                <div class="content-wrapper">
                  <h3 class="heading-small outline margin-bottom-small">Stage 3</h3>
                  <!-- <p class="price">$99<span class="span-small">/mo</span></p> -->
                  <p class="price">Prepare</p>
                  <p class="p-small min-h">Gather the necessary documents and make necessary arrangements for visa
                    application and travel</p>
                </div>
                <div class="list-wrapper">
                  <!-- <a href="#" class="button plan-button  plan margin-bottom-xsmall w-inline-block">
                    <div>Required Documents</div>
                  </a> -->
                  <div class="list-flex">
                    <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check"></div>
                    <div>Complete Visa Forms & Documents</div>
                  </div>
                  <div class="list-flex">
                    <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check"></div>
                    <div>
                      Mail Necessary Visa Documents To Employer</div>
                  </div>
                  <div class="list-flex">
                    <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check"></div>
                    <div>Receive Visa Issuance Number From The Employer</div>
                  </div>
                  <div class="list-flex">
                    <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check"></div>
                    <div>Provide visa issuance to your nearest Korean Embassy for final approval</div>
                  </div>
                  <div class="list-flex">
                    <div class="circle-check"><img src="{{asset('assets/images/icon-check.svg')}}" loading="lazy" alt="" class="icon-check"></div>
                    <div>
                      After arrival complete the health exam and apply for your Alien registration card</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="inner-container">
            <div class="w-layout-grid main-grid">
              <div id="w-node-_295601c1-959a-67c3-decb-e757f507ab78-f507ab76" class="pop-up m">
                <div class="content-wrapper"><img src="../images/g-011.svg" loading="lazy" alt="" class="quote-icon">
                  <div class="heading-medium margin-bottom-small">We have no regrets! Wow what great service, I love it! Mollie was worth a fortune to my company. Thank you for making it painless, pleasant and most of all hassle free.</div>
                  <div class="w-layout-grid profile _3col">
                    <div class="image-profile-wrapper small"><img src="../images/indoor-portrait-young-female-posing-red-background-laugh-keep-her-eyes-closed.jpg" loading="lazy" sizes="55px" srcset="../images/indoor-portrait-young-female-posing-red-background-laugh-keep-her-eyes-closed-p-500.jpg 500w, ../images/indoor-portrait-young-female-posing-red-background-laugh-keep-her-eyes-closed-p-800.jpg 800w, ../images/indoor-portrait-young-female-posing-red-background-laugh-keep-her-eyes-closed-p-1080.jpg 1080w, ../images/indoor-portrait-young-female-posing-red-background-laugh-keep-her-eyes-closed-p-1600.jpg 1600w, ../images/indoor-portrait-young-female-posing-red-background-laugh-keep-her-eyes-closed.jpg 1800w" alt="" class="image-profile"></div>
                    <div id="w-node-_76244302-397d-60a4-7364-eed5dba6c1ff-f507ab76">
                      <div><strong>Megan Fox</strong></div>
                      <div class="wrapper-blurb">
                        <div>Design Director at SuperSkills</div>
                      </div>
                    </div><img src="../images/spark.svg" loading="lazy" id="w-node-_76244302-397d-60a4-7364-eed5dba6c206-f507ab76" alt="" class="image-logo">
                  </div>
                </div>
              </div>
              <div id="w-node-_295601c1-959a-67c3-decb-e757f507ab83-f507ab76" class="graphics-wrapper">
                <div class="scale-up"><img src="../images/ui-023.png" loading="lazy" sizes="(max-width: 479px) 100vw, (max-width: 767px) 80vw, (max-width: 991px) 84vw, 87vw" srcset="../images/ui-023-p-500.png 500w, ../images/ui-023-p-800.png 800w, ../images/ui-023-p-1080.png 1080w, ../images/ui-023-p-1600.png 1600w, ../images/ui-023.png 1828w" alt=""></div>
              </div>
            </div>
          </div>
        </div>  -->
        <!-- <div class="rounded-block bg-white">
          <div class="w-layout-grid main-grid z-index">
            <div id="w-node-_6428d815-43b4-48d9-ca9f-b5ac915898de-b18f5798" data-w-id="6428d815-43b4-48d9-ca9f-b5ac915898de" class="center-wrapper">
              <div style="-webkit-transform:translate3d(0, -100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, -100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, -100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, -100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="flex-hat">
                <div class="bullet"></div>
                <div class="heading-small regular">Employme</div>
              </div>
              <div style="-webkit-transform:translate3d(0, 5em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 5em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 5em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 5em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="h-wrapper">
                <div class="heading-large inner-padding-micro">Achieve outstanding results with Mollie</div>
              </div>
              <div style="-webkit-transform:translate3d(0, 5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="button-wrapper">
                <a href="#" class="button-circle w-inline-block"><img src="../images/arrow-2.svg" loading="lazy" alt="" class="cta-arrow circle">
                  <div class="button-fill"></div>
                </a>
              </div>
            </div>
            <div id="w-node-_3e1fb2c1-966e-50f2-5571-5898221010d8-b18f5798" class="scale-up"><img src="../images/ui-038.png" loading="lazy" sizes="(max-width: 479px) 100vw, (max-width: 767px) 69vw, (max-width: 991px) 73vw, 75vw" srcset="../images/ui-038-p-500.png 500w, ../images/ui-038-p-800.png 800w, ../images/ui-038-p-1080.png 1080w, ../images/ui-038-p-1600.png 1600w, ../images/ui-038-p-2000.png 2000w, ../images/ui-038.png 2188w" alt="" class="full-image"></div>
          </div>
          <div class="sub-bg"></div>
        </div> -->
        <!-- <div class="hr-flex">
          <div class="card">
            <div class="inner-card">
              <div class="heading-col-wrapper">
                <div class="flex-hat">
                  <div class="bullet"></div>
                  <div class="heading-small regular">Employme</div>
                </div>
                <div class="overflow-heading">
                  <h2 class="heading-large margin-bottom-xsmall">Transform the way you build for web</h2>
                </div>
                <a href="#" class="link-block w-inline-block">
                  <div class="btn-label-wrapper">
                    <div class="label-button">See more</div>
                    <div class="arrow-wrapper"><img src="../images/cta-arrow-black.svg" loading="lazy" alt="" class="icon-arrow-flip"><img src="../images/cta-arrow-white.svg" loading="lazy" alt="" class="icon-arrow-flip"></div>
                  </div>
                  <div class="button-hover-fill"></div>
                </a>
              </div>
              <div class="graphics-wrapper"><img src="../images/ui-017.png" loading="lazy" style="-webkit-transform:translate3d(0, 8em, 0) scale3d(0.88, 0.88, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 8em, 0) scale3d(0.88, 0.88, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 8em, 0) scale3d(0.88, 0.88, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 8em, 0) scale3d(0.88, 0.88, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" sizes="(max-width: 479px) 100vw, (max-width: 767px) 74vw, (max-width: 991px) 77vw, 37vw" srcset="../images/ui-017-p-500.png 500w, ../images/ui-017-p-800.png 800w, ../images/ui-017-p-1080.png 1080w, ../images/ui-017.png 1548w" alt="" class="ui-image"></div>
            </div>
          </div>
          <div class="card">
            <div class="inner-card">
              <div class="heading-col-wrapper">
                <div class="flex-hat">
                  <div class="bullet"></div>
                  <div class="heading-small regular">Employme</div>
                </div>
                <div class="overflow-heading">
                  <h2 class="heading-large margin-bottom-xsmall">Share your ideas. Grow your brand</h2>
                </div>
                <a href="#" class="link-block w-inline-block">
                  <div class="btn-label-wrapper">
                    <div class="label-button">See more</div>
                    <div class="arrow-wrapper"><img src="../images/cta-arrow-black.svg" loading="lazy" alt="" class="icon-arrow-flip"><img src="../images/cta-arrow-white.svg" loading="lazy" alt="" class="icon-arrow-flip"></div>
                  </div>
                  <div class="button-hover-fill"></div>
                </a>
              </div>
              <div class="graphics-wrapper"><img src="../images/ui-019.png" loading="lazy" style="-webkit-transform:translate3d(0, 8em, 0) scale3d(0.88, 0.88, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 8em, 0) scale3d(0.88, 0.88, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 8em, 0) scale3d(0.88, 0.88, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 8em, 0) scale3d(0.88, 0.88, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" sizes="(max-width: 479px) 100vw, (max-width: 767px) 74vw, (max-width: 991px) 77vw, 37vw" srcset="../images/ui-019-p-500.png 500w, ../images/ui-019-p-800.png 800w, ../images/ui-019-p-1080.png 1080w, ../images/ui-019.png 1548w" alt="" class="ui-image"></div>
            </div>
          </div>
        </div> -->
      </div>


      <div class="rounded-block bg-white">
        <div class="w-layout-grid main-grid z-index">
          <div id="w-node-_6428d815-43b4-48d9-ca9f-b5ac915898de-b18f5798" data-w-id="6428d815-43b4-48d9-ca9f-b5ac915898de" class="center-wrapper">
            <div style="-webkit-transform:translate3d(0, -100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, -100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, -100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, -100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="flex-hat">
              <div class="bullet"></div>
              <div class="heading-small regular"> Ready to get started?</div>
            </div>
            <div style="-webkit-transform:translate3d(0, 5em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 5em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 5em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 5em, 0) scale3d(0.8, 0.8, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="h-wrapper">
              <div class="heading-large inner-padding-micro">Join The Platform Now</div>
            </div>
            <div style="margin-top: 10px;  -webkit-transform:translate3d(0, 5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 5em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="button-wrapper">
              <!-- <a href="#" class="button-circle w-inline-block"><img src="../images/arrow-2.svg" loading="lazy" alt=""
                    class="cta-arrow circle ">
                  <div class="button-fill "></div>
                </a> -->
              <a href="{{route('jobMarketplace')}}" class="button-circle w-inline-block hire bg-remove-hover">
                <img src="{{asset('assets/images/arrow-2.svg')}}" loading="lazy" alt="" class="cta-arrow circle">
                <div class="button-fill"></div>
              </a>
            </div>
          </div>
          <div id="w-node-_3e1fb2c1-966e-50f2-5571-5898221010d8-b18f5798" class="scale-up">
            <img src="{{ asset('assets/images/ui-038.png') }}" loading="lazy" sizes="(max-width: 479px) 100vw, (max-width: 767px) 69vw, (max-width: 991px) 73vw, 75vw" srcset="{{ asset('assets/images/ui-038-p-500.png') }} 500w, {{ asset('assets/images/ui-038-p-800.png') }} 800w, {{ asset('assets/images/ui-038-p-1080.png') }} 1080w, {{ asset('assets/images/ui-038-p-1600.png') }} 1600w, {{ asset('assets/images/ui-038-p-2000.png') }} 2000w, {{ asset('assets/images/ui-038.png') }} 2188w" alt="" class="full-image">
          </div>


        </div>
        <div class="sub-bg"></div>
      </div>
      <div class="hr-flex">
        <div class="card">
          <div class="inner-card">
            <div class="heading-col-wrapper">
              <div class="flex-hat">
                <div class="bullet"></div>
                <div class="heading-small regular">Jobs Marketplace</div>
              </div>
              <div class="overflow-heading">
                <h2 class="heading-large margin-bottom-xsmall">Explore Jobs From Korean Employers</h2>
              </div>
              <a href="{{route('jobMarketplace')}}" class="link-block w-inline-block">
                <div class="btn-label-wrapper">
                  <div class="label-button">Current Jobs</div>
                  <div class="arrow-wrapper"><img src="{{ asset('assets/images/cta-arrow-black.svg')}}" loading="lazy" alt="" class="icon-arrow-flip"><img src="{{ asset('assets/images/cta-arrow-white.svg')}}" loading="lazy" alt="" class="icon-arrow-flip"></div>
                </div>
                <div class="button-hover-fill"></div>
              </a>
            </div>
            <div class="graphics-wrapper">
              <img src="{{ asset('assets/images/ui-017.png') }}" loading="lazy" style="-webkit-transform:translate3d(0, 8em, 0) scale3d(0.88, 0.88, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 8em, 0) scale3d(0.88, 0.88, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" sizes="(max-width: 479px) 100vw, (max-width: 767px) 74vw, (max-width: 991px) 77vw, 37vw" srcset="{{ asset('assets/images/ui-017-p-500.png') }} 500w, {{ asset('assets/images/ui-017-p-800.png') }} 800w, {{ asset('assets/images/ui-017-p-1080.png') }} 1080w, {{ asset('assets/images/ui-017.png') }} 1548w" alt="" class="ui-image">
            </div>

          </div>
        </div>
        <div class="card">
          <div class="inner-card">
            <div class="heading-col-wrapper">
              <div class="flex-hat">
                <div class="bullet"></div>
                <div class="heading-small regular">EmployMe Blog</div>
              </div>
              <div class="overflow-heading">
                <h2 class="heading-large margin-bottom-xsmall">Check Out Our Blog For Insights, Tips and More</h2>
              </div>
              <a href="blog" class="link-block w-inline-block">
                <div class="btn-label-wrapper">
                  <div class="label-button">See more</div>
                  <div class="arrow-wrapper"><img src="{{ asset('assets/images/cta-arrow-black.svg')}}" loading="lazy" alt="" class="icon-arrow-flip"><img src="{{ asset('assets/images/cta-arrow-white.svg')}}" loading="lazy" alt="" class="icon-arrow-flip"></div>
                </div>
                <div class="button-hover-fill"></div>
              </a>
            </div>
            <div class="graphics-wrapper">
              <img src="{{ asset('assets/images/ui-019.png') }}" loading="lazy" style="-webkit-transform:translate3d(0, 8em, 0) scale3d(0.88, 0.88, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 8em, 0) scale3d(0.88, 0.88, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" sizes="(max-width: 479px) 100vw, (max-width: 767px) 74vw, (max-width: 991px) 77vw, 37vw" srcset="{{ asset('assets/images/ui-019-p-500.png') }} 500w, {{ asset('assets/images/ui-019-p-800.png') }} 800w, {{ asset('assets/images/ui-019-p-1080.png') }} 1080w, {{ asset('assets/images/ui-019.png') }} 1548w" alt="" class="ui-image">
            </div>

          </div>
        </div>
      </div>



    </div>
</section>
<div class="section padding-bottom-medium bg-purple">
  <div class="divider-wrapper bg-gray">
    <div class="divider bg-purple"></div>
  </div>
  <div class="container w-container">
    <div class="rounded-block bg-purple-image">
      <div class="w-layout-grid main-grid">
        <div id="w-node-_5e747d09-f72a-02e8-e5ae-78d2476c889c-476c889a" class="center-wrapper inner-padding-small">
          <div class="tag bg-opaci">WE WORK FOR YOU</div>
          <h3 class="heading-large margin-20 margin-bottom-small">Voice your opinions. Tell us what we can do <span class="span-scribble">better</span></h3>
          <div class="form-block w-form">
            <form id="wf-form-Join-Musk-Form" name="wf-form-Join-Musk-Form" data-name="Join Musk Form" method="get" class="form gap" data-wf-page-id="64cb35cd05058fe9b18f5798" data-wf-element-id="5e747d09-f72a-02e8-e5ae-78d2476c88a0"><input type="text" class="text-field w-input" maxlength="256" name="Name" data-name="Name" placeholder="Enter your name" id="Name" required=""><input type="email" class="text-field w-input" maxlength="256" name="Email" data-name="Email" placeholder="Enter your email" id="Email-4" required=""> <input type="text" class="text-field w-input" maxlength="256" name="Name" data-name="Name" placeholder="What can we do?" id="Name" required=""><input type="submit" value="" data-wait="Please wait..." class="button-circle-medium w-button"></form>
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
</div>


@endsection