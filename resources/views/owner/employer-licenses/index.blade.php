@extends('owner.layout.main')
@section('title')
Employers
@endsection
@push('page-css')
<style>
     .employer-name  {
    color: #00BF58 !important;
    
 }
 .employer-name a:hover{
    color: #D2F34C !important;
    
    /* color: #244034; */
 }
 .active {
    /* background-color: #04AA6D; */
    color: black !important;
}
</style>
@endpush
@section('content')
<div class="dashboard-body">
    <div class="position-relative">
        <!-- ************************ Header **************************** -->
        <header class="dashboard-header">
            <div class="d-flex align-items-center justify-content-end">
                <button class="dash-mobile-nav-toggler d-block d-md-none me-auto">
                    <span></span>
                </button>
                <form action="#" class="search-form">
                    <input type="text" placeholder="Search here..">
                    <button><img src="{{ asset('assets/images/lazy.svg') }}" data-src="{{ asset('assets/images/dashboard-icon/icon_10.svg') }}" alt="" class="lazy-img m-auto"></button>
                </form>
                <div class="profile-notification ms-2 ms-md-5 me-4">
                    <button class="noti-btn dropdown-toggle" type="button" id="notification-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                        <img src="{{ asset('assets/images/lazy.svg') }}" data-src="{{ asset('assets/images/icon/icon_11.svg') }}" alt="" class="lazy-img">
                        <div class="badge-pill"></div>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="notification-dropdown">
                        <li>
                            <h4>Notification</h4>
                            <ul class="style-none notify-list">
                                <li class="d-flex align-items-center unread">
                                    <img src="{{ asset('assets/images/lazy.svg') }}" data-src="{{ asset('assets/images/icon/icon_36.svg') }}" alt="" class="lazy-img icon">
                                    <div class="flex-fill ps-2">
                                        <h6>You have 3 new mails</h6>
                                        <span class="time">3 hours ago</span>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <img src="{{ asset('assets/images/lazy.svg') }}" data-src="{{ asset('assets/images/icon/icon_37.svg') }}" alt="" class="lazy-img icon">
                                    <div class="flex-fill ps-2">
                                        <h6>Your job post has been approved</h6>
                                        <span class="time">1 day ago</span>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center unread">
                                    <img src="{{ asset('assets/images/lazy.svg') }}" data-src="{{ asset('assets/images/icon/icon_38.svg') }}" alt="" class="lazy-img icon">
                                    <div class="flex-fill ps-2">
                                        <h6>Your meeting is cancelled</h6>
                                        <span class="time">3 days ago</span>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div><a href="{{ route('postAJob') }}" class="job-post-btn tran3s">Post a Job</a></div>
            </div>
        </header>

        <div class="d-sm-flex align-items-center justify-content-between mb-40 lg-mb-30">
            <h2 class="main-title m0">Business Licenses</h2>
            {{--<div class="d-flex ms-auto xs-mt-30">
                <div class="nav nav-tabs tab-filter-btn me-4" id="nav-tab" role="tablist">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#a1" type="button" role="tab" aria-selected="true">All</button>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#a2" type="button" role="tab" aria-selected="false">New</button>
                </div>
                <div class="short-filter d-flex align-items-center ms-auto">
                    <div class="text-dark fw-500 me-2">Short by:</div>
                    <select class="nice-select">
                        <option value="0">Verified</option>
                        <option value="1">Unverified</option>
                        <option value="2">Active</option>
                        <option value="2">Disabled</option>
                    </select>
                </div>
            </div>--}}
        </div>

        <div class="bg-white card-box border-20">
           
            <div class="table-responsive">
                <table class="table job-alert-table">
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">License</th>
                            <th scope="col">License Number</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="border-0 add-more">
                     @isset($employerLicenses)
                    @foreach($employerLicenses as $index=>$license)
                            @php
                            if($license->approval_status == 0 )
                              {
                                $status = 'pending';
                                $message = 'Pending';
                              }elseif($license->approval_status == 1)
                              {
                                $status = 'active';
                                $message = 'Approved';
                              }elseif($license->approval_status == 2)
                              {
                                $status = 'expired';
                                $message = 'Rejected';
                              }
                            @endphp
                        <tr class="{{$status ?? 'active'}}">
                        <td>
                        @if(isset($license->user->employerDetails->institution_logo) && !empty($license->user->employerDetails->institution_logo))
                        <img class="rounded-circle shadow-1-strong"
												src="{{asset($license->user->employerDetails->institution_logo)}}" alt="avatar"
												style="width: 50px;margin-right:7px;" />
                        @else
                        <img src="{{asset('assets/images/avatar_04.jpg')}}" data-src="{{asset('assets/images/avatar_04.jpg')}}" alt="avatar" class ="rounded-circle shadow-1-strong" style="width: 50px;margin-right:7px;">
                        @endif
                        </td>
                            <td>
                                <div class="job-name employer-name" ><a href="{{route('companyAboutUs',\Crypt::encryptString($license->user->id))}}"> {{$license->user->employerDetails->institution ?? ''}}</a></div>
                                <!-- <div class="info1">Fulltime . Spain</div> -->
                            </td>
                            <td >
                                @if(isset($license->license_file) && !empty($license->license_file))
                                <div style = "padding-left:20px;">
                                    <a class="btn btn-primary" href = "{{asset($license->license_file)}}" target = "_blank">File</a>
                                </div>
                                @endif 
                            </td>
                            <td>
                                <div  >{{$license->license_number}}</div>
                            </td>
                            <td>
                                <div class="job-status">{{$message ?? ''}}</div>
                            </td>
                          
                            <td>
                                <div class="action-dots float-end">
                                    <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#" onclick="event.preventDefault();
                                            document.getElementById('accept-form-{{$license->id}}').submit();"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/Accept.svg')}}" alt="" class="lazy-img"> Approve</a>
                                        </li>                                                
                                        <li><a class="dropdown-item" href="#" onclick="event.preventDefault();
                                            document.getElementById('reject-form-{{$license->id}}').submit();"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/Reject.svg')}}" alt="" class="lazy-img"> Reject</a>
                                        </li>                                                
                                        <form id="accept-form-{{$license->id}}" action="{{ route('owner.employerApproveLicense', $license->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        </form>
                                        <form id="reject-form-{{$license->id}}" action="{{ route('owner.employerRejectLicense', $license->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        </form>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endisset
                    </tbody>
                </table>
                <!-- /.table job-alert-table -->
            </div>
        </div>
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
        {{ $employerLicenses->links('vendor.pagination.custom-pagination-2') }}

    </div>
</div>

@endsection