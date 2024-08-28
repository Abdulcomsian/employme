<!DOCTYPE html><!--  This site was created in Webflow. https://www.webflow.com  -->
<!--  Last Published: Thu Aug 03 2023 05:20:30 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="64cb35cd05058fe9b18f5798" data-wf-site="64cb35cd05058fe9b18f5745">

<head>
  <meta charset="utf-8">
  <title>Home </title>
  <meta content="Mollie is a refined Webflow template focused on SaaS Tech companies that are eager to stand out in the crowd. A practical and versatile design to reach clients seeking outstanding visual businesses." name="description">
  <meta content="Mollie - Webflow Ecommerce Website Template" property="og:title">
  <meta content="Mollie is a refined Webflow template focused on SaaS Tech companies that are eager to stand out in the crowd. A practical and versatile design to reach clients seeking outstanding visual businesses." property="og:description">
  <meta content="Mollie - Webflow Ecommerce Website Template" property="twitter:title">
  <meta content="Mollie is a refined Webflow template focused on SaaS Tech companies that are eager to stand out in the crowd. A practical and versatile design to reach clients seeking outstanding visual businesses." property="twitter:description">
  <meta property="og:type" content="website">
  <meta content="summary_large_image" name="twitter:card">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="{{asset('assets/css/normalize.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/webflow.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/template.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/testing-e3d904.webflow.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">
    WebFont.load({
      google: {
        families: ["Inter:regular,500,600,700,800,900:latin,latin-ext", "Inter:100,200,300,regular", "IBM Plex Mono:regular,500,600"]
      }
    });
  </script>
  <script type="text/javascript">
    ! function(o, c) {
      var n = c.documentElement,
        t = " w-mod-";
      n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
    }(window, document);
  </script>
  <link href="{{asset('assets/images/favicon.png')}}" rel="shortcut icon" type="image/x-icon">
  <link href="{{asset('assets/images/webclip.png')}}" rel="apple-touch-icon">
  <style>
    body {
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }
  </style>

  @stack('extra-style')

</head>

<body>
  <!-- <div class="loader">
    <div class="loader-wrapper"><img src="../images/logo-mollie.svg" loading="lazy" alt="" class="logo-loader">
      <div class="progress-bar-wrapper">
        <div class="progress-bar"></div>
      </div>
    </div>
  </div> -->
  <nav class="wrappernav">
    <div data-collapse="medium" data-animation="default" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navbar w-nav">
      <div class="w-layout-grid navgrid">

        <a href="/" class="grid-wrapper logo"><strong style="font-size:x-large;">employme</strong></a>
        <nav role="navigation" id="w-node-b2052354-5446-da9c-e906-f9d98118b8b3-8118b8ae" class="nav-menu w-nav-menu">
          <div class="w-layout-grid grid-nav">
            <div id="w-node-_669fac26-e732-4363-56e3-6eeefb7f56ee-8118b8ae" class="main-navbar">
              <a href="/" class="nav-link w-nav-link">Home</a>
              <div data-hover="false" data-delay="0" class="dropdown w-dropdown">
                <div class="dropdown-toggle w-dropdown-toggle">
                  <div class="icon w-icon-dropdown-toggle"></div>
                  <div class="label-dropdown">Job Seekers</div>
                </div>
                <nav class="dropdown-list w-dropdown-list">
                  <div class="w-layout-grid dropdown-grid">
                    <div>
                      <a href="how-it-works" class="dropdown-link w-dropdown-link">How it
                        Works</a>
                      <a href="job-marketplace" class="dropdown-link w-dropdown-link" class="dropdown-link w-dropdown-link">Jobs Marketplace</a>
                      <a href="find-your-visa" class="dropdown-link w-dropdown-link" class="dropdown-link w-dropdown-link">Find Your Visa</a>
                      <a href="about-us" class="dropdown-link w-dropdown-link" class="dropdown-link w-dropdown-link">About Us</a>
                      <a href="blog" class="dropdown-link w-dropdown-link">Blog </a>
                      <a href="faq" class="dropdown-link w-dropdown-link">FAQ</a>
                    </div>
                  </div>
                </nav>
              </div>
              <div data-hover="false" data-delay="0" class="dropdown w-dropdown">
                <div class="dropdown-toggle w-dropdown-toggle">
                  <div class="icon w-icon-dropdown-toggle"></div>
                  <div class="label-dropdown">Employers</div>
                </div>
                <nav class="dropdown-list w-dropdown-list">
                  <div class="w-layout-grid dropdown-grid">
                    <div>
                      <a href="how-it-works-employer" class="dropdown-link w-dropdown-link">How it Works</a>
                      <a href="{{route('candidatesMarketplace')}}" class="dropdown-link w-dropdown-link">Candidates Marketplace</a>
                      <a href="pricing" class="dropdown-link w-dropdown-link">Pricing</a>
                      <a href="about-us-employer" class="dropdown-link w-dropdown-link">About Us</a>
                      <a href="blog-employer" class="dropdown-link w-dropdown-link">Blog </a>
                      <a href="faq" class="dropdown-link w-dropdown-link">FAQ</a>
                    </div>
                  </div>
                </nav>
              </div>
              <div data-hover="false" data-delay="0" class="dropdown w-dropdown">
                <div class="dropdown-toggle w-dropdown-toggle">
                  <div class="icon w-icon-dropdown-toggle"></div>
                  <div class="label-dropdown">Help Center</div>
                </div>
                <nav class="dropdown-list w-dropdown-list">
                  <div class="w-layout-grid dropdown-grid">
                    <div>
                      <a href="visa-support" class="dropdown-link w-dropdown-link">Visa
                        Support</a>
                      <a href="" class="dropdown-link w-dropdown-link">Incident Report</a>
                      <a href="contact" class="dropdown-link w-dropdown-link">Contact</a>

                    </div>
                  </div>
                </nav>
              </div>
            </div>
            @guest
            <div id="w-node-_9659cfe2-9876-6245-a2f7-ac3989b1b9f8-8118b8ae" class="buttons-nav-wrapper">
              <a href="{{route('signup')}}" class="link-block w-inline-block">
                <div class="btn-label-wrapper">
                  <div class="label-button">Join Now</div>
                  <div class="arrow-wrapper"><img src="{{asset('assets/images/cta-arrow-black.svg')}}" loading="lazy" alt="" class="icon-arrow-flip"><img src="{{asset('assets/images/cta-arrow-white.svg')}}" loading="lazy" alt="" class="icon-arrow-flip"></div>
                </div>
                <div class="button-hover-fill"></div>
              </a>
            </div>
            @endguest
            @auth
             @role('candidate')
            <div id="w-node-_9659cfe2-9876-6245-a2f7-ac3989b1b9f8-8118b8ae" class="buttons-nav-wrapper">
              <a href="{{route('getCandidateDashboard')}}" class="link-block w-inline-block">
                <div class="btn-label-wrapper">
                  <div class="label-button">Dashboard</div>
                  <div class="arrow-wrapper"><img src="{{asset('assets/images/cta-arrow-black.svg')}}" loading="lazy" alt="" class="icon-arrow-flip"><img src="{{asset('assets/images/cta-arrow-white.svg')}}" loading="lazy" alt="" class="icon-arrow-flip"></div>
                </div>
                <div class="button-hover-fill"></div>
              </a>
            </div>
            @endrole
            @role('admin')
            <div id="w-node-_9659cfe2-9876-6245-a2f7-ac3989b1b9f8-8118b8ae" class="buttons-nav-wrapper">
              <a href="{{route('getOwnerDashboard')}}" class="link-block w-inline-block">
                <div class="btn-label-wrapper">
                  <div class="label-button">Dashboard</div>
                  <div class="arrow-wrapper"><img src="{{asset('assets/images/cta-arrow-black.svg')}}" loading="lazy" alt="" class="icon-arrow-flip"><img src="{{asset('assets/images/cta-arrow-white.svg')}}" loading="lazy" alt="" class="icon-arrow-flip"></div>
                </div>
                <div class="button-hover-fill"></div>
              </a>
            </div>
            @endrole
            @role('employer')
            <div id="w-node-_9659cfe2-9876-6245-a2f7-ac3989b1b9f8-8118b8ae" class="buttons-nav-wrapper">
              <a href="{{route('getEmployerDashboard')}}" class="link-block w-inline-block">
                <div class="btn-label-wrapper">
                  <div class="label-button">Dashboard</div>
                  <div class="arrow-wrapper"><img src="{{asset('assets/images/cta-arrow-black.svg')}}" loading="lazy" alt="" class="icon-arrow-flip"><img src="{{asset('assets/images/cta-arrow-white.svg')}}" loading="lazy" alt="" class="icon-arrow-flip"></div>
                </div>
                <div class="button-hover-fill"></div>
              </a>
            </div>
            @endrole
            @endauth
          </div>
        </nav>
        <div id="w-node-b2052354-5446-da9c-e906-f9d98118b8c9-8118b8ae" data-w-id="b2052354-5446-da9c-e906-f9d98118b8c9" class="menu-button w-nav-button">
          <div class="menu-mobile">
            <div data-w-id="95a6b465-b1f6-32c9-f1ca-4e8c429efe2f" data-is-ix2-target="1" data-animation-type="lottie" data-src="{{asset('assets/documents/lf30_editor_0dtgjm93.json')}}" data-loop="0" data-direction="1" data-autoplay="0" data-renderer="svg" data-default-duration="1.5015014403440954" data-duration="0" data-ix2-initial-state="25"></div>
          </div>
        </div>
       
      </div>
    </div>
  </nav>

  @yield('content')

  <div class="bg-gray">
    <footer class="section">
      <div class="container footer w-container">
        <div class="w-layout-grid main-grid inner-padding-medium">
          <div id="w-node-_2bca43ef-7cde-b5da-b1b2-716107bf8e46-07bf8e43" class="grid-wrapper padding-bottom-small">
            <strong data-w-id="abdbb472-4b00-3ed8-42ca-09cb022d060c" data-wf-id="[&quot;3bce2b2b-97ed-9e60-d10f-53aeb3201909&quot;,&quot;abdbb472-4b00-3ed8-42ca-09cb022d060c&quot;]" style="font-size:x-large;">Employme</strong>
            <p class="main-paragraph margin-bottom-small">All-in-one platform for careers and visas</p>
            <div class="form-wrapper">
              <div class="full-form w-form">
                <form id="wf-form-Email-Hero" name="wf-form-Email-Hero" data-name="Email Hero" method="get" class="form single" data-wf-page-id="64cb35cd05058fe9b18f5848" data-wf-element-id="f74a4ca7-e334-6206-b99d-41381ef509ad"><input type="email" class="text-field small w-input" maxlength="256" name="Email-5" data-name="Email 5" placeholder="Enter your email" id="Email-5" required=""><input type="submit" value="" data-wait="Please wait..." class="button-circle-small w-button"></form>
                <div class="success w-form-done">
                  <div>Thank you! Your submission has been received!</div>
                </div>
                <div class="error w-form-fail">
                  <div>Oops! Something went wrong while submitting the form.</div>
                </div>
              </div>
            </div>
          </div>
          <div id="w-node-_2bca43ef-7cde-b5da-b1b2-716107bf8e80-07bf8e43" class="footer-inner">
            <div class="small-legal-text">© Employme — South Korea <a href="http://www.webflow.com" target="_blank" class="link"></a>
            </div>

          </div>
          <div id="w-node-_2bca43ef-7cde-b5da-b1b2-716107bf8e83-07bf8e43" class="footer-inner">
            <div class="w-layout-grid grid-buttons social">
              <a id="w-node-_2bca43ef-7cde-b5da-b1b2-716107bf8e85-07bf8e43" href="#" class="link-icons center w-inline-block"><img src="{{asset('assets/images/instagram-icon.svg')}}" loading="lazy" alt="" class="icon-social"></a>
              <a href="#" class="link-icons center w-inline-block"><img src="{{asset('assets/images/facebook-icon.svg')}}" loading="lazy" alt="" class="icon-social"></a>
              <a href="#" class="link-icons center w-inline-block"><img src="{{asset('assets/images/linkedin-icon.svg')}}" loading="lazy" alt="" class="icon-social"></a>
              <a href="#" class="link-icons center w-inline-block"><img src="{{asset('assets/images/twitter-icon.svg')}}" loading="lazy" alt="" class="icon-social"></a>
            </div>
          </div>
          <div id="w-node-_2bca43ef-7cde-b5da-b1b2-716107bf8e4a-07bf8e43" class="w-layout-grid inner-footer-nav">
            <div id="w-node-_2bca43ef-7cde-b5da-b1b2-716107bf8e4b-07bf8e43" class="grid-wrapper">
              <ul role="list" class="w-list-unstyled">
                <li>
                  <h4 class="heading-small">Job Seekers</h4>
                </li>
                <li>
                  <a href="{{route('howItWorks')}}" class="link-footer">How it works</a>
                </li>
                <li>
                  <a href="job-marketplace" class="link-footer">Jobs Marketplace</a>
                </li>
                <li>
                  <a href="about-us" class="link-footer">About us</a>
                </li>
                <li>
                  <a href="faq" aria-current="page" class="link-footer w--current">FAQ</a>
                </li>
              </ul>
            </div>
            <div id="w-node-_2bca43ef-7cde-b5da-b1b2-716107bf8e5c-07bf8e43" class="grid-wrapper">
              <ul role="list" class="w-list-unstyled">
                <li>
                  <h4 class="heading-small">Employers</h4>
                </li>
                <li>
                  <a href="how-it-works-employer" class="link-footer">How it works</a>
                </li>
                <li>
                  <a href="{{route('candidatesMarketplace')}}" class="link-footer">Candidate Marketplace</a>
                </li>
                <li>
                  <a href="about-us-employer" class="link-footer">About us</a>
                </li>
                <li>
                  <a href="faq" class="link-footer">FAQ</a>
                </li>
              </ul>
            </div>
            <div id="w-node-_2bca43ef-7cde-b5da-b1b2-716107bf8e6d-07bf8e43" class="grid-wrapper">
              <ul role="list" class="w-list-unstyled">
                <li>
                  <h4 class="heading-small">Help Center</h4>
                </li>
                <li>
                  <a href="terms-of-services" class="link-footer">Terms of service</a>
                </li>
                <li>
                  <a href="visa-support" class="link-footer">Visa Support</a>
                </li>
                <li>
                  <a href="/" class="link-footer">Privacy policy</a>
                </li>
                <li>
                  <a href="/" class="link-footer">Incident report</a>
                </li>
                <li>
                  <a href="contact" class="link-footer">Contact</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=64cb35cd05058fe9b18f5745" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="{{asset('assets/js/webflow.js')}}" type="text/javascript"></script>

</body>

</html>