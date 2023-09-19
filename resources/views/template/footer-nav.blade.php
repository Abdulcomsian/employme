<div class="footer-one">
    <div class="container">
        <div class="inner-wrapper">
            <div class="row">
                <div class="col-lg-2 col-md-3 footer-intro mb-15">
                    <div class="logo mb-15">
                        <a href="index.html" class="d-flex align-items-center">
                            <img src="{{asset('assets/images/logo/logo_03.png')}} " alt="">
                        </a>
                    </div> 
                    <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/shape/shape_28.svg')}}" alt="" class="lazy-img mt-80 sm-mt-30 sm-mb-20">
                    <!-- logo -->
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 mb-20">
                    <h5 class="footer-title">Services​</h5>
                    <ul class="footer-nav-link style-none">
                        <li><a href="{{route('jobMarketplace')}}">Browse Jobs</a></li>
                        <li><a href="company-v1.html">Companies</a></li>
                        <li><a href="candidates-v1.html">Candidates</a></li>
                        <li><a href="{{route('pricing')}}">Pricing</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 mb-20">
                    <h5 class="footer-title">Company</h5>
                    <ul class="footer-nav-link style-none">
                        <li><a href="{{route('about')}}">About us</a></li>
                        <li><a href="{{route('blog')}}">Blogs</a></li>
                        <li><a href="{{route('faq')}}">FAQ’s</a></li>
                        <li><a href="{{route('contact')}}">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 mb-20">
                    <h5 class="footer-title">Support</h5>
                    <ul class="footer-nav-link style-none">
                        <li><a href="contact.html">Terms of use</a></li>
                        <li><a href="contact.html">Terms & conditions</a></li>
                        <li><a href="contact.html">Privacy</a></li>
                        <li><a href="contact.html">Cookie policy</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 mb-20 footer-newsletter">
                    <h5 class="footer-title">Newsletter</h5>
                    <p>Join & get important new regularly</p>
                    <form action="#" class="d-flex">
                        <input type="email" placeholder="Enter your email*">
                        <button>Send</button>
                    </form>
                    <p class="note">We only send interesting and relevant emails.</p>
                </div>
            </div>
        </div> <!-- /.inner-wrapper -->
    </div>
    <div class="bottom-footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 order-lg-3 mb-15">
                    <ul class="style-none d-flex order-lg-last justify-content-center justify-content-lg-end social-icon">
                        <li><a href="#"><i class="bi bi-whatsapp"></i></a></li>
                        <li><a href="#"><i class="bi bi-dribbble"></i></a></li>
                        <li><a href="#"><i class="bi bi-google"></i></a></li>
                        <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-4 order-lg-1 mb-15">
                    <ul class="d-flex style-none bottom-nav justify-content-center justify-content-lg-start">
                        <li><a href="contact.html">Privacy & Terms.</a></li>
                        <li><a href="{{route('contact')}}"> Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 order-lg-2">
                    <p class="text-center mb-15">Copyright @2023 jobi inc.</p>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /.footer-one -->