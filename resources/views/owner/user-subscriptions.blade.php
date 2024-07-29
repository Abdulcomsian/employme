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
        <!-- <header class="dashboard-header">
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
        </header> -->

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
                            <th scope="col">User</th>
                            <th scope="col">Plan</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Reciept</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="border-0">
                        @foreach($subscriptions as $index =>$subscription)
                        <tr class="active">
                        <td>{{$index+1}}</td>
                            <td >{{$subscription->user->name}}</td>
                            <td>
                                <div>{{$subscription->plan->name}}</div>
                            </td>
                            <td>
                               <div>{{$subscription->duration}}</div>
                            </td>
                            <td>
                               <div>{{$subscription->mobile_number ?? '-'}}</div>
                            </td>
                            
                            <td>
                                <div class="license ps-4"> 
                                    @if($subscription->reciept)
                                      <a href="{{asset('uploads/reciept').'/'.$subscription->reciept}}"><i class="fa-regular fa-file"></i></a>  
                                    @else
                                      -
                                    @endif
                                </div>
                            </td>
                            <td>
                                <select class="form-select subscription-approval-status" name="" id="" data-subscription-id="{{$subscription->id}}">
                                    <option value="0" @if($subscription->is_approved == 0) selected @endif>Pending</option>
                                    <option value="1" @if($subscription->is_approved == 1) selected @endif>Approved</option>
                                  
                                </select>
                            </td>
                          
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- /.table job-alert-table -->
            </div>
        </div>
      
        {{ $subscriptions->links('vendor.pagination.custom-pagination-2') }}

        @push('page-script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script>
                $(document).on("change" , ".subscription-approval-status" , function(e){
                    let subscriptionId = this.dataset.subscriptionId;
                    let status = this.value;
                    $.ajax({
                        type : 'POST',
                        url : "{{route('updateSubscriptionStatus')}}",
                        data : {
                            _token : "{{csrf_token()}}",
                            subscriptionId : subscriptionId,
                            status : status
                        },
                        success : function(res){
                            if(res.status){
                                toastr.success(res.msg);
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