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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <h2 class="main-title m0">Employers</h2>
           {{-- <div class="d-flex ms-auto xs-mt-30">
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
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Email Verified</th>
                            <th scope="col">Certificate</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="border-0">
                     @isset($employers)
                        @foreach($employers as $index=>$employer)
                        <tr class="active">
                        <td>{{$index+1}}</td>
                            <td>
                                <div class="job-name employer-name" ><a href="{{route('companyAboutUs',\Crypt::encryptString($employer->id))}}"> {{$employer->employerDetails->institution ?? ''}}</a></div>
                                <!-- <div class="info1">Fulltime . Spain</div> -->
                            </td>
                            <td >{{$employer->email}}</td>
                            <td>
                                <div class="job-status"  >{{auth()->user()->email_verified_at ? 'Verified' : 'Unverified'}}</div>
                            </td>
                            <td>
                                <div class="license text-center"  >@if($employer->license) <a href="{{asset($employer->license->license_file)}}"><i class="fa-regular fa-file"></i></a> @else <i title="No Certificate Added" class="fa-solid fa-file-circle-xmark"></i> @endif </div>
                            </td>
                            <td>
                                <select class="form-select employer-approval-status" name="" id="" data-employer-id="{{$employer->id}}">
                                    <option value="">Approval Status</option>
                                    <option value="{{\AppConst::LICENSE_PENDING}}" @if($employer->license->approval_status == \AppConst::LICENSE_PENDING) selected @endif>Pending</option>
                                    <option value="{{\AppConst::LICENSE_APPROVED}}" @if($employer->license->approval_status == \AppConst::LICENSE_APPROVED) selected @endif>Approval</option>
                                    <option value="{{\AppConst::LICENSE_REJECTED}}" @if($employer->license->approval_status == \AppConst::LICENSE_REJECTED) selected @endif>Rejected</option>
                                </select>
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
        {{ $employers->links('vendor.pagination.custom-pagination-2') }}

        @push('page-script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script>
                $(document).on("change" , ".employer-approval-status" , function(e){
                    let employerId = this.dataset.employerId;
                    let status = this.value;
                    $.ajax({
                        type : 'POST',
                        url : "{{route('updateCertificateApprovalStatus')}}",
                        data : {
                            _token : "{{csrf_token()}}",
                            employerId : employerId,
                            status : status
                        },
                        success : function(res){
                            if(res.status){
                                toastr.success(res.message);
                            }else{
                                toastr.error(res.error);
                            }
                        }
                    })
                })
            </script>
        @endpush

    </div>
</div>
@endsection