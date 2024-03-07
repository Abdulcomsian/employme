@extends('employer.layout.main')

@section('title')
Saved Candidate
@endsection
@section('content')
<div class="dashboard-body">
    <div class="position-relative">
        <!-- ************************ Header **************************** -->
		 	@include('employer.layout.header_menu')
        <!-- End Header -->

        <div class="d-flex align-items-center justify-content-between mb-40 lg-mb-30">
            <h2 class="main-title m0">Saved Candidate</h2>
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
        @if(!$employerSavedCandidates->isEmpty())
            @foreach($employerSavedCandidates as $index=>$savedCandidate)
            <div class="candidate-profile-card list-layout border-0 mb-25">
                <div class="d-flex">
                    <!-- <div class="cadidate-avatar online position-relative d-block me-auto ms-auto"><a href="#" class="rounded-circle"><img src="../images/lazy.svg" data-src="../images/candidates/img_03.jpg" alt="" class="lazy-img rounded-circle"></a></div> -->
                    @if(isset($savedCandidate->candidatePersonalDetails->profile_picture) && !empty($savedCandidate->candidatePersonalDetails->profile_picture))
                    <div class="cadidate-avatar online position-relative me-auto ms-auto"><a href="{{route('candidateProfileNew', \Crypt::encryptString($savedCandidate->id))}}" class="rounded-circle"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset($savedCandidate->candidatePersonalDetails->profile_picture)}}" alt="" class="lazy-img rounded-circle"></a></div>
                    @else
                    <div class="cadidate-avatar online position-relative me-auto ms-auto"><a href="{{route('candidateProfileNew', \Crypt::encryptString($savedCandidate->id))}}" class="rounded-circle"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/candidates/img_01.jpg')}}" alt="" class="lazy-img rounded-circle"></a></div>
                    @endif
                    <div class="right-side">
                        <div class="row gx-1 align-items-center">
                            <div class="col-xl-3">
                                <div class="position-relative">
                                    <h4 class="candidate-name mb-0"><a href="{{route('candidateProfileNew', \Crypt::encryptString($savedCandidate->id))}}" class="tran3s">{{$savedCandidate->candidatePersonalDetails->full_name}}</a></h4>
                                    <div class="candidate-post">Artist</div>
                                    <ul class="cadidate-skills style-none d-flex align-items-center">
                                        @if(isset($savedCandidate->candidatePreferences->skills) && !empty($savedCandidate->candidatePreferences->skills))
										@foreach($savedCandidate->candidatePreferences->skills as $index=>$skill)
										@if($index < 3)
										<li>{{$skill}}</li>
										@endif
										@endforeach
										@endif
										@if(isset($savedCandidate->candidatePreferences->skills) && !empty($savedCandidate->candidatePreferences->skills))
										@if(count($savedCandidate->candidatePreferences->skills) > 3)
										<li class="more">+{{{count($savedCandidate->candidatePreferences->skills)-3}}}</li>
										@endif
										@endif
                                    </ul>
                                    <!-- /.cadidate-skills -->
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="candidate-info">
                                    <span>Salary</span>
                                    <div>{{$savedCandidate->candidatePreferences->expected_salary}}{{!empty($savedCandidate->candidatePreferences->expected_salary) ? '/month' : ''}}</div>
                                </div>
                                <!-- /.candidate-info -->
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="candidate-info">
                                    <span>Location</span>
                                    <div>New York, US</div>
                                </div>
                                <!-- /.candidate-info -->
                            </div>
                            <div class="col-xl-3 col-md-4">
                                <div class="d-flex justify-content-md-end align-items-center">
                                    {{--<a href="#" class="save-btn text-center rounded-circle tran3s mt-10 fw-normal"><i class="bi bi-eye"></i></a>--}}
                                    <div class="action-dots float-end mt-10 ms-2">
                                        <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="{{route('candidateProfileNew', \Crypt::encryptString($savedCandidate->id))}}"><img src="../images/lazy.svg" data-src="{{asset('assets/images/icon/icon_60.svg')}}" alt="" class="lazy-img"> View</a></li>
                                            {{--  <li><a class="dropdown-item" href="#"><img src="../images/lazy.svg" data-src="images/icon/icon_19.svg" alt="" class="lazy-img"> Share</a></li>
                                            <li><a class="dropdown-item" href="#"><img src="../images/lazy.svg" data-src="images/icon/icon_20.svg" alt="" class="lazy-img"> Edit</a></li>   --}}
                                            <li><a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                                document.getElementById('destroy-form').submit();"><img src="../images/lazy.svg" data-src="{{asset('assets/images/icon/icon_8.svg')}}" alt="" class="lazy-img"> Delete</a></li>
                                        </ul>
                            
                                <form id="destroy-form" action="{{ route('removeSavedCandidate', $savedCandidate->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')

                                </form>
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
                    <center><b>No Candidate Found</b></center>
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
                                {{-- candidate-info  --}} 
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="candidate-info">
                                    <span>Location</span>
                                    <div>Manchester, UK</div>
                                </div>
                                {{-- candidate-info  --}} 
                            </div>
                            <div class="col-xl-3 col-md-4">
                                <div class="d-flex justify-content-md-end align-items-center">
                                    <a href="#" class="save-btn text-center rounded-circle tran3s mt-10 fw-normal"><i class="bi bi-eye"></i></a>
                                    <div class="action-dots float-end mt-10 ms-2">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- /.candidate-profile-card -->
            <!-- <div class="candidate-profile-card list-layout border-0 mb-25">
                <div class="d-flex">
                    <div class="cadidate-avatar online position-relative d-block me-auto ms-auto"><a href="#" class="rounded-circle"><img src="../images/lazy.svg" data-src="../images/candidates/img_03.jpg" alt="" class="lazy-img rounded-circle"></a></div>
                    <div class="right-side">
                        <div class="row gx-1 align-items-center">
                            <div class="col-xl-3">
                                <div class="position-relative">
                                    <h4 class="candidate-name mb-0"><a href="#" class="tran3s">Julia Ark</a></h4>
                                    <div class="candidate-post">Graphic Designer</div>
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
                                    <div>Milan, Italy</div>
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
                                            <li><a class="dropdown-item" href="#"><img src="../images/lazy.svg" data-src="images/icon/icon_18.svg" alt="" class="lazy-img"> View</a></li>
                                            <li><a class="dropdown-item" href="#"><img src="../images/lazy.svg" data-src="images/icon/icon_19.svg" alt="" class="lazy-img"> Share</a></li>
                                            <li><a class="dropdown-item" href="#"><img src="../images/lazy.svg" data-src="images/icon/icon_20.svg" alt="" class="lazy-img"> Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><img src="../images/lazy.svg" data-src="images/icon/icon_21.svg" alt="" class="lazy-img"> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- /.candidate-profile-card -->
            <!-- <div class="candidate-profile-card list-layout border-0 mb-25">
                <div class="d-flex">
                    <div class="cadidate-avatar online position-relative d-block me-auto ms-auto"><a href="#" class="rounded-circle"><img src="../images/lazy.svg" data-src="../images/candidates/img_04.jpg" alt="" class="lazy-img rounded-circle"></a></div>
                    <div class="right-side">
                        <div class="row gx-1 align-items-center">
                            <div class="col-xl-3">
                                <div class="position-relative">
                                    <h4 class="candidate-name mb-0"><a href="#" class="tran3s">Jannat Ka</a></h4>
                                    <div class="candidate-post">Marketing Expert</div>
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
                                    <div>California, US</div>
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
                                            <li><a class="dropdown-item" href="#"><img src="../images/lazy.svg" data-src="images/icon/icon_18.svg" alt="" class="lazy-img"> View</a></li>
                                            <li><a class="dropdown-item" href="#"><img src="../images/lazy.svg" data-src="images/icon/icon_19.svg" alt="" class="lazy-img"> Share</a></li>
                                            <li><a class="dropdown-item" href="#"><img src="../images/lazy.svg" data-src="images/icon/icon_20.svg" alt="" class="lazy-img"> Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><img src="../images/lazy.svg" data-src="images/icon/icon_21.svg" alt="" class="lazy-img"> Delete</a></li>
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
        {{ $employerSavedCandidates->links('vendor.pagination.custom-pagination-2') }}
    </div>
</div>


@endsection