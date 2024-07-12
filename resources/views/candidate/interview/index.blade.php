@extends('candidate.layout.main')

@section('title')
Interview Request
@endsection

@section('content')
@push('page-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
 

    .rating-box {
        position: relative;
        background: #fff;
        padding: 25px 50px 35px;
        border-radius: 25px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.05);
    }

    .rating-box header {
        font-size: 22px;
        color: #dadada;
        font-weight: 500;
        margin-bottom: 20px;
        text-align: center;
    }

    .rating-box .stars {
        display: flex;
        align-items: center;
        gap: 25px;
    }

    .stars i {
        color: #e6e6e6;
        font-size: 35px;
        cursor: pointer;
        transition: color 0.2s ease;
    }

    .stars i.active {
        color: #ff9c1a !important;
    }

    @media screen and (min-width: 761px) {
        .adjust_height {
            height: 45px;
        }
    }
</style>
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
.btn-submit {
    height: 46px;
    border-radius: 7px;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.88px;
    color: #fff;
    background: #ff715b;
    width: auto;
    padding: 14px;
}
.btn-submit:hover {
    background:#b1b0eb;
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
@endpush


<div class="dashboard-body">
    
    <div class="position-relative">
        <!-- ************************ Header **************************** -->
		 	@include('candidate.layout.header_menu')
        <!-- End Header -->

        <!-- <div class="d-sm-flex align-items-center justify-content-between mb-40 lg-mb-30">
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
        </div> -->

        <div class="bg-white card-box border-20">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="a1" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table job-alert-table">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Instituition</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Meeting Media</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="border-0">
                                @isset($allInterviews)
                                @foreach($allInterviews as $interview)
                                @php 

                                $status = $message = null;
                                     
                                     switch($interview->status){
                                         case 1:
                                             $status = 'active';
                                             $message = 'Pending';
                                         break;
                                         case 2:
                                             $status = 'expired';
                                             $message = 'Rejected';
                                         break;
                                         case 3:
                                             $status = 'active';
                                             $message = 'Conducted';
                                         break;
                                         case 4:
                                             $status = 'active';
                                             $message = 'Approved';
                                         break;
                                         case 5:
                                             $status = 'active';
                                             $message = 'Reschedule Request';
                                         break;
                                         case 6:
                                             $status = 'expired';
                                             $message = 'Selected';
                                         break;
                                         case 7:
                                             $status = 'expired';
                                             $message = 'Decline';
                                         break;
                                         case 9:
                                            $status = 'expired';
                                            $message = 'Canceled';
                                         break;
                                         default:
                                             $status = 'active';
                                             $message = 'Scheduled';
                                     }
                                     
                                @endphp
                                <tr class="{{$status}}">
                                    <td>
                                        <div class="job-name job-title fw-500"><a href="{{route('jobDetails',\Crypt::encryptString($interview->jobDetails->id))}}">{{$interview->jobDetails->job_title ?? ''}}</a></div>
                                        <div class="info1">{{$interview->jobDetails->job_type ?? ''}} . {{$interview->jobDetails->city_town}}</div>
                                    </td>
                                    
                                    @php
                                     $employerInformation = $interview->requestTo->id !== auth()->user()->id ? $interview->requestTo : $interview->requestFrom;
                                    @endphp 


                                    <td>{{$employerInformation->employerDetails->institution ?? ''}} </td>


                                    @if($interview->reschedule_status ==1)
                                    <td>{{date('d M, Y',strtotime($interview->reschedule_date))}}</td>
                                    <td>{{date('h:i A',strtotime($interview->reschedule_time))}}</td>
                                    <td>{{$interview->reschedule_meeting}}</td>
                                    @else
                                    <td>{{date('d M, Y',strtotime($interview->interview_date))}}</td>
                                    <td>{{date('h:i A',strtotime($interview->interview_time))}}</td>
                                    <td>{{$interview->meeting_media}}</td>
                                    @endif
                                    
                                
                                    <td>
                                        <div class="job-status @if($interview->status == 1 && $interview->requested_from != auth()->user()->id) blink text-danger @endif">{{$message}}</div>
                                    </td>
                                    <td>
                                        @if(!(in_array($interview->status , [ \AppConst::INTERVIEW_REJECTED]) && $interview->requested_from === auth()->user()->id))
                                        
                                        <div class="action-dots float-center">
                                            <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                @if(($interview->requested_from != auth()->user()->id && $interview->status == 1) || ($interview->rescheduled_by != auth()->user()->id && $interview->status == 5 ))
                                                    <li><a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                                    document.getElementById('accept-form-{{$interview->id}}').submit();"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/Accept.svg')}}" alt="" class="lazy-img"> Accept</a></li>
                                                    <form id="accept-form-{{$interview->id}}" action="{{ route('candidate.acceptInterview', $interview->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    </form>
                                                    <li><a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                                    document.getElementById('reject-form-{{$interview->id}}').submit();"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/Reject.svg')}}" alt="" class="lazy-img"> Reject</a></li>
                                                    <form id="reject-form-{{$interview->id}}" action="{{ route('candidate.rejectInterview', $interview->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    </form>
                                                @endif
                                                
                                                @if(in_array($interview->status , [ 1 , 4 , 5 ])  || ($interview->status == 9 && $interview->requested_from == auth()->user()->id))
                                                <li><a class="dropdown-item " href="#" data-bs-toggle="modal" data-bs-target="#RescheduleRequestModal" id = "{{$interview->id}}" onclick="getInterviewId({{$interview->id}})"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/reschedule.svg')}}" alt="" class="lazy-img"> Reschedule</a></li>
                                                @endif
                                                
                                                @if(!($interview->requested_from == auth()->user()->id && $interview->status == 1)  &&   !($interview->requested_from == auth()->user()->id && $interview->status == 2)  && !($interview->status == 9 &&  $interview->requested_from == auth()->user()->id))
                                                <li><a class="dropdown-item add-to-chat" href="javascript:void(0)" data-employer-id="{{$interview->employer->id}}" data-interview-id="{{$interview->id}}" data-status="3"><img src="{{asset('assets/images/chat.png')}}" height="22px" data-src="{{asset('assets/images/chat.png')}}" alt="" class="lazy-img"> Add to Chat</a></li>
                                                @endif

                                                @if($interview->requested_from  == auth()->user()->id && $interview->status != 9)
                                                <li><a class="dropdown-item cancel-request" href="javascript:void(0)" data-employer-id="{{$interview->employer->id}}" data-interview-id="{{$interview->id}}" data-status="9"><img src="{{asset('assets/images/icon/Reject.svg')}}" height="22px" data-src="{{asset('assets/images/icon/Reject.svg')}}" alt="" class="lazy-img"> Cancel</a></li>
                                                @endif
                                            </ul>
                                        </div>
                                        @endif
                                    </td>
                                    
                                </tr>
                                @endforeach
                                @endisset
                            
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
                                    <th scope="col">Title</th>
                                    <th scope="col">Instituition</th>
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
                                     $status = $message = null;
                                     
                                        switch($interview->status){
                                            case 1:
                                                $status = 'active';
                                                $message = 'Pending';
                                            break;
                                            case 2:
                                                $status = 'expired';
                                                $message = 'Rejected';
                                            break;
                                            case 3:
                                                $status = 'active';
                                                $message = 'Conducted';
                                            break;
                                            case 4:
                                                $status = 'active';
                                                $message = 'Approved';
                                            break;
                                            case 5:
                                                $status = 'active';
                                                $message = 'Reschedule Request';
                                            break;
                                            case 6:
                                                $status = 'expired';
                                                $message = 'Selected';
                                            break;
                                            case 7:
                                                $status = 'expired';
                                                $message = 'Decline';
                                            break;
                                            case 9:
                                                $status = 'expired';
                                                $message = 'Canceled';
                                            break;
                                            default:
                                                $status = 'active';
                                                $message = 'Scheduled';
                                        }

                                      
                                    @endphp
                                    <tr class="{{$status}}">
                                        <td>
                                            <div class="job-name job-title fw-500"><a href="{{route('jobDetails',\Crypt::encryptString($interview->jobDetails->id))}}">{{$interview->jobDetails->job_title ?? ''}}</a></div>
                                            <div class="info1">{{$interview->jobDetails->job_type ?? ''}} . {{$interview->jobDetails->city_town}}</div>
                                        </td>
                                        <td>{{$interview->employer->employerDetails->institution ?? ''}} </td>
                                        @if($interview->reschedule_status == 1)
                                        <td>{{date('d M, Y',strtotime($interview->reschedule_date))}}</td>
                                        <td>{{date('h:i A',strtotime($interview->reschedule_time))}}</td>
                                        <td>{{$interview->reschedule_meeting}}</td>
                                        @else
                                        <td>{{date('d M, Y',strtotime($interview->interview_date))}}</td>
                                        <td>{{date('h:i A',strtotime($interview->interview_time))}}</td>
                                        <td>{{$interview->meeting_media}}</td>
                                        @endif
                                        <td><div class="job-application"><a href="{{route('employer.JobListingCandidate', ['id'=>$interview->jobDetails->id])}}">{{totalApplicants($interview->jobDetails->id)}} Applications</a><div></td>
                                        <td>
                                            <div class="job-status @if($interview->status == 0 && $interview->requested_from != auth()->user()->id) blink text-danger @endif">{{$message}}</div>
                                        </td>
                                        @if($interview->reschedule_status != 1 && $interview->status == 0)
                                        <td>
                                            <div class="action-dots float-end">
                                                <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <span></span>
                                                </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                            
                                                @if($interview->requested_to == auth()->user()->id || $interview->reschedule_status == 1)
                                                    <li><a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                                    document.getElementById('accept-form-{{$interview->id}}').submit();"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/Accept.svg')}}" alt="" class="lazy-img"> Accept</a></li>
                                                    <form id="accept-form-{{$interview->id}}" action="{{ route('candidate.acceptInterview', $interview->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    </form>
                                                    <li><a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                                    document.getElementById('reject-form-{{$interview->id}}').submit();"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/Reject.svg')}}" alt="" class="lazy-img"> Reject</a></li>
                                                    <form id="reject-form-{{$interview->id}}" action="{{ route('candidate.rejectInterview', $interview->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    </form>
                                                @endif


                                                <li><a class="dropdown-item " href="#" data-bs-toggle="modal" data-bs-target="#RescheduleRequestModal" id = "{{$interview->id}}" onclick="getInterviewId({{$interview->id}})"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/Reschedule.svg')}}" alt="" class="lazy-img"> Reschedule</a></li>
                                                
                                            </ul>
                                            </div>
                                        </td>
                                        @elseif($interview->reschedule_status == 0 && $interview->status == 3)
                                        <td>
                                            <div class="action-dots float-end">
                                                <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <span></span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#reviewModal" onclick="employerData({{$interview->id}})"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/Accept.svg')}}" alt="" class="lazy-img" > Review</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                        @endif
                                        
                                    </tr>
                                    @endforeach
                                    @endisset
                               
                            </tbody>
                        </table>
                        <!-- /.table job-alert-table -->
                    </div>
                    {{ $latestInterviews->links('vendor.pagination.custom-pagination-2') }}
                </div>
            </div>

        </div>
        <!-- /.card-box -->



    </div>
</div>

<div class="modal fade" id="RescheduleRequestModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="container">
            <div class="user-data-form modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center">
                    <h3>Reschedule Form</h3>
                </div>
                <div class="form-wrapper m-auto">
                    <form  id = "Interview-Request-Form" action = "{{route('candidate.reschedule_interview')}}" method = "POST">
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
									<input class="form-check-input" type="checkbox" role="switch" id="meeting-invitation-link" name="meeting_invitation_link">
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
															<p>Please generate a video meeting link using Google Meet, Zoom, or Skype and paste it into the specified field. The employer's acceptance of the request indicates their intention to attend the scheduled interview via the provided link. Chat can be initiated after the request is accepted.
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
<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <form method = "post" action = "{{route('candidate.review_save')}}">
                        @csrf
                        <input type = "hidden" name= "interview_id"  id = "interview_id">
                        <div class="modal-header">
                            <h5 class="modal-title " id="reviewModalLabel" style="font-family:gordita">Rating</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class=" d-flex justify-content-center col-md-12">
                                    <div class="stars">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                                <input type="text" name="rating" hidden value=0></input>
                                <div class="  d-flex  col-md-12 mt-20">
                                    <div class="input-group-meta position-relative mb-25">
                                        <label><b>Comment</b></label>
                                        <textarea  name = "comment" placeholder="" rows = "3" cols = "50" required></textarea>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn-submit fw-500 tran3s d-block mt-20">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@push('page-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
   
     function getInterviewId(id)
     {
        document.querySelector('input[name=reschedule_interview_id]').value = id;
     }
    const stars = document.querySelectorAll(".stars i");
    stars.forEach((star, index1) => {
        star.addEventListener("click", () => {
            stars.forEach((star, index2) => {
                index1 >= index2 ? star.classList.add("active") : star.classList.remove("active");
            });
            const rating = document.querySelectorAll(".stars i.active").length;
            const hiddenInput = modal.querySelector('input[name="rating"]');
            hiddenInput.value = rating;
        });
    });

function employerData(interviewId)
{
    document.getElementById('interview_id').value = interviewId;
}
const modal = document.getElementById('reviewModal');
modal.addEventListener('hidden.bs.modal', function() {
    // Clear the select element
    const selectElement = modal.querySelector('select');
    selectElement.selectedIndex = 0; // Set it to the default option

    // Clear the textarea
    const textareaElement = modal.querySelector('textarea');
    textareaElement.value = '';

    const hiddenInput = modal.querySelector('input[name="rating"]');
    hiddenInput.value = 0;

    // Clear the star ratings (remove the "active" class)
    const stars = modal.querySelectorAll('.stars i');
    stars.forEach(star => star.classList.remove('active'));
});

$(document).on("click" , ".cancel-request" ,  function(e){
    let interviewId = this.dataset.interviewId;

        Swal.fire({
        title: "Are you sure you wanted to cancel it?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, cancel it!"
        }).then((result) => {
            if (result.isConfirmed) {
                cancelInterviewStatus( interviewId)  
            }
        });

 
    
})

function cancelInterviewStatus(interviewId)
{
    $.ajax({
        url : '{{route("candidate.cancelInterviewRequest")}}',
        type : 'Post',
        data : {
            interviewId : interviewId, 
            _token : '{{csrf_token()}}',
        },
        success : function(res){
            if(res.status){
                toastr.success(res.msg)
            } else {
                toastr.error(res.error)
                location.reload();
            }
        }
    })
}


$(document).on("click" , ".add-to-chat" , function(e){
        let employerId = this.dataset.employerId;
        let url = "{{route('contact.employer')}}";
        $.ajax({
            type : 'POST',
            url : url,
            data : {
                _token : '{{csrf_token()}}',
                employerId : employerId
            },
            success : function(res){
                window.location = "{{route('getCandidateMessages')}}"+"/"+employerId;
            }
        })

    })

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
@endpush
@endsection