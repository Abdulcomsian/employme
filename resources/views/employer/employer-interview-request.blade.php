@extends('employer.layout.main')

@section('title')
Interview Request
@endsection

@section('content')
@push('page-css')
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
</style>
@endpush

<div class="dashboard-body">
    <div class="position-relative">
        <!-- ************************ Header **************************** -->
		 	@include('employer.layout.header_menu')
        <!-- End Header -->

        <div class="d-sm-flex align-items-center justify-content-between mb-40 lg-mb-30">
            <h2 class="main-title m0">My Jobs</h2>
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
                                        <div class="job-name job-title fw-500"><a href="{{route('candidateProfileNew', \Crypt::encryptString($interview->jobCandidate->id))}}">{{$interview->jobCandidate->candidatePersonalDetails->full_name ?? ''}}</a></div>
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
                                     }else
                                     {
                                        $status = 'pending';
                                            $message = 'Reschedule Request';
                                     }
                                @endphp
                                <tr class="{{$status}}">
                                    <td>
                                        <div class="job-name job-title fw-500"><a href="{{route('candidateProfileNew', \Crypt::encryptString($interview->jobCandidate->id))}}">{{$interview->jobCandidate->candidatePersonalDetails->full_name ?? ''}}</a></div>
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


@endsection