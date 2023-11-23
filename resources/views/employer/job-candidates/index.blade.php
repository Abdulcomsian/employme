@extends('employer.layout.main')

@section('title')
Employer Saved Candidate
@endsection

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
                            <div class="col-xl-3">
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
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="candidate-info">
                                    <span>Salary</span>
                                    <div>{{$jobApplicant->candidatePreferences->expected_salary ?? ''}}{{!empty($jobApplicant->candidatePreferences->expected_salary) ? '/mo' : ''}}</div>
                                </div>
                                <!-- /.candidate-info -->
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="candidate-info">
                                    <span>Location</span>
                                    <div>{{$jobApplicant->candidatePersonalDetails->current_location ?? ''}}</div>
                                </div>
                                <!-- /.candidate-info -->
                            </div>
                            <div class="col-xl-3 col-md-4">
                                <div class="d-flex justify-content-md-end align-items-center">
                                    <a href="{{route('candidateProfileNew',\Crypt::encryptString($jobApplicant->id))}}" class="save-btn text-center rounded-circle tran3s mt-10 fw-normal"><i class="bi bi-eye"></i></a>
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


@endsection