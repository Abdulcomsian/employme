@extends('layout.main')


@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
<style>

	.housings-section img{
		width: 255px;
    height: 170px;
	}
	.swiper {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
	.company-details .details-post-data .container p {
		margin-bottom: 21px;
		padding-left: 10px;
	}

	.company-details .details-post-data .container h2 {
		font-size: 67px;
	}
	.company-details .details-post-data .video-post {
		background: url("{{asset('/'.$employerDetails->video_thumbnail)}}") no-repeat center;
		background-size: cover;
		height: 440px;
		border-radius: 10px;
	}
	.active{
		color: #D2F34C !important;
	}
	
	.col-xxl-9.col-xl-8.order-xl-first.card.my-3.mr-1.p-1 {
		border: 1px solid black;
		border-radius: 10px;
		padding: 10px !important;
	}
	.padding-box{
		padding: 35px 40px 20px !important;
		
		border-radius: 20px;
	}
	.padding-box h3{
		font-size: 22px !important;
		font-family: "gordita";
		margin: 0;
	}
	.video-post .video-icon {
		width: 65px;
		height: 65px;
		background: #D2F34C;
		color: #000;
		font-size: 45px;
		line-height: 65px;
		padding-left: 7px;
	}
	.video-title {
    font-size: 28px !important ;
    font-weight: 500;
    font-family: "gordita" !important;
    margin-bottom: 22px !important;
}

 .job-list-one:hover{
    box-shadow: 0 0 12px 6px rgba(0, 0, 0, 0.2);
}
</style>
<div class="inner-banner-one position-relative">
	<div class="container">
		<div class="position-relative">
			<div class="row">
				<div class="col-xl-12 text-center">
					<div class="title-two">
						<h2 class="text-white"> {{$employerDetails->institution ?? ''}}</h2>
					</div>
					<div class="logo mt-10">
					 {{--<span style="font-size: 25px;font-weight: bold;">employme</span>--}}
					</div>
					<!-- <p class="text-lg text-white mt-10 lg-mt-20">Find company details here</p> -->
				</div>
			</div>

		</div>
	</div>
	<img src="images/lazy.svg" data-src="images/shape/shape_02.svg" alt="" class="lazy-img shapes shape_01">
	<img src="images/lazy.svg" data-src="images/shape/shape_03.svg" alt="" class="lazy-img shapes shape_02">
</div> <!-- /.inner-banner-one -->
{{-- <nav class="nav-2" id="menu">
	<ul id="menu-closed">
	<li><a href="{{route('companyAboutUs', \Crypt::encryptString($employerDetails->user_id))}}" class="active"> About Us</a></li>
	<li><a href="{{route('companyStaff', \Crypt::encryptString($employerDetails->user_id))}}">Current Staff</a></li>
	<li><a href="{{route('companyGallery', \Crypt::encryptString($employerDetails->user_id))}}">Media Gallery</a></li>
	<li><a href="{{route('companyBusinessOperation', \Crypt::encryptString($employerDetails->user_id))}}">Business Operation</a></li>
	<li><a href="{{route('companyJobs', \Crypt::encryptString($employerDetails->user_id))}}" >Jobs</a></li>
	<li><a href="{{route('companyHousings', \Crypt::encryptString($employerDetails->user_id))}}">Housings</a></li>

		<li><a href="#menu-closed">&#215; </a></li>
		<li><a href="#menu">&#9776; more</a></li>
	</ul>
</nav> --}}
<section class="company-details pt-110 lg-pt-80 pb-160 xl-pb-150 lg-pb-80">
	<div class="container">
		<div class="row mx-0">
			<div class="col-md-9">
				<div class="row mx-0">
					
                    @isset($employerDetails->employer_details)
					<div class="col-xxl-12 col-xl-12 order-xl-first card  mb-60 mr-1 p-1 padding-box">
						<div class="details-post-data me-xxl-5 pe-xxl-4">
							<!-- <h3>Overview</h3> -->
							<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mauris vitae ultricies leo integer malesuada nunc vel risus commodo. Vulputate odio ut enim blandit. Nibh ipsum consequat nisl vel pretium lectus quam.</p> -->
							<!-- <p> Nulla at volutpat diam ut. Lobortis feugiat vivamus at augue eget arcu. Urna condimentum mattis pellentesque id nibh tortor id aliquet. Dignissim cras tincidunt lobortis feugiat. Est sit amet facilisis magna etiam tempor. Eu augue ut lectus arcu bibendum at varius vel pharetra. Vel facilisis volutpat est velit egestas dui id. Ut pharetra sit amet aliquam. Elit at imperdiet dui accumsan sit amet nulla facilisi morbi. Tellus in metus vulputate eu scelerisque felis imperdiet proin. Magna fringilla urna porttitor rhoncus. Et odio pellentesque diam volutpat. Congue eu consequat ac felis donec et odio pellentesque diam. Accumsan in nisl nisi scelerisque eu ultrices vitae auctor eu. </p> -->
							<!-- <p>Felis eget velit aliquet sagittis id. Massa placerat duis ultricies lacus sed turpis tincidunt id. Vel eros donec ac odio tempor orci dapibus ultrices. Ipsum consequat nisl vel pretium lectus quam. Dignissim sodales ut eu sem. </p> -->


							<div class="container">
								<h3>About Us</h3>
								{{--<p><b>School's Mission & Vision:</b> {{$employerDetails->school_vision_and_mission}}</p>--}}
								<p>{!! $employerDetails->employer_details ?? '' !!}</p>
					
								<!-- <p><b>Teaching Philosophy:</b> (Details about the school's pedagogic beliefs and methods)</p> -->
							</div>
						</div>
					</div>
					@endisset
					@if($introductionVideo)
					<!-- <div class="inner-card mb-60 lg-mb-50">
						<div class="video-post d-flex align-items-center justify-content-center mt-25 lg-mt-20 mb-75 lg-mb-50">
							<a class="fancybox rounded-circle video-icon tran3s text-center" data-fancybox="" href="http://127.0.0.1:8000/uploads/candidate/videos/171376439287871.mp4">
								<i class="bi bi-play"></i>
							</a>
						</div>
                    </div> -->
					<div class="col-xxl-12 col-xl-12 order-xl-first card mb-60 mr-1 p-1 padding-box">
							<h3 class="video-title mb-5">Welcome Video</h3>
							<video width="100%" height="360" controls>
								<source src="{{asset('uploads/employer/introduction-video/'.$introductionVideo->file_path)}}" type="video/mp4">
							</video>
						</div>
					@endif
					@if($galleryFiles && $galleryFiles->isNotEmpty())
					<div class="col-xxl-12 col-xl-12 order-xl-first card mb-60 mr-1 p-1 padding-box">
						<div class="details-post-data me-xxl-5 pe-xxl-4">
							<!-- <h3>Overview</h3> -->
							<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mauris vitae ultricies leo integer malesuada nunc vel risus commodo. Vulputate odio ut enim blandit. Nibh ipsum consequat nisl vel pretium lectus quam.</p> -->
							<!-- <p> Nulla at volutpat diam ut. Lobortis feugiat vivamus at augue eget arcu. Urna condimentum mattis pellentesque id nibh tortor id aliquet. Dignissim cras tincidunt lobortis feugiat. Est sit amet facilisis magna etiam tempor. Eu augue ut lectus arcu bibendum at varius vel pharetra. Vel facilisis volutpat est velit egestas dui id. Ut pharetra sit amet aliquam. Elit at imperdiet dui accumsan sit amet nulla facilisi morbi. Tellus in metus vulputate eu scelerisque felis imperdiet proin. Magna fringilla urna porttitor rhoncus. Et odio pellentesque diam volutpat. Congue eu consequat ac felis donec et odio pellentesque diam. Accumsan in nisl nisi scelerisque eu ultrices vitae auctor eu. </p> -->
							<!-- <p>Felis eget velit aliquet sagittis id. Massa placerat duis ultricies lacus sed turpis tincidunt id. Vel eros donec ac odio tempor orci dapibus ultrices. Ipsum consequat nisl vel pretium lectus quam. Dignissim sodales ut eu sem. </p> -->


							<div class="container">
								<h3>Gallery</h3>
								{{--<p>Photos: (Images of classrooms, events, staff, and students, housing)</p>
								<p>Videos: (Short clips or promotional videos showcasing the school environment, events, or teaching methods)</p>--}}
							</div>
							<div class="row">
							<div class="swiper mySwiper">
								<!-- Additional required wrapper -->
								<div class="swiper-wrapper">
									<!-- Slides -->
									@foreach($galleryFiles as $index =>  $gallery)
											@if($gallery->file_extension != 'mp4')
									<div class="swiper-slide">
									
												<img class="d-block w-100 img-round"  src="{{asset($gallery->file_name)}}" alt="First slide">
											
									</div>
									@endif
										@endforeach
									...
								</div>
								<!-- If we need pagination -->
								<div class="swiper-pagination"></div>
								

								<!-- If we need navigation buttons -->
								<div class="swiper-button-prev"></div>
								<div class="swiper-button-next"></div>

								</div>
							</div>
						</div>
					</div>
					@endif
					@if($employerStaff && $employerStaff->isNotEmpty())
					<div class="col-xxl-12 col-xl-12 order-xl-first card mb-60 mr-1 p-1 padding-box">
						<div class="details-post-data me-xxl-5 pe-xxl-4">
							<!-- <h3>Overview</h3> -->
							<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mauris vitae ultricies leo integer malesuada nunc vel risus commodo. Vulputate odio ut enim blandit. Nibh ipsum consequat nisl vel pretium lectus quam.</p> -->
							<!-- <p> Nulla at volutpat diam ut. Lobortis feugiat vivamus at augue eget arcu. Urna condimentum mattis pellentesque id nibh tortor id aliquet. Dignissim cras tincidunt lobortis feugiat. Est sit amet facilisis magna etiam tempor. Eu augue ut lectus arcu bibendum at varius vel pharetra. Vel facilisis volutpat est velit egestas dui id. Ut pharetra sit amet aliquam. Elit at imperdiet dui accumsan sit amet nulla facilisi morbi. Tellus in metus vulputate eu scelerisque felis imperdiet proin. Magna fringilla urna porttitor rhoncus. Et odio pellentesque diam volutpat. Congue eu consequat ac felis donec et odio pellentesque diam. Accumsan in nisl nisi scelerisque eu ultrices vitae auctor eu. </p> -->
							<!-- <p>Felis eget velit aliquet sagittis id. Massa placerat duis ultricies lacus sed turpis tincidunt id. Vel eros donec ac odio tempor orci dapibus ultrices. Ipsum consequat nisl vel pretium lectus quam. Dignissim sodales ut eu sem. </p> -->


							<div class="container">
								<h3>Current Staff</h3>
								{{--<p>Photos: (Images of classrooms, events, staff, and students, housing)</p>
								<p>Videos: (Short clips or promotional videos showcasing the school environment, events, or teaching methods)</p>--}}
							</div>
							<div class="row">
								@isset($employerStaff)
								@foreach($employerStaff as $employer_staff)
								<div class="col-12 col-md-6 col-lg-4 my-2">
									<div class="card border-0 border-bottom shadow-sm overflow-hidden">
										<div class="card-body p-0">
											<figure class="m-0 p-0">
											<img class="img-fluid img-round" loading="lazy" src="{{asset($employer_staff->staff_image)}}" alt="">
											<figcaption class="m-0 p-4">
												<p class="mb-1" style = "font-weight:500; font-size:17px;font-family:gordita !important;">{{$employer_staff->title ?? '' }}</p>
												<p class="text-secondary mb-0">{{$employer_staff->year_started ?? ''}}</p>
											</figcaption>
											</figure>
										</div>
									</div>
								</div>
								@endforeach
								@endisset
							</div>
						</div>
					</div>
					@endif
					@if($companyHousingsImages && $companyHousingsImages->isNotEmpty())
					<div class="col-xxl-12 col-xl-12 order-xl-first card mb-60 mr-1 p-1 padding-box housings-section">
						<div class="details-post-data me-xxl-5 pe-xxl-4">
							<!-- <h3>Overview</h3> -->
							<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mauris vitae ultricies leo integer malesuada nunc vel risus commodo. Vulputate odio ut enim blandit. Nibh ipsum consequat nisl vel pretium lectus quam.</p> -->
							<!-- <p> Nulla at volutpat diam ut. Lobortis feugiat vivamus at augue eget arcu. Urna condimentum mattis pellentesque id nibh tortor id aliquet. Dignissim cras tincidunt lobortis feugiat. Est sit amet facilisis magna etiam tempor. Eu augue ut lectus arcu bibendum at varius vel pharetra. Vel facilisis volutpat est velit egestas dui id. Ut pharetra sit amet aliquam. Elit at imperdiet dui accumsan sit amet nulla facilisi morbi. Tellus in metus vulputate eu scelerisque felis imperdiet proin. Magna fringilla urna porttitor rhoncus. Et odio pellentesque diam volutpat. Congue eu consequat ac felis donec et odio pellentesque diam. Accumsan in nisl nisi scelerisque eu ultrices vitae auctor eu. </p> -->
							<!-- <p>Felis eget velit aliquet sagittis id. Massa placerat duis ultricies lacus sed turpis tincidunt id. Vel eros donec ac odio tempor orci dapibus ultrices. Ipsum consequat nisl vel pretium lectus quam. Dignissim sodales ut eu sem. </p> -->


							<div class="container">
								<h3>Housing</h3>
								{{--<p>Photos: (Images of classrooms, events, staff, and students, housing)</p>
								<p>Videos: (Short clips or promotional videos showcasing the school environment, events, or teaching methods)</p>--}}
							</div>
							<div class="row">
								@foreach($companyHousingsImages as $image)
									<div class="col-md-4 mb-20">
										<img src="{{asset($image->file_name)}}" alt="" class = "img-round">
									</div>
								@endforeach
								{{--<div class="col-md-4 mb-20">
									<img src="http://127.0.0.1:8000/assets/images/assets/classroom-1.jpg" alt="">
								</div>
								<div class="col-md-4 mb-20">
									<img src="http://127.0.0.1:8000/assets/images/assets/classroom-1.jpg" alt="">
								</div>
								<div class="col-md-4 mb-20">
									<img src="http://127.0.0.1:8000/assets/images/assets/classroom-1.jpg" alt="">
								</div>
								<div class="col-md-4 mb-20">
									<img src="http://127.0.0.1:8000/assets/images/assets/classroom-1.jpg" alt="">
								</div>
								<div class="col-md-4 mb-20">
									<img src="http://127.0.0.1:8000/assets/images/assets/classroom-1.jpg" alt="">
								</div>--}}

							</div>


							
						</div>
					</div>
					@endif
					<div class="col-xxl-12 col-xl-12 order-xl-first card mb-60 mr-1 p-1 padding-box">
						<div class="details-post-data me-xxl-5 pe-xxl-4">
								<!-- <h3>Overview</h3> -->
								<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mauris vitae ultricies leo integer malesuada nunc vel risus commodo. Vulputate odio ut enim blandit. Nibh ipsum consequat nisl vel pretium lectus quam.</p> -->
								<!-- <p> Nulla at volutpat diam ut. Lobortis feugiat vivamus at augue eget arcu. Urna condimentum mattis pellentesque id nibh tortor id aliquet. Dignissim cras tincidunt lobortis feugiat. Est sit amet facilisis magna etiam tempor. Eu augue ut lectus arcu bibendum at varius vel pharetra. Vel facilisis volutpat est velit egestas dui id. Ut pharetra sit amet aliquam. Elit at imperdiet dui accumsan sit amet nulla facilisi morbi. Tellus in metus vulputate eu scelerisque felis imperdiet proin. Magna fringilla urna porttitor rhoncus. Et odio pellentesque diam volutpat. Congue eu consequat ac felis donec et odio pellentesque diam. Accumsan in nisl nisi scelerisque eu ultrices vitae auctor eu. </p> -->
								<!-- <p>Felis eget velit aliquet sagittis id. Massa placerat duis ultricies lacus sed turpis tincidunt id. Vel eros donec ac odio tempor orci dapibus ultrices. Ipsum consequat nisl vel pretium lectus quam. Dignissim sodales ut eu sem. </p> -->


							<div class="container" >
								<h3>Curriculum</h3>
								{{--<p><b>School's Mission & Vision:</b> {{$employerDetails->school_vision_and_mission}}</p>--}}
								<p style = "font-family:gordita;font-weight: normal;font-size: 16px;position: relative; color: rgba(0, 0, 0, 0.7);">{!! $businessOperationDetails->curriculum ?? '' !!}</p>
								{{--<h4 style = "font-family:gordita">Work Hours</h4>
								<div class = "row col-md-6">
								<table class="table table-borderless">
									<tbody>
									@isset($businessOperationDetails->operation_time)
									@foreach($businessOperationDetails->operation_time as $operation_time)
									<tr>
										<td><b>{{$operation_time['day']}}</b></td>
										<td>{{ isset($operation_time['start_time']) ? date('h:i A',strtotime($operation_time['start_time'])) : ''}} - {{ isset($operation_time['end_time']) ? date('h:i A',strtotime($operation_time['end_time'])) : ''}}</td>
									</tr>
									@endforeach
									@endif
									</tbody>
								</table>
								</div>--}}
								

								<!-- <p><b>Teaching Philosophy:</b> (Details about the school's pedagogic beliefs and methods)</p> -->
							</div>
							
						</div>
					</div>
					@if($candidateReviews && $candidateReviews->isNotEmpty())
					<div class="col-xxl-12 col-xl-12 order-xl-first card  mb-60 mr-1 p-1 padding-box">
						<div class="details-post-data me-xxl-5 pe-xxl-4">
							
							<div class="details">
								<h3>Company Reviews</h3>

									<div class="company-review-slider">
										
										@foreach($candidateReviews as $candidateReview)
										<div class="item">
											<div class="feedback-block-four">
												<ul class="list-unstyled d-flex justify-content-start text-warning mb-0">
													@for($i=1;$i < 6; $i++)
													<li><i class="{{$candidateReview->ratings >= $i ? 'fas' : 'far'}} fa-star fa-sm"></i></li>
													@endfor											
													{{--<li><i class="fas fa-star fa-sm"></i></li>
													<li><i class="fas fa-star fa-sm"></i></li>
													<li><i class="fas fa-star fa-sm"></i></li>
													<li><i class="far fa-star fa-sm"></i></li>--}}
												</ul>										
												<p>{{$candidateReview->comment}}</p>
												<div class = "d-flex">
													@if($candidateReview->candidateDetails->candidatePersonalDetails->profile_picture != '')
													<img class="rounded-circle shadow-1-strong"
														src="{{asset($candidateReview->candidateDetails->candidatePersonalDetails->profile_picture)}}" alt="avatar"
														style="width: 50px;margin-right:7px;" />
													@else
													<img src="{{asset('assets/images/avatar_04.jpg')}}" data-src="{{asset('assets/images/avatar_04.jpg')}}" alt="avatar" class ="rounded-circle shadow-1-strong" style="width: 50px;margin-right:7px;">
													@endif
													<h5>{{$candidateReview->candidateDetails->candidatePersonalDetails->first_name ?? ''}} {{$candidateReview->candidateDetails->candidatePersonalDetails->middle_name ?? ''}} {{$candidateReview->candidateDetails->candidatePersonalDetails->last_name ?? ''}}</h5>
												</div>
											</div>
										</div>
										@endforeach
										{{--<div class="item">
											<div class="feedback-block-four">
												<ul class="list-unstyled d-flex justify-content-start text-warning mb-0">
													<li><i class="fas fa-star fa-sm"></i></li>
													<li><i class="fas fa-star fa-sm"></i></li>
													<li><i class="fas fa-star fa-sm"></i></li>
													<li><i class="fas fa-star fa-sm"></i></li>
													<li><i class="far fa-star fa-sm"></i></li>
												</ul>										
												<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum
													perspiciatis atque consequuntur reiciendis sunt magnam.</p>
												<div class = "d-flex">
													<img class="rounded-circle shadow-1-strong"
														src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp" alt="avatar"
														style="width: 50px;margin-right:7px;" />
													<h5>Maria Katie</h5>
												</div>
											</div>
										</div>
										<div class="item">
											<div class="feedback-block-four">
												<ul class="list-unstyled d-flex justify-content-start text-warning mb-0">
													<li><i class="fas fa-star fa-sm"></i></li>
													<li><i class="fas fa-star fa-sm"></i></li>
													<li><i class="fas fa-star fa-sm"></i></li>
													<li><i class="fas fa-star fa-sm"></i></li>
													<li><i class="far fa-star fa-sm"></i></li>
												</ul>										
												<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum
													perspiciatis atque consequuntur reiciendis sunt magnam.</p>
												<div class = "d-flex">
													<img class="rounded-circle shadow-1-strong"
														src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp" alt="avatar"
														style="width: 50px;margin-right:7px;" />
													<h5>Maria Katie</h5>
												</div>
											</div>
										</div>
										<div class="item">
											<div class="feedback-block-four">
												<ul class="list-unstyled d-flex justify-content-start text-warning mb-0">
													<li><i class="fas fa-star fa-sm"></i></li>
													<li><i class="fas fa-star fa-sm"></i></li>
													<li><i class="fas fa-star fa-sm"></i></li>
													<li><i class="fas fa-star fa-sm"></i></li>
													<li><i class="far fa-star fa-sm"></i></li>
												</ul>										
												<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum
													perspiciatis atque consequuntur reiciendis sunt magnam.</p>
												<div class = "d-flex">
													<img class="rounded-circle shadow-1-strong"
														src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp" alt="avatar"
														style="width: 50px;margin-right:7px;" />
													<h5>Maria Katie</h5>
												</div>
											</div>
										</div>--}}
									</div>
									{{--<p>
									<h5>Extra-Curricular Activities: </h5>(Details about clubs, sports, arts, and other
									non-academic activities)</p>--}}
							</div>
						</div>
					</div>
					@endif

					<!--<div class="col-xxl-12 col-xl-12 order-xl-first card my-3 mr-1 p-1 padding-box">
						<div class="details-post-data me-xxl-5 pe-xxl-4">
							 <h3>Overview</h3> 
							 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mauris vitae ultricies leo integer malesuada nunc vel risus commodo. Vulputate odio ut enim blandit. Nibh ipsum consequat nisl vel pretium lectus quam.</p> 
							 <p> Nulla at volutpat diam ut. Lobortis feugiat vivamus at augue eget arcu. Urna condimentum mattis pellentesque id nibh tortor id aliquet. Dignissim cras tincidunt lobortis feugiat. Est sit amet facilisis magna etiam tempor. Eu augue ut lectus arcu bibendum at varius vel pharetra. Vel facilisis volutpat est velit egestas dui id. Ut pharetra sit amet aliquam. Elit at imperdiet dui accumsan sit amet nulla facilisi morbi. Tellus in metus vulputate eu scelerisque felis imperdiet proin. Magna fringilla urna porttitor rhoncus. Et odio pellentesque diam volutpat. Congue eu consequat ac felis donec et odio pellentesque diam. Accumsan in nisl nisi scelerisque eu ultrices vitae auctor eu. </p> 
							 <p>Felis eget velit aliquet sagittis id. Massa placerat duis ultricies lacus sed turpis tincidunt id. Vel eros donec ac odio tempor orci dapibus ultrices. Ipsum consequat nisl vel pretium lectus quam. Dignissim sodales ut eu sem. </p> 


							 <div class="container">
								<h3>Curriculum</h3>
								{{--<p><b>School's Mission & Vision:</b> {{$employerDetails->school_vision_and_mission}}</p>--}}
								<p>{!! $businessOperationDetails->curriculum ?? '' !!}</p>
								<h4>Work Hours</h4>
								<div class = "row col-md-6">
								<table class="table table-borderless">
								
									<tbody>
									@isset($businessOperationDetails->operation_time)
									@foreach($businessOperationDetails->operation_time as $operation_time)
									@if(isset($operation_time['day']) && $operation_time['day'] !='')
									<tr>
										<td><b>{{$operation_time['day']}}</b></td>
										<td>{{ isset($operation_time['start_time']) ? date('h:i A',strtotime($operation_time['start_time'])) : ''}} - {{ isset($operation_time['end_time']) ? date('h:i A',strtotime($operation_time['end_time'])) : ''}}</td>
									</tr>
									@endif
									@endforeach
									@endisset
									</tbody>
								</table>
								</div>
								

								 <p><b>Teaching Philosophy:</b> (Details about the school's pedagogic beliefs and methods)</p> 
							</div> 
							
						</div>
					</div>-->

					<div class="col-xxl-12 col-xl-12 order-xl-first card mb-60 mr-1 p-1 padding-box">
						<div class="details-post-data">
							<!-- <h3>Overview</h3> -->
							<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mauris vitae ultricies leo integer malesuada nunc vel risus commodo. Vulputate odio ut enim blandit. Nibh ipsum consequat nisl vel pretium lectus quam.</p> -->
							<!-- <p> Nulla at volutpat diam ut. Lobortis feugiat vivamus at augue eget arcu. Urna condimentum mattis pellentesque id nibh tortor id aliquet. Dignissim cras tincidunt lobortis feugiat. Est sit amet facilisis magna etiam tempor. Eu augue ut lectus arcu bibendum at varius vel pharetra. Vel facilisis volutpat est velit egestas dui id. Ut pharetra sit amet aliquam. Elit at imperdiet dui accumsan sit amet nulla facilisi morbi. Tellus in metus vulputate eu scelerisque felis imperdiet proin. Magna fringilla urna porttitor rhoncus. Et odio pellentesque diam volutpat. Congue eu consequat ac felis donec et odio pellentesque diam. Accumsan in nisl nisi scelerisque eu ultrices vitae auctor eu. </p> -->
							<!-- <p>Felis eget velit aliquet sagittis id. Massa placerat duis ultricies lacus sed turpis tincidunt id. Vel eros donec ac odio tempor orci dapibus ultrices. Ipsum consequat nisl vel pretium lectus quam. Dignissim sodales ut eu sem. </p> -->


							<div class="container">
								<h3>Jobs</h3>
								{{--<p>Photos: (Images of classrooms, events, staff, and students, housing)</p>
								<p>Videos: (Short clips or promotional videos showcasing the school environment, events, or teaching methods)</p>--}}
								<div class="accordion-box list-style show single-job">
							
							<!-- /Grid Job Listings -->
							@isset($allJobs)
							@foreach($allJobs as $index=>$job)
							<div class="job-list-one style-two position-relative mb-20">
								<div class="row justify-content-between align-items-center">
									<div class="col-md-5">
										<div class="job-title d-flex align-items-center">
										<a href="{{route('jobDetails', \Crypt::encryptString($job->id))}}" >
											@if(isset($job->employerDetails->institution_logo))
											<img src="{{asset($job->employerDetails->institution_logo)}}" data-src="{{asset($job->employerDetails->institution_logo)}}" alt="" class="lazy-img m-auto rounded-circle round-avatar">
											@else
											<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/human-avatar.png')}}" alt="" class="lazy-img m-auto rounded-circle round-avatar">
											@endif
										</a>
											<div class="split-box1">
												<a href="{{route('jobDetails', \Crypt::encryptString($job->id))}}" class="job-duration fw-500">{{$job->job_type}}</a>
												<a href="{{route('jobDetails', \Crypt::encryptString($job->id))}}" class="title fw-500 tran3s">{{$job->job_title}}</a>
											</div>
										</div>
									</div>
									<div class="col-md-4 col-sm-6">
										<div class="job-location">
											<a href="javascript;;">{{$job->city_town}}</a>
										</div>
										<div class="job-salary"><span class="fw-500 text-dark">{{$job->monthly_salary}}</div>
									</div>
									<div class="col-md-3 col-sm-6">
										<div class="btn-group d-flex align-items-center justify-content-sm-end xs-mt-20">
											<a  class="save-btn mx-2 text-center rounded-circle tran3s {{(savedJob($job->id) == 1 ? 'bg-black' : '')}} save_job save_job{{base64_encode($job->id)}}" id="{{base64_encode($job->id)}}" title="Save Job"><i class="bi bi-bookmark-dash"></i></a>
											@if($job->job_status == 1)
											<a href="{{route('jobDetails', \Crypt::encryptString($job->id))}}" class="apply-btn text-center tran3s">APPLY</a>
											@else
											<a href="#" class="apply-btn text-center tran3s">Expired</a>
											@endif
										</div>
									</div>
								</div>
							</div>
							@endforeach
							@endisset
							<!-- /.job-list-one -->
							<!-- <div class="job-list-one style-two position-relative border-style mb-20">
								<div class="row justify-content-between align-items-center">
									<div class="col-md-5">
										<div class="job-title d-flex align-items-center">
											<a href="javascript;;" class="logo"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/logo/media_24.png')}}" alt="" class="lazy-img m-auto"></a>
											<div class="split-box1">
												<a href="javascript;;" class="job-duration fw-500 part-time">Part-time</a>
												<a href="javascript;;" class="title fw-500 tran3s">Web Desginer.</a>
											</div>
										</div>
									</div>
									<div class="col-md-4 col-sm-6">
										<div class="job-location">
											<a href="javascript;;">Rome, Italy</a>
										</div>
										<div class="job-salary"><span class="fw-500 text-dark">$400-$550</span> / week . Expert</div>
									</div>
									<div class="col-md-3 col-sm-6">
										<div class="btn-group d-flex align-items-center justify-content-sm-end xs-mt-20">
											<a href="javascript;;" class="save-btn text-center rounded-circle tran3s me-3" title="Save Job"><i class="bi bi-bookmark-dash"></i></a>
											<a href="javascript;;" class="apply-btn text-center tran3s">APPLY</a>
										</div>
									</div>
								</div>
							</div> -->
							<!-- /.job-list-one -->
							<!-- <div class="job-list-one style-two position-relative border-style mb-20">
								<div class="row justify-content-between align-items-center">
									<div class="col-md-5">
										<div class="job-title d-flex align-items-center">
											<a href="javascript;;" class="logo"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/logo/media_25.png')}}" alt="" class="lazy-img m-auto"></a>
											<div class="split-box1">
												<a href="javascript;;" class="job-duration fw-500">Fulltime</a>
												<a href="javascript;;" class="title fw-500 tran3s">Javascript Developer</a>
											</div>
										</div>
									</div>
									<div class="col-md-4 col-sm-6">
										<div class="job-location">
											<a href="javascript;;">Milan, Italy</a>
										</div>
										<div class="job-salary"><span class="fw-500 text-dark">$35k-$40k</span> / year . Beginner</div>
									</div>
									<div class="col-md-3 col-sm-6">
										<div class="btn-group d-flex align-items-center justify-content-sm-end xs-mt-20">
											<a href="javascript;;" class="save-btn text-center rounded-circle tran3s me-3" title="Save Job"><i class="bi bi-bookmark-dash"></i></a>
											<a href="javascript;;" class="apply-btn text-center tran3s">APPLY</a>
										</div>
									</div>
								</div>
							</div> -->
							<!-- /.job-list-one -->
							<!-- <div class="job-list-one style-two position-relative border-style mb-20">
								<div class="row justify-content-between align-items-center">
									<div class="col-md-5">
										<div class="job-title d-flex align-items-center">
											<a href="javascript;;" class="logo"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/logo/media_26.png')}}" alt="" class="lazy-img m-auto"></a>
											<div class="split-box1">
												<a href="javascript;;" class="job-duration fw-500">Fulltime</a>
												<a href="javascript;;" class="title fw-500 tran3s">Inbound Call service.</a>
											</div>
										</div>
									</div>
									<div class="col-md-4 col-sm-6">
										<div class="job-location">
											<a href="javascript;;">UK, London</a>
										</div>
										<div class="job-salary"><span class="fw-500 text-dark">$30-$50</span> / hour . Intermediate</div>
									</div>
									<div class="col-md-3 col-sm-6">
										<div class="btn-group d-flex align-items-center justify-content-sm-end xs-mt-20">
											<a href="javascript;;" class="save-btn text-center rounded-circle tran3s me-3" title="Save Job"><i class="bi bi-bookmark-dash"></i></a>
											<a href="javascript;;" class="apply-btn text-center tran3s">APPLY</a>
										</div>
									</div>
								</div>
							</div> -->
							<!-- /.job-list-one -->
							<!-- <div class="job-list-one style-two position-relative border-style mb-20">
								<div class="row justify-content-between align-items-center">
									<div class="col-md-5">
										<div class="job-title d-flex align-items-center">
											<a href="javascript;;" class="logo"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/logo/media_33.png')}}" alt="" class="lazy-img m-auto"></a>
											<div class="split-box1">
												<a href="javascript;;" class="job-duration fw-500 part-time">Part-time</a>
												<a href="javascript;;" class="title fw-500 tran3s">Document Typing.</a>
											</div>
										</div>
									</div>
									<div class="col-md-4 col-sm-6">
										<div class="job-location">
											<a href="javascript;;">UAE, Dubai</a>
										</div>
										<div class="job-salary"><span class="fw-500 text-dark">$3k-$4k</span> / month . Expert</div>
									</div>
									<div class="col-md-3 col-sm-6">
										<div class="btn-group d-flex align-items-center justify-content-sm-end xs-mt-20">
											<a href="javascript;;" class="save-btn text-center rounded-circle tran3s me-3" title="Save Job"><i class="bi bi-bookmark-dash"></i></a>
											<a href="javascript;;" class="apply-btn text-center tran3s">APPLY</a>
										</div>
									</div>
								</div>
							</div> -->
							<!-- /.job-list-one -->
							<!-- <div class="job-list-one style-two position-relative border-style mb-20">
								<div class="row justify-content-between align-items-center">
									<div class="col-md-5">
										<div class="job-title d-flex align-items-center">
											<a href="javascript;;" class="logo"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/logo/media_34.png')}}" alt="" class="lazy-img m-auto"></a>
											<div class="split-box1">
												<a href="javascript;;" class="job-duration fw-500 part-time">Part-time</a>
												<a href="javascript;;" class="title fw-500 tran3s">Hotel Manager</a>
											</div>
										</div>
									</div>
									<div class="col-md-4 col-sm-6">
										<div class="job-location">
											<a href="javascript;;">AUS, Sydney</a>
										</div>
										<div class="job-salary"><span class="fw-500 text-dark">$30-$50</span> / hour . Intermediate</div>
									</div>
									<div class="col-md-3 col-sm-6">
										<div class="btn-group d-flex align-items-center justify-content-sm-end xs-mt-20">
											<a href="javascript;;" class="save-btn text-center rounded-circle tran3s me-3" title="Save Job"><i class="bi bi-bookmark-dash"></i></a>
											<a href="javascript;;" class="apply-btn text-center tran3s">APPLY</a>
										</div>
									</div>
								</div>
							</div> -->
							<!-- /.job-list-one -->
							<!-- <div class="job-list-one style-two position-relative border-style mb-20">
								<div class="row justify-content-between align-items-center">
									<div class="col-md-5">
										<div class="job-title d-flex align-items-center">
											<a href="javascript;;" class="logo"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/logo/media_35.png')}}" alt="" class="lazy-img m-auto"></a>
											<div class="split-box1">
												<a href="javascript;;" class="job-duration fw-500">Fulltime</a>
												<a href="javascript;;" class="title fw-500 tran3s">Personal Assistant (HR)</a>
											</div>
										</div>
									</div>
									<div class="col-md-4 col-sm-6">
										<div class="job-location">
											<a href="javascript;;">USA, Alaska</a>
										</div>
										<div class="job-salary"><span class="fw-500 text-dark">$20-$25</span> / hour . Intermediate</div>
									</div>
									<div class="col-md-3 col-sm-6">
										<div class="btn-group d-flex align-items-center justify-content-sm-end xs-mt-20">
											<a href="javascript;;" class="save-btn text-center rounded-circle tran3s me-3" title="Save Job"><i class="bi bi-bookmark-dash"></i></a>
											<a href="javascript;;" class="apply-btn text-center tran3s">APPLY</a>
										</div>
									</div>
								</div>
							</div> -->
							<!-- /.job-list-one -->
							<!-- <div class="job-list-one style-two position-relative border-style mb-30">
								<div class="row justify-content-between align-items-center">
									<div class="col-md-5">
										<div class="job-title d-flex align-items-center">
											<a href="javascript;;" class="logo"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/logo/media_36.png')}}" alt="" class="lazy-img m-auto"></a>
											<div class="split-box1">
												<a href="javascript;;" class="job-duration fw-500">Fulltime</a>
												<a href="javascript;;" class="title fw-500 tran3s">Interactive Designer.</a>
											</div>
										</div>
									</div>
									<div class="col-md-4 col-sm-6">
										<div class="job-location">
											<a href="javascript;;">USA, California</a>
										</div>
										<div class="job-salary"><span class="fw-500 text-dark">$250-$300</span> / week . Expert</div>
									</div>
									<div class="col-md-3 col-sm-6">
										<div class="btn-group d-flex align-items-center justify-content-sm-end xs-mt-20">
											<a href="javascript;;" class="save-btn text-center rounded-circle tran3s me-3" title="Save Job"><i class="bi bi-bookmark-dash"></i></a>
											<a href="javascript;;" class="apply-btn text-center tran3s">APPLY</a>
										</div>
									</div>
								</div>
							</div> -->
							<!-- /.job-list-one -->
						</div>
							</div>
							
						</div>
					</div>

					

					</div>
				</div>
				<div class="col-xxl-3 col-xl-4 order-xl-last mb-60 mr-1 p-1">
					<div class="job-company-info ms-xl-5 ms-xxl-0 lg-mb-50">
						@if(isset($job->employerDetails->institution_logo))
						<img src="{{asset($employerDetails->institution_logo)}}" data-src="{{asset($employerDetails->institution_logo)}}" alt="" class="lazy-img m-auto rounded-circle round-avatar">
						@else
						<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/human-avatar.png')}}" alt="" class="lazy-img m-auto rounded-circle round-avatar">
						@endif
						<!-- <img src="images/lazy.svg" data-src="images/logo/media_37.png" alt="" class="lazy-img m-auto logo"> -->
						<div class="text-md text-dark text-center mt-15 mb-20 lg-mb-10">{{$employerDetails->institution ?? ''}}</div>
						<div class="text-center"><a href="#" class="website-btn-two tran3s" target="_blank">Visit
								our website</a></div>
	
						<div class="border-top mt-35 lg-mt-20 pt-25">
							<ul class="job-meta-data row style-none">
								<li class="col-12">
									<span>Business Type:</span>
									<div>{{$employerDetails->institution_type ?? ''}}</div>
								</li>
								<li class="col-12">
									<span>Business License:</span>
									@if($employerLicenseDetails)
										@if($employerLicenseDetails->approval_status == 1)
										<div>Verified</div>
										@endif
									@else
									<div>Unverified</div>
									@endif
								</li>
								{{--<li class="col-12">
									<span>Address Line 1:</span>
									<div>{{$employerDetails->business_hours ?? ''}}</div>
								</li>
								<li class="col-12">
									<span>Address Line 2:</span>
									<div>{{$employerDetails->address_line_1 ?? ''}}</div>
								</li>
								<li class="col-12">
									<span>State/Region/Province:</span>
									<div>{{$employerDetails->state ?? ''}}</div>
								</li>
								<li class="col-12">
									<span>Country:</span>
									<div>{{$employerDetails->employerCountry->name ?? ''}}</div>
								</li>--}}
								<li class="col-12">
									<span>Business Hours:</span>
									@php $workingHours = explode("-" , $employerDetails->business_hours); @endphp
									<div>{{date('h:i A',strtotime($workingHours[0]))}} - {{date('h:i A',strtotime($workingHours[1]))}}</div>
								</li>
								<li class="col-12">
									<span>Number of Students:</span>
									<div>{{$employerDetails->number_of_students ?? ''}}</div>
								</li>
								<li class="col-12">
									<span>Number of Teachers:</span>
									<div>{{$employerDetails->number_of_teachers ?? ''}}</div>
								</li>
								{{--<li class="col-12">
									<span>Email:</span>
									<div>{{$employerDetails->number_of_teachers ?? ''}}</div>
								</li>
								<li class="col-12">
									<span>Contact Number:</span>
									<div>{{$employerDetails->phone_number ?? ''}}</div>
								</li>--}}
								<li class="col-12">
									<span>Number of Foreign Staff:</span>
									<div>{{$employerDetails->employed_foreign_staff_and_roles ?? ''}}</div>
								</li>
	
								<!-- <li class="col-12">
											<span>Size:</span>
											<div>7000-8000, Worldwide</div>
										</li> -->
								{{--<li class="col-12">
									<span>Email: </span>
									<div><a href="#">{{$employerDetails->email ?? ''}}</a></div>
								</li>--}}
								<li class="col-12">
									<span>Business Address: </span>
									<div>{{$employerDetails->city ?? ''}} {{$employerDetails->state ?? ''}}, {{$employerDetails->employerCountry->name ?? ''}} </div>
								</li>
								<!-- <li class="col-12">
											<span>Founded: </span>
											<div>13 Jan, 1997</div>
										</li> -->
								<!-- <li class="col-12">
											<span>Phone:</span>
											<div><a href="#">(990) 234 112 779,</a> <a href="#">+770 723801870</a></div>
										</li> -->
								<!-- <li class="col-12">
											<span>Category: </span>
											<div>Technology, Product,  Agency</div>
										</li> -->
								{{--<li class="col-12">
									<span>Social: </span>
									<div>
										<a href="#" class="me-3"><i class="bi bi-facebook"></i></a>
										<a href="#" class="me-3"><i class="bi bi-instagram"></i></a>
										<a href="#" class="me-3"><i class="bi bi-twitter"></i></a>
										<a href="#" class="me-3"><i class="bi bi-linkedin"></i></a>
										<a href="#" class="me-3"> Blog</a>
	
									</div>
								</li>--}}
							</ul>
	
							{{--<a href="#" class="btn-ten fw-500 text-white w-100 text-center tran3s mt-25">Send
								Message</a>--}}
						</div>
					</div>
					<!-- /.job-company-info -->
					<!-- <div class="job-company-info mt-100 ms-xl-5 ms-xxl-0 lg-mb-50">
						{{-- <img src="images/lazy.svg" data-src="images/logo/media_37.png" alt="" class="lazy-img m-auto logo"> --}}
						<div class="text-md text-dark text-center mt-15 mb-20 lg-mb-10">Location</div>
						{{-- <div class="text-center"><a href="#" class="website-btn-two tran3s" target="_blank">Visit our website</a></div> --}}
	
						<div class="border-top mt-35 lg-mt-20 pt-25">
							<ul class="job-meta-data row style-none">
								<li>
									<div class="map">
										<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13287.201679616686!2d73.0740548!3d33.6364165!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38df95f7c0118bb1%3A0x773c0f0856728b7!2sSilk%20Center%20Plaza!5e0!3m2!1sen!2s!4v1693389113300!5m2!1sen!2s" width="270" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
									</div>
	
								</li>
								<li>
									<p>silk center, Murree Rd, B-Block Block B Satellite Town, Rawalpindi, Punjab 44000</p>
								</li>
							</ul>
	
						</div>
					</div> -->
				</div>
				
			</div>
		</div>
	</div>
</section>
<!--
		=====================================================
			Job Portal Intro
		=====================================================
		-->
<section class="job-portal-intro">
	<div class="container">
		<div class="wrapper bottom-border pt-65 md-pt-50 pb-65 md-pb-50">
			<div class="row align-items-center">
				<div class="col-lg-7">
					<div class="text-center text-lg-start">
						<h2 style = "font-size:32px !important;">Most complete recruitment and visa platform.</h2>
						<p class="text-md m0 md-pb-20">Sign up and find your next job or candidate.</p>
					</div>
				</div>
				<div class="col-lg-5">
					<ul class="btn-group style-none d-flex flex-wrap justify-content-center justify-content-lg-end">
						@auth
						@role('candidate')
						<li class="me-2"><a href="{{route('candidatesMarketplace')}}" class="btn-three">Looking for job?</a></li>
						@endrole
						@role('employer')
						<li class="ms-2"><a href="{{route('employer-jobs.create')}}" class="btn-four">Post a job</a></li>
						@endrole
						@endauth
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper(".mySwiper", {
      slidesPerView: 3,
      spaceBetween: 30,
      freeMode: true,
	  autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
	  navigation: {
	  nextEl: '.swiper-button-next',
	  prevEl: '.swiper-button-prev',
	},
    });
</script>
@endsection