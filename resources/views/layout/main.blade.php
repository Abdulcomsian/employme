<!DOCTYPE html>
<html lang="en">

<head>
	<title>@yield('title')</title>
	@include('template.header')
	<!-- Fix Internet Explorer ______________________________________-->
	<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="vendor/html5shiv.js"></script>
			<script src="vendor/respond.js"></script>
		<![endif]-->
</head>

<body>
	<div class="main-page-wrapper">
		<!-- ===================================================
				Loading Transition
			==================================================== -->
		@include('template.preloader')


        <!-- 
		=============================================
				Theme Main Menu
		============================================== 
		-->

        @include('template.header-nav')



        @yield('content')



        @include('template.footer-nav')

		<div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-fullscreen modal-dialog-centered">
				<div class="container">
					<div class="user-data-form modal-content">
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						<div class="text-center">
							<h2>Hi, Welcome Back!</h2>
							<p>Still don't have an account? <a href="signup">Sign up</a></p>
						</div>
						<div class="form-wrapper m-auto">
							<form action="{{route('authLogin')}}" class="mt-10" id = "LoginForm" method = "POST" >
								@csrf
							<div id="errors-list"></div>
								<div class="row">
									<div class="col-12">
										<div class="input-group-meta position-relative mb-25">
											<label>Email*</label>
											<input type="email" name = "email" placeholder="rshdkabir@gmail.com">
										</div>
									</div>
									<div class="col-12">
										<div class="input-group-meta position-relative mb-20">
											<label>Password*</label>
											<input type="password" name = "password" placeholder="Enter Password" class="pass_log_id">
											<span class="placeholder_icon"><span class="passVicon"><img src="{{asset('assets/images/icon/icon_60.svg')}}" alt=""></span></span>
										</div>
									</div>
									<div class="col-12">
										<div class="agreement-checkbox d-flex justify-content-between align-items-center">
											<div>
												<input type="checkbox" id="remember">
												<label for="remember">Keep me logged in</label>
											</div>
											<a href="{{asset('/forgot-password')}}">Forget Password?</a>
										</div> <!-- /.agreement-checkbox -->
									</div>
									<div class="col-12">
										<button class="btn-eleven fw-500 tran3s d-block mt-20" type = "button" id="loginButton">Login</button>
									</div>
								</div>
							</form>
							<!-- <div class="d-flex align-items-center mt-30 mb-10">
								<div class="line"></div>
								<span class="pe-3 ps-3">OR</span>
								<div class="line"></div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<a href="#" class="social-use-btn d-flex align-items-center justify-content-center tran3s w-100 mt-10">
										<img src="{{asset('assets/images/icon/google.png')}}" alt="">
										<span class="ps-2">Login with Google</span>
									</a>
								</div>
								<div class="col-md-6">
									<a href="#" class="social-use-btn d-flex align-items-center justify-content-center tran3s w-100 mt-10">
										<img src="{{asset('assets/images/icon/facebook.png')}}" alt="">
										<span class="ps-2">Login with Facebook</span>
									</a>
								</div>
							</div> -->
							<p class="text-center mt-10">Don't have an account? <a href="{{route('signup')}}" class="fw-500">Sign up</a></p>
						</div>
						<!-- /.form-wrapper -->
					</div>
					<!-- /.user-data-form -->
				</div>
			</div>
		</div>


        <button class="scroll-top">
			<i class="bi bi-arrow-up-short"></i>
		</button>

		@include('template.footer')
	</div> <!-- /.main-page-wrapper -->
</body>

</html>