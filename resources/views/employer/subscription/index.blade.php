@extends('employer.layout.main')

@section('title')
Job Listing
@endsection
@push('page-css')
<style>
    .active {
    /* background-color: #04AA6D; */
    color: black !important;
}
.job-title, .job-application, .candidate-profile  {
    color: #00BF58 !important;
    
 }
 .job-title a:hover{
    color: #D2F34C !important;
    
    /* color: #244034; */
 }
</style>
@endpush
@section('content')

<div class="dashboard-body">
    <div class="position-relative">
        <!-- ************************ Header **************************** -->
            @include('employer.layout.header_menu')
        <!-- End Header -->

        <div class="d-sm-flex align-items-center justify-content-between mb-40 lg-mb-30">
            <h2 class="main-title m0">Subscription</h2>
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Plan</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Subscription Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="border-0">
                               
                                @foreach($subscriptions as $index=>$subscription)
                                <tr class="active">
                                    <td>
                                        <div class="job-name fw-500 candidate-profile"><a href="#">{{$subscription->plan->name}}</a></div>
                                    </td>
                                    <td>
                                        <div class="job-name fw-500 job-title"><a href="">{{$subscription->plan->name}}</a></div>
                                        <div class="info1">{{$subscription->plan->price}}</div>
                                    </td>
                                    <td>{{$subscription->plan->price}} USD</td>
                                    <td>
                                        <div class="job-status">{{$subscription->stripe_status}}</div>
                                    </td>
                                    <td>{{date('d M, Y',strtotime($subscription->created_at))}}</td>
                                    <td>
                                        <div class="action-dots float-end">
                                            <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href=""><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_18.svg')}}" alt="" class="lazy-img"> View</a></li>
                                                <li><a class="dropdown-item" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_19.svg')}}" alt="" class="lazy-img"> Share</a></li>
                                                <li><a class="dropdown-item" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_20.svg')}}" alt="" class="lazy-img"> Edit</a></li>
                                                <li><a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                                document.getElementById('destroy-form').submit();"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_21.svg')}}" alt="" class="lazy-img"> Cancel</a></li>
                                            </ul>
                                        </div>
                                        <form id="destroy-form" action="{{route('cancelSubscription')}}" method="POST" style="display: none;">
                                                @csrf
                                            <input type="hidden" name="subscription_id" value="{{$subscription->id}}">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                <!-- <tr class="pending">
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
                                </tr> -->
                            </tbody>
                        </table>
                        <!-- /.table job-alert-table -->
                    </div>
                </div>
                <div class="tab-pane fade" id="a2" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table job-alert-table">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Job Created</th>
                                    <th scope="col">Applicants</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="border-0">
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

                            </tbody>
                        </table>
                        <!-- /.table job-alert-table -->
                    </div>
                </div>
            </div>

        </div>
        <!-- /.card-box -->


        <div class="dash-pagination d-flex justify-content-end mt-30">
            <ul class="style-none d-flex align-items-center">
                <li><a href="#" class="active">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li>..</li>
                <li><a href="#">7</a></li>
                <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
            </ul>
        </div>
    </div>
</div>
@endsection