@extends('components.master')

@section('content')
<section class="section bg-yellow">
  <div class="container hero w-container">
    <div class="rounded-block ">
      <div class="w-layout-grid main-grid">
        <div id="w-node-aa2f0cd9-7fd9-dbab-7331-5324dbc92343-b18f57a8" class="graphics-wrapper">
          <div class="scale-up center" style="transform: translate3d(0px, 0em, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d; opacity: 1;">
            <img src="{{ asset('assets/images/ui-037_1.png') }}" loading="lazy" sizes="(max-width: 479px) 79vw, (max-width: 767px) 80vw, (max-width: 991px) 84vw, 87vw" srcset="{{ asset('assets/images/ui-037_1-p-500.png') }} 500w, {{ asset('assets/images/ui-037_1-p-800.png') }} 800w, {{ asset('assets/images/ui-037_1-p-1080.png') }} 1080w, {{ asset('assets/images/ui-037_1-p-1600.png') }} 1600w, {{ asset('assets/images/ui-037_1.png') }} 1828w" alt="">
          </div>
        </div>
        <div id="w-node-aa2f0cd9-7fd9-dbab-7331-5324dbc92347-b18f57a8" class="content-wrapper inner-padding-small">
          <div class="flex-hat">
            <div class="bullet"></div>
            <div class="heading-small regular"> Find your visa</div>
          </div>
          <h2 class="heading-xlarge margin-bottom-xsmall" style="padding-left: 70px;">Check to see what <span class="span-scribble-circle">visa</span> <span class="span-scribble">you can get</span></h2>
          <a href="#" class="link-block yellow w-inline-block">
            <div class="btn-label-wrapper">
              <div class="label-button">Get started</div>
              <div class="arrow-wrapper"><img src="{{asset('assets/images/cta-arrow-black.svg')}}" loading="lazy" alt="" class="icon-arrow-flip"><img src="../images/cta-arrow-white.svg" loading="lazy" alt="" class="icon-arrow-flip"></div>
            </div>
            <div class="button-hover-fill"></div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="divider-wrapper bg-white">
    <div class="divider bottom bg-yellow">
      <div class="bg-yellow"></div>
    </div>
  </div>
</section>
@endsection