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
	@stack('page-css')
	<meta name="csrf-token" content="{{ csrf_token() }}">

		<!--  test -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}" media="all">	
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/select2.css')}}" media="all">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />	
</head>

<body>
	<div class="main-page-wrapper">
		<!-- ===================================================
				Loading Transition
			==================================================== -->
		<div id="preloader">
			<div id="ctn-preloader" class="ctn-preloader">
				
			<span style="font-size: 25px;font-weight: bold;color:#000;">employme</span>
			</div>
		</div>

		<!-- 
		=============================================
				Dashboard Aside Menu
		============================================== 
		-->

		@include('owner.layout.aside-nav')

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

		@include('owner.layout.footer')

		@stack('page-script')
	
	</div> <!-- /.main-page-wrapper -->
</body>

</html>