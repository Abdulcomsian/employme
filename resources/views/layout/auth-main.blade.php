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




        @yield('content')




	

		@include('template.footer')
	</div> <!-- /.main-page-wrapper -->
</body>

</html>