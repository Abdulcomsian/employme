@extends('components.master')

@section('content')
<div class="section blog-post">
  <div class="container titles w-container">
    <h1 class="heading-large">Read our most popular articles.</h1>
  </div>
</div>
<div class="section">
  <div class="container margin-bottom-medium w-container">
    <div class="w-layout-grid main-grid-1 wf-grid">
      <div id="w-node-b7575744-a576-67bb-b83d-7346f92b9541-28bfa124" class="wrapper-sticky blog">
        <div class="w-dyn-list">
          <div role="list" class="w-dyn-items">
            <div data-dyn-label="Collection Item 1" role="listitem" class="w-dyn-item"><a href="/post/7-ways-to-improve-website-usability-and-accessibility" class="blog-link-wrapper w-inline-block">
                <div class="wrapper-image-blog rounded"><img loading="lazy" src="{{asset('assets/images/av-12.png')}}" alt="" class="image-cms"></div>
                <div class="paragraph-wrapper inner-padding-small">
                  <div class="title-tag text-red">Trends</div>
                  <h2 class="heading-medium text-light">7 Ways To Improve Website Usability And Accessibility</h2>
                </div>
              </a></div>
          </div>
          <div class="w-dyn-hide w-dyn-empty">
            <div>No items found.</div>
          </div>
        </div>
      </div>
      <div id="w-node-b85a6e33-96aa-3f7c-4e4e-000e7abdde9c-28bfa124">
        <div class="w-dyn-list">
          <div role="list" class="w-dyn-items">
            <div data-dyn-label="Collection Item 1" role="listitem" class="w-dyn-item"><a href="/post/why-we-love-webflow-and-you-should-too" class="inner-grid-cms w-inline-block wf-grid">
                <div class="wrapper-image-blog list rounded"><img src="{{asset('assets/images/jj-jordan-hINQgaTqg7Q-unsplash.jpg')}}" alt="" class="image-cms">
                </div>
                <div id="w-node-_99e36361-3e4e-2043-c2f4-d28c1533f32e-28bfa124">
                  <div class="title-tag text-red">Company News</div>
                  <h3 class="heading-small text-light">Why We Love Webflow (And You Should, Too!)</h3>
                </div>
              </a></div>
            <div data-dyn-label="Collection Item 2" role="listitem" class="w-dyn-item"><a href="/post/7-must-have-tools-for-web-designers" class="inner-grid-cms w-inline-block wf-grid">
                <div class="wrapper-image-blog list rounded"><img src="{{asset('assets/images/jj-219094.png')}}" alt="check" class="image-cms">
                </div>
                <div id="w-node-_99e36361-3e4e-2043-c2f4-d28c1533f32e-28bfa124">
                  <div class="title-tag text-red">Trends</div>
                  <h3 class="heading-small text-light">7 Must Have Tools For Web Designers</h3>
                </div>
              </a></div>
            <div data-dyn-label="Collection Item 3" role="listitem" class="w-dyn-item"><a href="/post/7-of-the-best-examples-of-beautiful-blog-design" class="inner-grid-cms w-inline-block wf-grid">
                <div class="wrapper-image-blog list rounded"><img loading="lazy" src="{{asset('assets/images/532563.png')}}" alt="" class="image-cms">
                </div>
                <div id="w-node-_99e36361-3e4e-2043-c2f4-d28c1533f32e-28bfa124">
                  <div class="title-tag text-red">New Features</div>
                  <h3 class="heading-small text-light">7 of the Best Examples of Beautiful Blog Design</h3>
                </div>
              </a></div>
            <div data-dyn-label="Collection Item 4" role="listitem" class="w-dyn-item"><a href="/post/5-web-design-blogs-you-should-be-reading" class="inner-grid-cms w-inline-block wf-grid">
                <div class="wrapper-image-blog list rounded"><img src="{{asset('assets/images/7561440.png')}}" alt="" class="image-cms">
                </div>
                <div id="w-node-_99e36361-3e4e-2043-c2f4-d28c1533f32e-28bfa124">
                  <div class="title-tag text-red">Company News</div>
                  <h3 class="heading-small text-light">5 Web Design Blogs You Should Be Reading</h3>
                </div>
              </a></div>
          </div>
          <div class="w-dyn-hide w-dyn-empty">
            <div>No items found.</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- <div class="section">
    <div class="container margin-bottom-medium w-container">
      <div class="w-layout-grid main-grid">       
        <div id="w-node-b7575744-a576-67bb-b83d-7346f92b9541-b18f57c1" class="wrapper-sticky blog">
          <div class="w-dyn-list">
            <div role="list" class="w-dyn-items">
              <div role="listitem" class="w-dyn-item">
                <a href="#" class="blog-link-wrapper w-inline-block">
                  <div class="wrapper-image-blog rounded"><img src="" loading="lazy" alt="" class="image-cms"></div>
                  <div class="paragraph-wrapper inner-padding-small">
                    <div class="title-tag text-red"></div>
                    <h2 class="heading-medium text-light"></h2>
                  </div>
                </a>
              </div>
            </div>
            <div class="w-dyn-empty">
              <div>No items found.</div>
            </div>
          </div>
        </div>
        <div id="w-node-b85a6e33-96aa-3f7c-4e4e-000e7abdde9c-b18f57c1">
          <div class="w-dyn-list">
            <div role="list" class="w-dyn-items">
              <div role="listitem" class="w-dyn-item">
                <a href="#" class="inner-grid-cms w-inline-block">
                  <div class="wrapper-image-blog list rounded"><img src="" loading="lazy" alt="" class="image-cms"></div>
                  <div id="w-node-_99e36361-3e4e-2043-c2f4-d28c1533f32e-b18f57c1">
                    <div class="title-tag text-red"></div>
                    <h3 class="heading-small text-light"></h3>
                  </div>
                </a>
              </div>
            </div>
            <div class="w-dyn-empty">
              <div>No items found.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
<div>
  <div class="container w-container">
    <div class="gray-wrapper bg-purple">
      <div class="w-layout-grid main-grid inner-padding-small">
        <div id="w-node-c2864e63-da07-45d7-a893-74ed488cfc26-488cfc24" class="center-wrapper">
          <h2 class="heading-medium mt-onehalf-em">Never miss an update</h2>
          <div class="mt-onehalf-em">
            <p class="main-paragraph text-align-left">Stay informed and stay ahead by keeping yourself up to date with the most recent developments, news, and much more</p>
          </div>
        </div>
        <div id="w-node-c2864e63-da07-45d7-a893-74ed488cfc2c-488cfc24" class="form-block center w-form mt-onehalf-em">
          <form id="wf-form-Newsletter" name="wf-form-Newsletter" data-name="Newsletter" method="get" class="form margin-bottom-small" data-wf-page-id="64cb35cd05058fe9b18f57c1" data-wf-element-id="c2864e63-da07-45d7-a893-74ed488cfc2d">
            <input type="text" class="text-field flex-white w-input" maxlength="256" name="First-Name" data-name="First Name" placeholder="First Name" id="First-Name" required="">
            <!-- <input type="text"
                class="text-field flex-white w-input" maxlength="256" name="Last-Name" data-name="Last Name"
                placeholder="Last Name" id="Last-Name-4" required=""> -->
            <input type="email" class="text-field flex-white w-input" maxlength="256" name="Email" data-name="Email" placeholder="Enter your email" id="Email-6" required=""><input type="submit" value="Get Started" data-wait="Please wait..." class="button plan w-button">
          </form>
          <!-- <div class="text-small">Disclaimer Legal Sentence</div> -->
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
@endsection