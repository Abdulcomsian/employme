<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
	@include('employer.layout.header')

	<!-- Fix Internet Explorer ______________________________________-->
	<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="vendor/html5shiv.js"></script>
			<script src="vendor/respond.js"></script>
		<![endif]-->
        @yield('page-css')
</head>

<body>
	<div class="main-page-wrapper">
		<!-- ===================================================
				Loading Transition
			==================================================== -->
		<div id="preloader">
			<div id="ctn-preloader" class="ctn-preloader">
				<div class="icon"><img src="{{asset('assets/images/loader.svg')}}" alt="" class="m-auto d-block" width="60"></div>
				<div class="txt-loading">
					<span data-text-preloader="j" class="letters-loading">
						j
					</span>
					<span data-text-preloader="o" class="letters-loading">
						o
					</span>
					<span data-text-preloader="b" class="letters-loading">
						b
					</span>
					<span data-text-preloader="i" class="letters-loading">
						i
					</span>
				</div>
			</div>
		</div>

		<!-- 
		=============================================
				Dashboard Aside Menu
		============================================== 
		-->
		
        @include('employer.layout.aside-nav')

		<!-- /.dash-aside-navbar -->


        @yield('content')



		<!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                <div class="container">
                    <div class="remove-account-popup text-center modal-content">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						<img src="../images/lazy.svg" data-src="{{asset('assets/images/dashboard-icon/icon_22.svg')}}" alt="" class="lazy-img m-auto">
						<h2>Are you sure?</h2>
						<p>Are you sure to delete your account? All data will be lost.</p>
						<div class="button-group d-inline-flex justify-content-center align-items-center pt-15">
							<a href="#" class="confirm-btn fw-500 tran3s me-3">Yes</a>
							<button type="button" class="btn-close fw-500 ms-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
						</div>
                    </div>
                    <!-- /.remove-account-popup -->
                </div>
            </div>
        </div>
		


		<button class="scroll-top">
			<i class="bi bi-arrow-up-short"></i>
		</button>




		<!-- Optional JavaScript _____________________________  -->

		@include('employer.layout.footer')

        @yield('page-script')

	</div> <!-- /.main-page-wrapper -->
</body>

</html>