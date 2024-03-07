@extends('employer.layout.main')

@section('title')
Employer Saved Candidate
@endsection
@push('page-css')
<style>
    .remove-account-popup .confirm-btn:hover {
    background: #D2F34C;
        }
        .job-post-btn {
    font-weight: 500;
    color: #fff;
    text-align: center;
    width: 200px;
    line-height: 45px;
    border-radius: 50px;
    background: #ff715b;
}
.job-post-btn:hover {
    background: #b1b0eb;
    color: #244034;
}
</style>
@endpush
@section('content')


<div class="dashboard-body">
    <div class="position-relative">
        <!-- ************************ Header **************************** -->
            @include('employer.layout.header_menu')
        <!-- End Header -->

        <div class="d-flex align-items-center justify-content-between mb-40 lg-mb-30">
            <div class="d-flex align-items-center">
                <!-- <a href="{{ url()->previous() }}" class="pe-2"> <button type="button" class="dash-btn-two tran3s" data-bs-dismiss="modal">Back</button></a> -->
                <h2 class="main-title m0">Job Candidates</h2>
            </div>

            <div class="short-filter d-flex align-items-center">
                <div class="text-dark fw-500 me-2">Short by:</div>
                <select class="nice-select">
                    <option value="0">Newest</option>
                    <option value="1">Pending</option>
                    <option value="2">Expired</option>
                </select>
            </div>
        </div>

        <div class="wrapper">
            @if(!$jobApplicants->isEmpty() )
            @foreach($jobApplicants as $index=>$jobApplicant)
            <div class="candidate-profile-card list-layout border-0 mb-25">
                <div class="d-flex">
                    <!-- <div class="cadidate-avatar online position-relative d-block me-auto ms-auto"><a href="#" class="rounded-circle"><img src="../images/lazy.svg" data-src="../images/candidates/img_03.jpg" alt="" class="lazy-img rounded-circle"></a></div> -->
                    @if(isset($jobApplicant->candidatePersonalDetails->profile_picture) && !empty($jobApplicant->candidatePersonalDetails->profile_picture))
                    <div class="cadidate-avatar online position-relative me-auto ms-auto"><a href="{{route('candidateProfileNew', \Crypt::encryptString($jobApplicant->id))}}" class="rounded-circle"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset($jobApplicant->candidatePersonalDetails->profile_picture)}}" alt="" class="lazy-img rounded-circle"></a></div>
                    @else
                    <div class="cadidate-avatar online position-relative me-auto ms-auto"><a href="{{route('candidateProfileNew', \Crypt::encryptString($jobApplicant->id))}}" class="rounded-circle"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/candidates/img_01.jpg')}}" alt="" class="lazy-img rounded-circle"></a></div>
                    @endif
                    <div class="right-side">
                        <div class="row gx-1 align-items-center">
                            <div class="col-xl-4">
                                <div class="position-relative">
                                    <h4 class="candidate-name mb-0"><a href="#" class="tran3s">{{$jobApplicant->candidatePersonalDetails->full_name ?? ''}}</a></h4>
                                    <div class="candidate-post">{{$jobApplicant->candidatePersonalDetails->designation ?? ''}}</div>
                                    <ul class="cadidate-skills style-none d-flex align-items-center">
                                        @if(isset($jobApplicant->candidatePreferences->skills) && !empty($jobApplicant->candidatePreferences->skills))
										@foreach($jobApplicant->candidatePreferences->skills as $index=>$skill)
										@if($index < 3)
										<li>{{$skill}}</li>
										@endif
										@endforeach
										@endif
										@if(isset($jobApplicant->candidatePreferences->skills) && !empty($jobApplicant->candidatePreferences->skills))
										@if(count($jobApplicant->candidatePreferences->skills) > 3)
										<li class="more">+{{{count($jobApplicant->candidatePreferences->skills)-3}}}</li>
										@endif
										@endif
                                    </ul>
                                    <!-- /.cadidate-skills -->
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-4 col-sm-6">
                                <div class="candidate-info">
                                    <span>Salary</span>
                                    <div>{{$jobApplicant->candidatePreferences->expected_salary ?? ''}}{{!empty($jobApplicant->candidatePreferences->expected_salary) ? '/mo' : ''}}</div>
                                </div>
                                <!-- /.candidate-info -->
                            </div>
                            
                            <div class="col-xl-2 col-md-4 col-sm-6">
                                <div class="candidate-info">
                                    <span>Location</span>
                                    <div>{{$jobApplicant->candidatePersonalDetails->current_location ?? ''}}</div>
                                </div>
                                <!-- /.candidate-info -->
                            </div>
                            <div class ="col-xl-2 col-md-4 col-sm-6">
                                <div class = "candidate-info">
                                        <span>Status</span>
                                        @if($jobApplicant->pivot->application_status == 1)
                                        <div >Shorlisted</div>
                                        @elseif($jobApplicant->pivot->application_status == 2)
                                        <div >Rejected</div>
                                        @else
                                        <div >Pending</div>
                                        @endif
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-4">
                                <div class="d-flex justify-content-md-end align-items-center">
                                    <a href="#" class="save-btn text-center rounded-circle tran3s mt-10 fw-normal cover-letter-button" id="{{$index}}" data-bs-toggle="modal" data-bs-target="#coverLetterModal"><i class="bi bi-eye"></i></a>
                                        <div id="cover-letter-{{$index}}" class="d-none">
                                            <p>{{$jobApplicant->pivot->cover_letter}}</p>
                                        </div>
                                    <div class="action-dots float-end mt-10 ms-2">
                                        <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                           {{-- <li><a class="dropdown-item" href="{{route('scheduleInterview')}}"><img src="../images/lazy.svg" data-src="images/icon/icon_18.svg" alt="" class="lazy-img"> View</a></li> --}}
                                            <li><a class="dropdown-item Interview-Modal-Button" href="#" data-bs-toggle="modal" data-bs-target="#InterviewModal" id = "{{$jobApplicant->pivot->employer_job_id ?? ''}}">Interview</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                document.getElementById('reject-application-{{$jobApplicant->pivot->employer_job_id}}').submit();"> Reject</a></li>
                                            <form id="reject-application-{{$jobApplicant->pivot->employer_job_id ?? ''}}" action="{{ route('employer.rejectApplication', $jobApplicant->pivot->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('PUT')
                                            </form>
                                            {{--<li><a class="dropdown-item" href="{{route('scheduleInterview')}}"><img src="../images/lazy.svg" data-src="images/icon/icon_21.svg" alt="" class="lazy-img"> Delete</a></li>--}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="candidate-profile-card list-layout border-0 mb-25">
                <div class="d-flex">
                    <center>No Applicant Found</center>
            @endif
            <!-- /.candidate-profile-card -->
            <!-- <div class="candidate-profile-card list-layout border-0 mb-25">
                <div class="d-flex">
                    <div class="cadidate-avatar position-relative d-block me-auto ms-auto"><a href="#" class="rounded-circle"><img src="../images/lazy.svg" data-src="../images/candidates/img_02.jpg" alt="" class="lazy-img rounded-circle"></a></div>
                    <div class="right-side">
                        <div class="row gx-1 align-items-center">
                            <div class="col-xl-3">
                                <div class="position-relative">
                                    <h4 class="candidate-name mb-0"><a href="#" class="tran3s">Riad Mahfuz</a></h4>
                                    <div class="candidate-post">Telemarketing & Sales</div>
                                    <ul class="cadidate-skills style-none d-flex align-items-center">
                                        <li>Design</li>
                                        <li>UI</li>
                                        <li>Digital</li>
                                        <li class="more">2+</li>
                                    </ul>
                                    {{-- cadidate-skills --}}
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="candidate-info">
                                    <span>Salary</span>
                                    <div>$30k-$50k/yr</div>
                                </div>
                                {{-- cadidate-info --}}
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="candidate-info">
                                    <span>Location</span>
                                    <div>Manchester, UK</div>
                                </div>
                                {{-- cadidate-info --}}
                            </div>
                            <div class="col-xl-3 col-md-4">
                                <div class="d-flex justify-content-md-end align-items-center">
                                    <a href="#" class="save-btn text-center rounded-circle tran3s mt-10 fw-normal"><i class="bi bi-eye"></i></a>
                                    <div class="action-dots float-end mt-10 ms-2">
                                        <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="{{route('scheduleInterview')}}"><img src="../images/lazy.svg" data-src="images/icon/icon_18.svg" alt="" class="lazy-img"> View</a></li>
                                            <li><a class="dropdown-item" href="{{route('scheduleInterview')}}"><img src="../images/lazy.svg" data-src="images/icon/icon_19.svg" alt="" class="lazy-img"> Share</a></li>
                                            <li><a class="dropdown-item" href="{{route('scheduleInterview')}}"><img src="../images/lazy.svg" data-src="images/icon/icon_20.svg" alt="" class="lazy-img"> Edit</a></li>
                                            <li><a class="dropdown-item" href="{{route('scheduleInterview')}}"><img src="../images/lazy.svg" data-src="images/icon/icon_21.svg" alt="" class="lazy-img"> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
          
            <!-- /.candidate-profile-card -->
        </div>
        <!-- /.card-box -->


        <!-- <div class="dash-pagination d-flex justify-content-end mt-30">
            <ul class="style-none d-flex align-items-center">
                <li><a href="#" class="active">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li>..</li>
                <li><a href="#">7</a></li>
                <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
            </ul>
        </div> -->
        {{ $jobApplicants->links('vendor.pagination.custom-pagination-2') }}

    </div>
</div>


		<!-- Modal -->
		<div class="modal fade" id="coverLetterModal" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-fullscreen modal-dialog-centered">
				<div class="container">
					<div class="remove-account-popup text-center modal-content">
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						<!-- <img src="../images/lazy.svg" data-src="{{asset('assets/images/dashboard-icon/icon_22.svg')}}" alt="" class="lazy-img m-auto"> -->
						<h3>Cover Letter</h3>
						<!-- <p class="mt-3">Are you sure to delete your account? All data will be lost.</p> -->
                        <div id="applicantData"></div>

						<div class="button-group d-inline-flex justify-content-center align-items-center pt-15">
							<a href="#" class="confirm-btn fw-500 tran3s me-3" data-bs-dismiss="modal" aria-label="Close">Ok</a>
							<!-- <button type="button" class="btn-close fw-500 ms-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button> -->
						</div>
					</div>
					<!-- /.remove-account-popup -->
				</div>
			</div>
		</div>

<div class="modal fade" id="InterviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="container">
            <div class="user-data-form modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center">
                    <h3>Reschedule Form</h3>
                </div>
                <div class="form-wrapper m-auto">
                    <form  id = "Interview-Invitation-Form" action = "{{route('employer.interviewInvitation')}}" method = "POST">
                        @csrf
                        <input type = "hidden" name = "employer_job_id" value = "">
                        <div id="interview-request-errors-list"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group-meta position-relative mb-25">
                                    <label>Date*</label>
                                    <input type="date" name = "interview_date" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group-meta position-relative mb-20" required>
                                    <label>Time*</label>
                                    <input type="time" name = "interview_time" placeholder="Enter Password" class="pass_log_id" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                            <div class="input-group-meta position-relative mb-20">
                                <label for="">Select Meeting Media</label>
                                <select name="reschedule_meeting" id="interview_meeting" class="nice-select">
                                    <option value="Skype" >Skype</option>
                                    <option value="Google Meet" >Google Meet</option>
                                    <option value="Zoom">Zoom</option>
                                </select>
                        </div>
                            </div>
                        
                            <div class="col-md-6">
                                <button class="job-post-btn fw-500 tran3s d-block mt-20" type = "submit" >
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                
                </div>
                <!-- /.form-wrapper -->
            </div>
            <!-- /.user-data-form -->
        </div>
    </div>
</div>
        @push('page-script')
        <script>
         document.querySelector('.Interview-Modal-Button').addEventListener('click',function(){
            document.querySelector('input[name=employer_job_id]').value = this.id;
        });
    </script>
        <script>
            
            $(document).ready(function () {
                $('.cover-letter-button').click(function () {
                // Get the applicant ID from the data attribute
                var applicantId = $(this).attr('id')

                // Get the cover letter content based on the applicant ID
                var coverLetterContent = $('#cover-letter-' + applicantId).html();

                // Update the modal body with the cover letter content
                $('#applicantData').html(coverLetterContent);

                // Show the modal
                // $('#coverLetterModal').modal('show');
                });
            });
        </script>
        @endpush
@endsection