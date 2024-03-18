@extends('candidate.layout.main')

@section('title')
Interview Request
@endsection

@section('content')
@push('page-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
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
    color: #00BF58 !important;
    
 }
 .job-title a:hover{
    color: #D2F34C !important;
    
    /* color: #244034; */
 }
 .job-application a:hover{
    color: #D2F34C !important;
    
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
</style>
@endpush

<div class="dashboard-body">
    <div class="position-relative">
        <!-- ************************ Header **************************** -->
		 	@include('candidate.layout.header_menu')
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
                                        <div class="job-name job-title fw-500"><a href="{{route('jobDetails',\Crypt::encryptString($interview->jobDetails->id))}}">{{$interview->jobDetails->job_title ?? ''}}</a></div>
                                        <div class="info1">{{$interview->jobDetails->job_type ?? ''}} . {{$interview->jobDetails->city_town}}</div>
                                    </td>
                                    <td>{{$interview->employer->employerDetails->institution ?? ''}} </td>
                                    @if($interview->reschedule_status ==1 && $interview->status == 0)
                                    <td>{{date('d M, Y',strtotime($interview->reschedule_date))}}</td>
                                    <td>{{date('h:i A',strtotime($interview->reschedule_time))}}</td>
                                    <td>{{$interview->reschedule_meeting}}</td>
                                    @else
                                    <td>{{date('d M, Y',strtotime($interview->interview_date))}}</td>
                                    <td>{{date('h:i A',strtotime($interview->interview_time))}}</td>
                                    <td>{{$interview->meeting_media}}</td>
                                    @endif
                                    
                                    <td><div class="job-application">{{totalApplicants($interview->jobDetails->id)}} Applications<div></td>
                                    <td>
                                        <div class="job-status">{{$message}}</div>
                                    </td>
                                  @if($interview->reschedule_status != 1 && $interview->status == 0)
                                    <td>
                                        <div class="action-dots float-end">
                                            <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
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
                                                <li><a class="dropdown-item Reschedule-Request-Button" href="#" data-bs-toggle="modal" data-bs-target="#RescheduleRequestModal" id = "{{$interview->id}}"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/reschedule.svg')}}" alt="" class="lazy-img"> Reschedule</a></li>
                                                {{--<li><a class="dropdown-item" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_21.svg')}}" alt="" class="lazy-img"> Delete</a></li>--}}
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
                                     $status = 'pending';
                                     $message = 'Pending';
                                     if($interview->status == 1)
                                     {
                                        $status = 'active';
                                        $message = 'Scheduled';
                                     }elseif($interview->status == 2)
                                     {
                                        $status = 'expired';
                                        $message = 'Rejected';
                                     }
                                    @endphp
                                    <tr class="{{$status}}">
                                        <td>
                                            <div class="job-name job-title fw-500"><a href="{{route('jobDetails',\Crypt::encryptString($interview->jobDetails->id))}}">{{$interview->jobDetails->job_title ?? ''}}</a></div>
                                            <div class="info1">{{$interview->jobDetails->job_type ?? ''}} . {{$interview->jobDetails->city_town}}</div>
                                        </td>
                                        <td>{{$interview->employer->employerDetails->institution ?? ''}} </td>
                                        <td>{{date('d M, Y',strtotime($interview->interview_date))}}</td>
                                        <td>{{date('h:i A',strtotime($interview->interview_time))}}</td>
                                        <td>{{$interview->meeting_media}}</td>
                                        <td><div class="job-application"><a href="{{route('employer.JobListingCandidate', ['id'=>$interview->jobDetails->id])}}">{{totalApplicants($interview->jobDetails->id)}} Applications</a><div></td>
                                        <td>
                                            <div class="job-status">{{$message}}</div>
                                        </td>
                                    
                                        <td>
                                            <div class="action-dots float-end">
                                                <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <span></span>
                                                </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
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
                                                <li><a class="dropdown-item Reschedule-Request-Button" href="#" data-bs-toggle="modal" data-bs-target="#RescheduleRequestModal" id = "{{$interview->id}}"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/Reschedule.svg')}}" alt="" class="lazy-img"> Reschedule</a></li>
                                                {{--<li><a class="dropdown-item" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_21.svg')}}" alt="" class="lazy-img"> Delete</a></li>--}}
                                            </ul>
                                            </div>
                                        </td>
                                        
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
                        <input type = "hidden" name = "reschedule_interview_id" value = "">
                        <div id="interview-request-errors-list"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group-meta position-relative mb-25">
                                    <label>Date*</label>
                                    <input type="date" name = "reschedule_date" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group-meta position-relative mb-20" required>
                                    <label>Time*</label>
                                    <input type="time" name = "reschedule_time" placeholder="Enter Password" class="pass_log_id" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                            <div class="input-group-meta position-relative mb-20">
                                <label for="">Select Meeting Media</label>
                                <select name="reschedule_meeting" id="reschedule_meeting" class="nice-select">
                                    <option value="Skype" selected>Skype</option>
                                    <option value="Google Meet" >Google Meet</option>
                                    <option value="Zoom">Zoom</option>
                                </select>
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
<script>
    document.querySelector('.Reschedule-Request-Button').addEventListener('click',function(){
          document.querySelector('input[name=reschedule_interview_id]').value = this.id;
    });

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
</script>
@endpush
@endsection