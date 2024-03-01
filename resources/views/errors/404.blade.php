<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="keywords" content="Digital marketing agency, Digital marketing company, Digital marketing services">
	<meta name="description" content="Jobi is a beautiful website template designed for job board websites.">
    <meta property="og:site_name" content="Jano">
    <meta property="og:url" content="https://creativegigstf.com">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Jobi - Responsive Job Board HTML Template">
	<meta name='og:image' content='images/assets/ogg.png'>
	<!-- For IE -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- For Resposive Device -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- For Window Tab Color -->
	<!-- Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="#244034">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="#244034">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#244034">
	<title>Error</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" sizes="56x56" href="images/fav-icon/icon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}" media="all">
	<!-- Main style sheet -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}" media="all">
	<!-- responsive style sheet -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}" media="all">

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
		<div id="preloader">
			<div id="ctn-preloader" class="ctn-preloader">
				
			<span style="font-size: 25px;font-weight: bold;">EmployMe</span>
			</div>
		</div>

        <!-- Error Page -->
        <div class="error-page d-flex align-items-center justify-content-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-md-6 ms-auto order-md-last">
                        <div class="error">404</div>
                        <h2>Page Not Found </h2>
                        <p class="text-md">Can not find what you need? Take a moment and do a search below or start from our Homepage.</p>
                        <a href="{{URL::previous()}}" class="btn-one w-100 d-flex align-items-center justify-content-between mt-30">
                            <span>GO BACK</span>
                            <img src="images/icon/icon_61.svg" alt="">
                        </a>
                    </div>
                    <div class="col-md-6 order-md-first">
                        <img src="images/assets/404.svg" alt="" class="sm-mt-60">
                    </div>
                </div>
            </div>
        </div>

		




		<!-- Optional JavaScript _____________________________  -->

		<!-- jQuery first, then Bootstrap JS -->
		<!-- jQuery -->
		<script src="{{asset('assets/vendor/jquery.min.js')}}"></script>
		<!-- Bootstrap JS -->
		<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


		<!-- Theme js -->
		<script src="{{asset('assets/js/theme.js')}}"></script>
	</div> <!-- /.main-page-wrapper -->
</body>

</html>