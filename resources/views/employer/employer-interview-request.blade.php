@extends('employer.layout.main')

@section('title')
Interview Request
@endsection

@section('content')
@push('page-css')
<style>
    .job-title, .job-application  {
    color: #000 !important;
    font-weight: 500;
    
 }
 .job-title a:hover{
    color: #ff715b !important;
    
    /* color: #244034; */
 }
 .job-application a:hover{
    color: #ff715b !important;
    
    /* color: #244034; */
 }
.active {
    /* background-color: #04AA6D; */
    color: black !important;
}
.dropdown-menu-end img{
    width : 25px!important;
}
.dropdown-menu-end li{
    cursor: pointer;
}
.dropdown-menu-end li:hover a{
    color: #ff5b5b;
}
.interview-link-information{
	position: relative;
    cursor: pointer;
    bottom: 20px;
}
.interview-link-information p{
	display: none;
	position: absolute;
    background-color: #ff715b;
    color: #f2f2f2;
    font-family: 'gordita';
    bottom: 5px;
    font-size: 13px;
    padding: 8px;
    border-radius: 10px;
    width: 370px;
    right: 4px;
    font-weight: 400;

}

.interview-link-information:hover p{
	display: block;

}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

<div class="dashboard-body">
<div class="modal fade" id="RescheduleRequestModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="container">
            <div class="user-data-form modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center">
                    <h3>Reschedule Form</h3>
                </div>
                <div class="form-wrapper m-auto">
                    <form  id = "Interview-Request-Form" action = "{{route('employer.reschedule_interview')}}" method = "POST">
                        @csrf
                        <input type = "hidden" name="reschedule_interview_id" value="">
                        <div id="interview-request-errors-list"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group-meta position-relative mb-25">
                                    <label>Date*</label>
                                    <input type="date" min="{{date('Y-m-d')}}" name="reschedule_date" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group-meta position-relative mb-20" required>
                                    <label>Time*</label>
                                    <input type="time" name="reschedule_time" placeholder="Enter Password" class="pass_log_id" required>
                                </div>
                            </div>
                            
                            <div class="col-12">
								<div class="form-check form-switch">
									<input class="form-check-input" type="checkbox" role="switch" id="meeting-invitation-link" name="meeting-invitation-link">
									<label class="form-check-label" for="meeting-invitation-link">Do you want to send a meeting invitation</label>
								</div>
								<div class="w-100">
										<div class="interview-disagreed my-3">
											Interviews detail will be provided after the candidate accepts the request via the messenger function. 
										</div>
										<div class="interview-agreed my-3 d-none">
											<div>
												<div class="row">
													<div class="col-12">
													<div class="d-flex justify-content-end">
															<i class="fa-solid fa-circle-info interview-link-information  fa-lg"> 
															<p>Create a video meeting link using Google Meet, Zoom, or Skype and paste it into the provided fields.
															   Acceptance of the request by the employer means they intend to attend the schedule interview via the link provided. 
															   For rescheduling, use the messenger to communicate with the employer after sending the interview request.
															</p>
														</i>
													</div>
													<input class="form-control" type="url" name="meeting_media" id="invitation-link" placeholder="Add Invitation Link">
														
													</div>
												</div>
											</div>
											
										</div>
								</div>
							</div>

                        
                            <div class="col-md-6">
                                <button class="btn-submit fw-500 tran3s d-block mt-20" type = "submit" >
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






    <div class="position-relative">
        <!-- ************************ Header **************************** -->
		 	@include('employer.layout.header_menu')
        <!-- End Header -->

        <div class="d-sm-flex align-items-center justify-content-between mb-40 lg-mb-30">
            <h2 class="main-title m0">Interview Requests</h2>
            <div class="d-flex ms-auto xs-mt-30">
                <div class="nav nav-tabs tab-filter-btn me-4" id="nav-tab" role="tablist">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#a1" type="button" role="tab" aria-selected="true">All</button>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#a2" type="button" role="tab" aria-selected="false">New</button>
                </div>
                <div class="short-filter d-flex align-items-center ms-auto">
                    <div class="text-dark fw-500 me-2">Short by:</div>
                    <select class="nice-select">
                        <option value="0">Active</option>
                        <option value="1">Pending</option>
                        <option value="2">Expired</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="bg-white card-box border-20">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="a1" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table job-alert-table">
                            <thead>
                                <tr>
                                    <th scope="col">Candidate Name</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Meeting Media</th>
                                    <!-- <th scope="col">Applicants</th> -->
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="border-0">
                                @isset($allInterviews)
                                @foreach($allInterviews as $interview)
                                @php 
                                     $status = 'pending';
                                     $message = 'Pending';
                                     if($interview->reschedule_status == 0)
                                     {
                                            if($interview->status == 1)
                                        {
                                            $status = 'active';
                                            $message = 'Scheduled';
                                        }elseif($interview->status == 2)
                                        {
                                            $status = 'expired';
                                            $message = 'Rejected';
                                        }
                                        elseif($interview->status == 3)
                                        {
                                            $status = 'active';
                                            $message = 'Conducted';
                                        }
                                        elseif($interview->status == 4)
                                        {
                                            $status = 'active';
                                            $message = 'Approved';
                                        }
                                        elseif($interview->status ==5)
                                        {
                                            $status = 'active';
                                            $message = 'Rejected';
                                        }
                                     }else
                                     {
                                        $status = 'pending';
                                            $message = 'Reschedule Request';
                                     }
                                @endphp
                                <tr class="{{$status}}">
                                    <td>
                                        <!-- <div class="job-name job-title fw-500"><a href="{{route('candidateProfileNew', \Crypt::encryptString($interview->jobCandidate->id))}}">{{$interview->jobCandidate->candidatePersonalDetails->first_name ?? ''}} {{$interview->jobCandidate->candidatePersonalDetails->middle_name ?? ''}} {{$interview->jobCandidate->candidatePersonalDetails->last_name ?? ''}}</a></div> -->
                                        @php
                                            $candidateName  = $interview->requestFrom->id !== auth()->user()->id ? $interview->requestFrom->name : $interview->requestTo->name;
                                            $candidateId = $interview->requestFrom->id !== auth()->user()->id ? $interview->requestFrom->id : $interview->requestTo->id;
                                            $profileUrl = route('candidateProfileNew', \Crypt::encryptString($candidateId));
                                        @endphp 
                                        <div class="job-name job-title fw-500"><a href="{{$profileUrl}}">{{$candidateName}}</a></div>
                                    </td>
                                    <td>
                                        <div class="job-name job-title fw-500"><a href="{{route('jobDetails',\Crypt::encryptString($interview->jobDetails->id))}}">{{$interview->jobDetails->job_title ?? ''}}</a></div>
                                        <div class="info1">{{$interview->jobDetails->job_type ?? ''}} . {{$interview->jobDetails->city_town}}</div>
                                    </td>
                                    @if($interview->reschedule_status ==1 && $interview->status == 0)
                                    <td>{{date('d M, Y',strtotime($interview->reschedule_date))}}</td>
                                    <td>{{date('h:i A',strtotime($interview->reschedule_time))}}</td>
                                    <td>{{$interview->reschedule_meeting}}</tdjo>
                                    @else
                                    <td>{{date('d M, Y',strtotime($interview->interview_date))}}</td>
                                    <td>{{date('h:i A',strtotime($interview->interview_time))}}</td>
                                    <td>{{$interview->meeting_media}}</td>
                                    @endif
                                    <!-- <td><div class="job-application"><a href="{{route('employer.JobListingCandidate', ['id'=>$interview->jobDetails->id])}}">{{totalApplicants($interview->jobDetails->id)}} Applications</a><div></td> -->
                                    <td>
                                        <div class="job-status">{{$message}}</div>
                                    </td>
                                 
                                    <td>
                                        <div class="action-dots float-center">
                                            <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <!-- <li><a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                    document.getElementById('accept-form-{{$interview->id}}').submit();"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/Accept.svg')}}" alt="" class="lazy-img"> Accept</a>
                                                </li>                                                
                                                <li><a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                    document.getElementById('reject-form-{{$interview->id}}').submit();"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/Reject.svg')}}" alt="" class="lazy-img"> Reject</a>
                                                </li>  -->
                                                <li class="dropdown-item approve-interview interview-status" data-interview-id="{{$interview->id}}" data-status="4" ><img src="{{asset('assets/images/accept.png')}}" data-src="{{asset('assets/images/icon/accept.png')}}" alt="" class="lazy-img">Mark As Approve</li>
                                                <li class="dropdown-item reject-interview interview-status" data-interview-id="{{$interview->id}}" data-status="5"><img src="{{asset('assets/images/reject.png')}}" data-src="{{asset('assets/images/icon/reject.png')}}" alt="" class="lazy-img">Mark As Reject</li>
                                                <li><a class="dropdown-item conduct-interview interview-status" data-interview-id="{{$interview->id}}" data-status="3"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/Accept.svg')}}" alt="" class="lazy-img"> Mark as Conducted</a></li>
                                                
                                                <li><a class="dropdown-item " href="#" data-bs-toggle="modal"  id="{{$interview->id}}" onclick="resheduleInterview({{$interview->id}})"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/reschedule.svg')}}" alt="" class="lazy-img"> Reschedule</a></li>
                                                
                                                @if($interview->status === 4)                                                    
                                                    <li><a class="dropdown-item add-to-chat" href="javascript:void(0)" data-candidate-id="{{$candidateId}}" data-interview-id="{{$interview->id}}" data-status="3"><img src="{{asset('assets/images/chat.png')}}" data-src="{{asset('assets/images/chat.png')}}" alt="" class="lazy-img"> Add to Chat</a></li>
                                                @endif
                                                


                                                <!-- <form id="accept-form-{{$interview->id}}" action="{{ route('employer.accept_reschedule_request', $interview->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                                <form id="reject-form-{{$interview->id}}" action="{{ route('employer.reject_reschedule_request', $interview->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form> -->
                                            </ul>
                                        </div>
                                    </td>










                                  
                                </tr>
                                @endforeach
                                @endisset
                            {{--
                                <tr class="pending">
                                    <td>
                                        <div class="job-name fw-500">Marketing Specialist</div>
                                        <div class="info1">Part-time . Uk</div>
                                    </td>
                                    <td>05 Jun, 2022</td>
                                    <td>20 Applicants</td>
                                    <td>
                                        <div class="job-status">Pending</div>
                                    </td>
                                    <td>
                                        <div class="action-dots float-end">
                                            <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_18.svg')}}" alt="" class="lazy-img"> View</a></li>
                                                <li><a class="dropdown-item" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_19.svg')}}" alt="" class="lazy-img"> Share</a></li>
                                                <li><a class="dropdown-item" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_20.svg')}}" alt="" class="lazy-img"> Edit</a></li>
                                                <li><a class="dropdown-item" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_21.svg')}}" alt="" class="lazy-img"> Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="expired">
                                    <td>
                                        <div class="job-name fw-500">Accounting Manager</div>
                                        <div class="info1">Fulltime . USA</div>
                                    </td>
                                    <td>27 Sep, 2021</td>
                                    <td>273 Applicants</td>
                                    <td>
                                        <div class="job-status">Expired</div>
                                    </td>
                                    <td>
                                        <div class="action-dots float-end">
                                            <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_18.svg')}}" alt="" class="lazy-img"> View</a></li>
                                                <li><a class="dropdown-item" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_19.svg')}}" alt="" class="lazy-img"> Share</a></li>
                                                <li><a class="dropdown-item" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_20.svg')}}" alt="" class="lazy-img"> Edit</a></li>
                                                <li><a class="dropdown-item" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_21.svg')}}" alt="" class="lazy-img"> Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="active">
                                    <td>
                                        <div class="job-name fw-500">Developer for IT company</div>
                                        <div class="info1">Fulltime . Germany</div>
                                    </td>
                                    <td>14 Feb, 2021</td>
                                    <td>70 Applicants</td>
                                    <td>
                                        <div class="job-status">Active</div>
                                    </td>
                                    <td>
                                        <div class="action-dots float-end">
                                            <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_18.svg')}}" alt="" class="lazy-img"> View</a></li>
                                                <li><a class="dropdown-item" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_19.svg')}}" alt="" class="lazy-img"> Share</a></li>
                                                <li><a class="dropdown-item" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_20.svg')}}" alt="" class="lazy-img"> Edit</a></li>
                                                <li><a class="dropdown-item" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_21.svg')}}" alt="" class="lazy-img"> Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                       --}}
                            </tbody>
                        </table>
                        <!-- /.table job-alert-table -->
                    </div>
                    {{ $allInterviews->links('vendor.pagination.custom-pagination-2') }}

                </div>
                <div class="tab-pane fade" id="a2" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table job-alert-table">
                            <thead>
                                <tr>
                                <th scope="col">Candidate Name</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Meeting Media</th>
                                    <th scope="col">Applicants</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="border-0">
                                @isset($latestInterviews)
                                @foreach($latestInterviews as $interview)
                                @php 
                                $status = 'pending';
                                     $message = 'Pending';
                                     if($interview->reschedule_status == 0)
                                     {
                                            if($interview->status == 1)
                                        {
                                            $status = 'active';
                                            $message = 'Scheduled';
                                        }elseif($interview->status == 2)
                                        {
                                            $status = 'expired';
                                            $message = 'Rejected';
                                        }
                                        elseif($interview->status == 3)
                                        {
                                            $status = 'active';
                                            $message = 'Conducted';
                                        }
                                        elseif($interview->status == 4)
                                        {
                                            $status = 'active';
                                            $message = 'Conducted';
                                        }
                                     }else
                                     {
                                        $status = 'pending';
                                            $message = 'Reschedule Request';
                                     }
                                @endphp
                                <tr class="{{$status}}">
                                    <td>
                                        <div class="job-name job-title fw-500"><a href="{{route('candidateProfileNew', \Crypt::encryptString($interview->jobCandidate->id))}}">{{$interview->jobCandidate->candidatePersonalDetails->first_name ?? ''}} {{$interview->jobCandidate->candidatePersonalDetails->middle_name ?? ''}} {{$interview->jobCandidate->candidatePersonalDetails->last_name ?? ''}}</a></div>
                                    </td>
                                    <td>
                                        <div class="job-name job-title fw-500"><a href="{{route('jobDetails',\Crypt::encryptString($interview->jobDetails->id))}}">{{$interview->jobDetails->job_title ?? ''}}</a></div>
                                        <div class="info1">{{$interview->jobDetails->job_type ?? ''}} . {{$interview->jobDetails->city_town}}</div>
                                    </td>
                                    @if($interview->reschedule_status ==1 && $interview->status == 0)
                                    <td>{{date('d M, Y',strtotime($interview->reschedule_date))}}</td>
                                    <td>{{date('h:i A',strtotime($interview->reschedule_time))}}</td>
                                    <td>{{$interview->reschedule_meeting}}</tdjo>
                                    @else
                                    <td>{{date('d M, Y',strtotime($interview->interview_date))}}</td>
                                    <td>{{date('h:i A',strtotime($interview->interview_time))}}</td>
                                    <td>{{$interview->meeting_media}}</td>
                                    @endif
                                    <td><div class="job-application"><a href="{{route('employer.JobListingCandidate', ['id'=>$interview->jobDetails->id])}}">{{totalApplicants($interview->jobDetails->id)}} Applications</a><div></td>
                                    <td>
                                        <div class="job-status">{{$message}}</div>
                                    </td>
                                    @if($interview->reschedule_status == 1 && $interview->status == 0)
                                    <td>
                                        <div class="action-dots float-end">
                                            <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                    document.getElementById('accept-form-{{$interview->id}}').submit();"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/Accept.svg')}}" alt="" class="lazy-img"> Accept</a>
                                                </li>                                                
                                                <li><a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                    document.getElementById('reject-form-{{$interview->id}}').submit();"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/Reject.svg')}}" alt="" class="lazy-img"> Reject</a>
                                                </li>                                                
                                                <form id="accept-form-{{$interview->id}}" action="{{ route('employer.accept_reschedule_request', $interview->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                </form>
                                                <form id="reject-form-{{$interview->id}}" action="{{ route('employer.reject_reschedule_request', $interview->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                </form>
                                            </ul>
                                        </div>
                                    </td>
                                    @elseif($interview->reschedule_status == 0 && $interview->status == 1)
                                   <td>
                                        <div class="action-dots float-end">
                                            <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                    document.getElementById('conducted-form-{{$interview->id}}').submit();"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/Accept.svg')}}" alt="" class="lazy-img"> Mark as Conducted</a>
                                                </li>                                                                                               
                                                <form id="conducted-form-{{$interview->id}}" action="{{ route('employer.interview.conducted', $interview->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                </form>
                                               
                                            </ul>
                                        </div>
                                    </td>
                                   @endif
                                </tr>
                                @endforeach
                                @endisset
                                {{--
                                    <tr class="active">
                                        <td>
                                            <div class="job-name fw-500">Brand & Producr Designer</div>
                                            <div class="info1">Fulltime . Spain</div>
                                        </td>
                                        <td>13 Aug, 2022</td>
                                        <td>130 Applications</td>
                                        <td>
                                            <div class="job-status">Active</div>
                                        </td>
                                        <td>
                                            <div class="action-dots float-end">
                                                <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <span></span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_18.svg')}}" alt="" class="lazy-img"> View</a></li>
                                                    <li><a class="dropdown-item" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_19.svg')}}" alt="" class="lazy-img"> Share</a></li>
                                                    <li><a class="dropdown-item" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_20.svg')}}" alt="" class="lazy-img"> Edit</a></li>
                                                    <li><a class="dropdown-item" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_21.svg')}}" alt="" class="lazy-img"> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="active">
                                        <td>
                                            <div class="job-name fw-500">Developer for IT company</div>
                                            <div class="info1">Fulltime . Germany</div>
                                        </td>
                                        <td>14 Feb, 2021</td>
                                        <td>70 Applicants</td>
                                        <td>
                                            <div class="job-status">Active</div>
                                        </td>
                                        <td>
                                            <div class="action-dots float-end">
                                                <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <span></span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_18.svg')}}" alt="" class="lazy-img"> View</a></li>
                                                    <li><a class="dropdown-item" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_19.svg')}}" alt="" class="lazy-img"> Share</a></li>
                                                    <li><a class="dropdown-item" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_20.svg')}}" alt="" class="lazy-img"> Edit</a></li>
                                                    <li><a class="dropdown-item" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_21.svg')}}" alt="" class="lazy-img"> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="expired">
                                        <td>
                                            <div class="job-name fw-500">Accounting Manager</div>
                                            <div class="info1">Fulltime . USA</div>
                                        </td>
                                        <td>27 Sep, 2021</td>
                                        <td>273 Applicants</td>
                                        <td>
                                            <div class="job-status">Expired</div>
                                        </td>
                                        <td>
                                            <div class="action-dots float-end">
                                                <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <span></span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_18.svg')}}" alt="" class="lazy-img"> View</a></li>
                                                    <li><a class="dropdown-item" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_19.svg')}}" alt="" class="lazy-img"> Share</a></li>
                                                    <li><a class="dropdown-item" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_20.svg')}}" alt="" class="lazy-img"> Edit</a></li>
                                                    <li><a class="dropdown-item" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_21.svg')}}" alt="" class="lazy-img"> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                        --}}
                            </tbody>
                        </table>
                        <!-- /.table job-alert-table -->
                    </div>
                    {{ $latestInterviews->links('vendor.pagination.custom-pagination-2') }}
                </div>
            </div>

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
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>


    $(document).on("click" , ".interview-status" , function(e){
        let status = this.dataset.status;
        let interviewId = this.dataset.interviewId;
        $.ajax({
            type : 'POST',
            url : '{{route("employer.changeInterviewStatus")}}',
            data : {
                _token : '{{csrf_token()}}',
                status : status,
                interviewId : interviewId
            },
            success : function(res){
                if(res.status)
                {
                    toastr.success(res.message);
                    location.reload();
                }else{
                    toastr.error(res.error)
                }
            }
        })

    })

    $(document).on("click" , ".add-to-chat" , function(e){
        let candidateId = this.dataset.candidateId;
        let url = "{{url('employer/contact-candidate')}}"+`/${candidateId}`;
        $.ajax({
            type : 'PUT',
            url : url,
            data : {
                _token : '{{csrf_token()}}',
                candidateId : candidateId
            },
            success : function(res){
                if(res.status)
                {
                    toastr.success(res.msg);
                }else{
                    toastr.error(res.error)
                }
            }
        })

    })


    function resheduleInterview(interviewId){
        document.querySelector("input[name='reschedule_interview_id']").value = interviewId; 
        $("#RescheduleRequestModal").modal("show");
    }

    
    $(document).on("change" , "#meeting-invitation-link" , function(e){
		if(e.target.checked === true ){
			document.querySelector(".interview-disagreed").classList.add("d-none");
			document.querySelector(".interview-agreed").classList.remove("d-none");
		}else {
			document.querySelector(".interview-disagreed").classList.remove("d-none");
			document.querySelector(".interview-agreed").classList.add("d-none");
			document.querySelector("#invitation-link").value = "";
		}
	  })



</script>

@endsection