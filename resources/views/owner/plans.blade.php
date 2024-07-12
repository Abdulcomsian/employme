@extends('owner.layout.main')
@section('title')
Plans
@endsection
@section('content')
<div class="dashboard-body">
    <div class="position-relative">
        <!-- ************************ Header **************************** -->
        <header class="dashboard-header">
            <div class="d-flex align-items-center justify-content-end">
                <button class="dash-mobile-nav-toggler d-block d-md-none me-auto">
                    <span></span>
                </button>
              
            </div>
        </header>

        <div class="d-sm-flex align-items-center justify-content-between mb-40 lg-mb-30">
            <h2 class="main-title m0">Plans</h2>
        </div>

        <div class="bg-white card-box border-20">
            <!-- <div class="row">
                @foreach($plans as $plan)
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-header"> 
                                ${{ $plan->price }}/Mo
                            </div>
                            <div class="card-body">
                            <h5 class="card-title">{{ $plan->name }}</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                            <a href="{{ route('plans.show', $plan->slug) }}" class="btn btn-primary pull-right">Choose</a>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div> -->
            <div class="table-responsive">
                <table class="table job-alert-table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Duration</th>
                            {{--<th scope="col">Action</th>--}}
                        </tr>
                    </thead>
                    <tbody class="border-0">
                    @foreach($plans as $index=>$plan)
                        <tr class="active">
                            <td>{{$index+1}}</td>
                            <td>
                                <div class="job-name " style = "color:black">{{$plan->name}}</div>
                                <!-- <div class="info1">Fulltime . Spain</div> -->
                            </td>
                            <td style = "color:black">₩ {{$plan->price}}</td>
                            <td style = "color:black">{{$plan->duration}} months</td>
                            <!-- <td>
                                <div class="job-status"  >Verified</div>
                            </td> -->
                            {{--<td>
                                <div class="action-dots float-end">
                                    <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#"><img src="../images/lazy.svg" data-src="images/icon/icon_18.svg" alt="" class="lazy-img"> View</a></li>
                                        <li><a class="dropdown-item" href="#"><img src="../images/lazy.svg" data-src="images/icon/icon_19.svg" alt="" class="lazy-img"> Share</a></li>
                                        <li><a class="dropdown-item" href="#"><img src="../images/lazy.svg" data-src="images/icon/icon_20.svg" alt="" class="lazy-img"> Edit</a></li>
                                        <li><a class="dropdown-item" href="#"><img src="../images/lazy.svg" data-src="images/icon/icon_21.svg" alt="" class="lazy-img"> Delete</a></li>
                                    </ul>
                                </div>
                            </td>--}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- /.table job-alert-table -->
            </div>
        </div>
        {{--
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
                --}}
    </div>
</div>
@endsection