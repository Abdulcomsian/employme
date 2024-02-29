@extends('layout.main')


@section('content')
<style>
    .candidates-profile-details .video-post {
    background: url("{{asset('/'.$candidateDetails->candidatePreferences->video_thumbnail)}}") no-repeat center;
    background-size: cover;
    height: 430px;
    border-radius: 15px;
}
</style>

        <!-- 
		=============================================
			Inner Banner
		============================================== 
		-->
        <div class="inner-banner-one position-relative">
            <div class="container">
                <div class="candidate-profile-card list-layout">
                    <div class="d-flex align-items-start align-items-xl-center">
                        <div class="cadidate-avatar position-relative d-block me-auto ms-auto"><a href="#"
                                class="rounded-circle"><img src="images/lazy.svg"
                                    data-src="images/candidates/img_01.jpg" alt="" class="lazy-img rounded-circle"></a>
                        </div>
                        <div class="right-side">
                            <div class="row gx-1 align-items-center">
                                <div class="col-xl-2 order-xl-0">
                                    <div class="position-relative">
                                        <h4 class="candidate-name text-white mb-0">{{$candidateDetails->candidatePersonalDetails->full_name ?? ''}}</h4>
                                        <div class="candidate-post">{{$candidateDetails->candidatePersonalDetails->designation ?? ''}}</div>
                                    </div>
                                </div>
                                <div class="col-xl-3 order-xl-3">
                                    <ul class="cadidate-skills style-none d-flex flex-wrap align-items-center"> 
                                        @if(isset($candidateDetails->candidatePreferences->skills) && !empty($candidateDetails->candidatePreferences->skills))
										@foreach($candidateDetails->candidatePreferences->skills as $index=>$skill)
										@if($index < 3)
										<li>{{$skill}}</li>
										@endif
										@endforeach
										@endif                                    
                                        @if(isset($candidateDetails->candidatePreferences->skills) && !empty($candidateDetails->candidatePreferences->skills))
                                        @if(count($candidateDetails->candidatePreferences->skills) > 3)
										<li class="more">+{{{count($candidateDetails->candidatePreferences->skills)-3}}}</li>
										@endif
										@endif
                                    </ul>
                                    <!-- /.cadidate-skills -->
                                </div>
                                <div class="col-xl-2 col-md-4 order-xl-1">
                                    <div class="candidate-info">
                                        <span>Location</span>
                                        <div>{{$candidateDetails->candidatePersonalDetails->current_location ?? ''}}</div>
                                    </div>
                                    <!-- /.candidate-info -->
                                </div>
                                <div class="col-xl-2 col-md-4 order-xl-2">
                                    <div class="candidate-info">
                                        <span>Salary</span>
                                        <div>{{$candidateDetails->candidatePreferences->expected_salary ?? ''}}</div>
                                    </div>
                                    <!-- /.candidate-info -->
                                </div>
                                <div class="col-xl-3 col-md-4 order-xl-4">
                                    <div class="d-flex justify-content-md-end">
									<a  class="save-btn text-center rounded-circle tran3s save_candidate  save_candidate{{base64_encode($candidateDetails->id)}}" id="{{base64_encode($candidateDetails->id)}}" style="color:{{(savedCandidate($candidateDetails->id) == 1 ? 'red' : '')}}"><i class="bi bi-heart-fill"></i></a>
                                        <button class="cv-download-btn fw-500 tran3s ms-md-3 sm-mt-20" id="{{base64_encode($candidateDetails->id)}}">Download
                                            CV</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img src="images/lazy.svg" data-src="images/shape/shape_02.svg" alt="" class="lazy-img shapes shape_01">
            <img src="images/lazy.svg" data-src="images/shape/shape_03.svg" alt="" class="lazy-img shapes shape_02">
        </div> <!-- /.inner-banner-one -->


        
        <nav class="nav-2" id="menu">
            <ul id="menu-closed">
                <li><a href="#" class="active">Overview</a></li>
                <!-- <li><a href="{{route('candidateProfileDocument')}}">Documents</a></li>
                <li> <a href="{{route('candidateProfileInterview')}}">Interview</a></li>
                <li><a href="{{route('candidateProfileAlbum')}}"> Album</a></li>
                <li><a href="{{route('candidateProfileComment')}}">Comment box</a></li> -->
                <li><a href="#menu-closed">&#215; </a></li>
                <li><a href="#menu">&#9776; more</a></li>
            </ul>
        </nav>


        <!-- 
		=============================================
			Candidates Profile Details
		============================================== 
		-->
        <section class="candidates-profile bg-color pt-100 lg-pt-70 pb-150 lg-pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-9 col-lg-8">
                        <div class="candidates-profile-details me-xxl-5 pe-xxl-4">
                            <div class="inner-card mb-65 lg-mb-40">
                                <h3 class="title">Overview</h3>
                                <p>{{$candidateDetails->candidatePersonalDetails->introduction ?? ''}}</p>
                            </div>
                            <!-- /.inner-card -->
                            <h3 class="title">Interview</h3>
                            @if(isset($candidateDetails->candidatePreferences->video_url) || isset($candidateDetails->candidatePreferences->other_platform_video_url))
                            @if(!empty($candidateDetails->candidatePreferences->video_url))
                            <div
                                class="video-post d-flex align-items-center justify-content-center mt-25 lg-mt-20 mb-75 lg-mb-50">
                                <a class="fancybox rounded-circle video-icon tran3s text-center" data-fancybox=""
                                    href="{{asset($candidateDetails->candidatePreferences->video_url)}}">
                                    <i class="bi bi-play"></i>
                                </a>
                            </div>
                            @elseif(!empty($candidateDetails->candidatePreferences->other_platform_video_url))
                            <div
                                class="video-post d-flex align-items-center justify-content-center mt-25 lg-mt-20 mb-75 lg-mb-50">
                                <a class="fancybox rounded-circle video-icon tran3s text-center" data-fancybox=""
                                    href="{{$candidateDetails->candidatePreferences->other_platform_video_url}}">
                                    <i class="bi bi-play"></i>
                                </a>
                                
                            </div>
                            @endif
                            @endif
                            <div class="inner-card mb-75 lg-mb-50">
                                <h3 class="title">Education</h3>
                                <div class="time-line-data position-relative pt-15">
                                @if(isset($candidateDetails->candidateEducation->educational_details) && !empty($candidateDetails->candidateEducation->educational_details))
                                @foreach($candidateDetails->candidateEducation->educational_details as $index=>$educational_detail)
                                    <div class="info position-relative">
                                        <div
                                            class="numb fw-500 rounded-circle d-flex align-items-center justify-content-center">
                                            {{$index+1}}</div>
                                        <div class="text_1 fw-500">{{$educational_detail['institution'] ?? ''}}</div>
                                        <h4>{{$educational_detail['degree'] ?? ''}}</h4>
                                        <p>{{$educational_detail['description'] ?? ''}}</p>
                                    </div>
                                    @endforeach
										@endif 
                                    
                                    <!-- ./info -->
                                    <!-- <div class="info position-relative">
                                        <div
                                            class="numb fw-500 rounded-circle d-flex align-items-center justify-content-center">
                                            2</div>
                                        <div class="text_1 fw-500">Design Collage</div>
                                        <h4>UI/UX Design Course</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum
                                            tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                    </div> -->
                                    <!-- ./info -->
                                </div>
                                <!-- /.time-line-data -->
                            </div>
                            <!-- /.inner-card -->
                            <div class="inner-card mb-75 lg-mb-50">
                                <h3 class="title">Skills</h3>
                                <ul class="style-none skill-tags d-flex flex-wrap pb-25">
                                    @if(isset($candidateDetails->candidatePreferences->skills) && !empty($candidateDetails->candidatePreferences->skills))
										@foreach($candidateDetails->candidatePreferences->skills as $index=>$skill)
										@if($index < 8)
										<li>{{$skill}}</li>
										@endif
										@endforeach
										@endif 
                                        @if(isset($candidateDetails->candidatePreferences->skills) && !empty($candidateDetails->candidatePreferences->skills))
                                        @if(count($candidateDetails->candidatePreferences->skills) > 8)
										<li class="more">+{{{count($candidateDetails->candidatePreferences->skills)-8}}}</li>
										@endif
										@endif
                                </ul>
                            </div>
                            <!-- /.inner-card -->
                            <div class="inner-card mb-60 lg-mb-50">
                                <h3 class="title">Work Experience</h3>
                                <div class="time-line-data position-relative pt-15">
                                @if(isset($candidateDetails->candidateEducation->professional_details) && !empty($candidateDetails->candidateEducation->professional_details))
                                @foreach($candidateDetails->candidateEducation->professional_details as $index=>$professional_details)
                                    <div class="info position-relative">
                                        <div
                                            class="numb fw-500 rounded-circle d-flex align-items-center justify-content-center">
                                            {{$index+1}}</div>
                                        <div class="text_1 fw-500">{{$professional_details['date_from']}} - {{$professional_details['date_to']}}</div>
                                        <h4>{{$professional_details['role']}} ({{$professional_details['employer_name']}})</h4>
                                        <p>{{$professional_details['description']}}</p>
                                    </div>
                                @endforeach
                                @endif
                                    <!-- ./info -->
                                    <!-- <div class="info position-relative">
                                        <div
                                            class="numb fw-500 rounded-circle d-flex align-items-center justify-content-center">
                                            2</div>
                                        <div class="text_1 fw-500">02/07/20 - 13/09/22</div>
                                        <h4>UI/UX Engineer (Adobe)</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum
                                            tellus. Interdum primis</p>
                                    </div> -->
                                    <!-- ./info -->
                                </div>
                                <!-- /.time-line-data -->
                            </div>

                        </div>
                    </div>
                    <!-- /.candidates-profile-details -->
                    <div class="col-xxl-3 col-lg-4">
                        <div class="cadidate-profile-sidebar ms-xl-5 ms-xxl-0 md-mt-60">
                            <div class="cadidate-bio bg-wrapper mb-60 md-mb-40">
                                <ul class="style-none">

									         <li class="border-0">
                                        <span>Name: </span>
                                        <div>{{$candidateDetails->candidatePersonalDetails->full_name ?? ''}}</div>
                                    </li>
                                    <!-- <li>
                                        <span>Age: </span>
                                        <div>28</div>
                                    </li> -->
									         <li >
                                        <span>Location: </span>
                                        <div>{{$candidateDetails->candidatePersonalDetails->current_location ?? ''}}</div>
                                    </li>
									<li>
                                        <span>Expected Salary: </span>
                                        <div>{{$candidateDetails->candidatePreferences->expected_salary ?? ''}}</div>
                                    </li>
									<!-- <li>
                                        <span>Intended Start Date: </span>
                                        <div>14 August 2024</div>
                                    </li>
									<li>
                                        <span>Country of Origin: </span>
                                        <div>Pakistan</div>
                                    </li> -->
									<li>
                                        <span>Apostille Status: </span>
                                        <div>Verified</div>
                                    </li>
									<li>
                                        <span> Teaching Experience: </span>
                                        <div>{{$candidateDetails->candidateEducation->teaching_experiance ?? ''}}</div>
                                    </li>

                                </ul>
                                <a href="#" class="btn-ten cv-download-btn fw-500 text-white w-100 text-center tran3s mt-15" id="{{base64_encode($candidateDetails->id)}}">Download CV</a>
                            </div>
                            <!-- /.cadidate-bio -->
                            <!-- <h4 class="sidebar-title">Location</h4>
                            <div class="map-area mb-60 md-mb-40">
                                <div class="gmap_canvas h-100 w-100">
                                    <iframe class="gmap_iframe h-100 w-100" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=dhaka collage&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                </div>
                            </div> -->
                            <!-- <h4 class="sidebar-title">Email Rashed Kabir.</h4>
                            <div class="email-form bg-wrapper">
                                <p>Your email address & profile will be shown to the recipient.</p>
                                <form action="#">
                                    <div class="d-sm-flex mb-25">
                                        <label for="">Name</label>
                                        <input type="text">
                                    </div>
                                    <div class="d-sm-flex mb-25">
                                        <label for="">Email</label>
                                        <input type="email">
                                    </div>
                                    <div class="d-sm-flex mb-25 xs-mb-10">
                                        <label for="">Message</label>
                                        <textarea></textarea>
                                    </div>
                                    <div class="d-sm-flex">
                                        <label for=""></label>
                                        <button class="btn-ten fw-500 text-white flex-fill text-center tran3s">Send </button>
                                    </div>
                                </form>
                            </div> -->
                        </div> 
                        <!-- /.cadidate-profile-sidebar -->
                    </div>
                </div>

            </div>
        </section>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

        <script type="text/javascript">
 
 $(document).ready(function() {
       
       /* Donwload Resume */
       $(".cv-download-btn").click(function(){
           var _token = "{{ csrf_token() }}";
           var candidate_id = $(this).attr("id");
           // Create a hidden form
        var form = $('<form>', {
            'action': "{{ url('download-resume') }}",
            'method': 'post',
        });

        // Add necessary input fields
        form.append($('<input>', {
            'type': 'hidden',
            'name': '_token',
            'value': "{{ csrf_token() }}"
        }));

        form.append($('<input>', {
            'type': 'hidden',
            'name': 'candidate_id',
            'value': candidate_id
        }));

        // Append the form to the body and submit it
        $('body').append(form);
        form.submit();

        // Remove the form after submission
        form.remove();
         
       });
   });
</script>
@endsection