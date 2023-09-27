@extends('layout.main')


@section('content')

<div class="inner-banner-one position-relative">
			<div class="container">
				<div class="position-relative">
					<div class="row">
						<div class="col-xl-6 m-auto text-center">
							<div class="title-two">
								<h2 class="text-white"> School Name</h2>
							</div>
							<div class="logo mt-10">
								<img src="images/logo_01.png" data-src="images/logo/logo_01.png" alt=""
									class="lazy-img m-auto">
							</div>
							<!-- <p class="text-lg text-white mt-10 lg-mt-20">Find company details here</p> -->
						</div>
					</div>

				</div>
			</div>







			<img src="images/lazy.svg" data-src="images/shape/shape_02.svg" alt="" class="lazy-img shapes shape_01">
			<img src="images/lazy.svg" data-src="images/shape/shape_03.svg" alt="" class="lazy-img shapes shape_02">
		</div> <!-- /.inner-banner-one -->

		  

		  

		  <nav class="nav-2" id="menu">
			<ul id="menu-closed">
            <li><a href="{{route('companyAboutUs')}}"> About Us</a></li>
			  <li>	<a href="{{route('companyFacilities')}}" > School Facilities</a></li>
			  <li><a href="{{route('companyStaff')}}">Staff and Community</a></li>
			  <li><a href="{{route('companyPrograms')}}">Programs and Curriculum</a></li>
			  <li>	<a href="{{route('companyReviews')}}" >Reviews and Testimonials</a></li>
			  <li><a href="{{route('companyGallery')}}" class="active">Gallery</a></li>
			  <li><a href="{{route('companyLocation')}}">Location and Accessibility</a></li>
			  <li><a href="{{route('companyStaffInfo')}}" > Current Staff Information</a></li>
			  <li><a href="#menu-closed">&#215; </a></li>
			  <li><a href="#menu">&#9776; more</a></li>
			</ul>
		  </nav>





		<section class="company-details pt-110 lg-pt-80 pb-160 xl-pb-150 lg-pb-80">
			<div class="container">
						<h1>Gallery</h1>
						<p>Photos: (Images of classrooms, events, staff, and students, housing)</p>
						<p>Videos: (Short clips or promotional videos showcasing the school environment, events, or teaching methods)</p>
                      




			</div>
		</section>


@endsection