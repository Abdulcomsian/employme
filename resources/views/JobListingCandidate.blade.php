@extends('employer.layout.main')

@section('title') 
    Employer Saved Candidate
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
						<form action="#" class="search-form">
							<input type="text" placeholder="Search here..">
							<button><img src="../images/lazy.svg" data-src="images/icon/icon_10.svg" alt="" class="lazy-img m-auto"></button>
						</form>
						<div class="profile-notification ms-2 ms-md-5 me-4">
							<button class="noti-btn dropdown-toggle" type="button" id="notification-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
								<img src="../images/lazy.svg" data-src="images/icon/icon_11.svg" alt="" class="lazy-img">
								<div class="badge-pill"></div>
							</button>
							<ul class="dropdown-menu" aria-labelledby="notification-dropdown">
								<li>
									<h4>Notification</h4>
									<ul class="style-none notify-list">
										<li class="d-flex align-items-center unread">
											<img src="../images/lazy.svg" data-src="images/icon/icon_36.svg" alt="" class="lazy-img icon">
											<div class="flex-fill ps-2">
												<h6>You have 3 new mails</h6>
												<span class="time">3 hours ago</span>
											</div>
										</li>
										<li class="d-flex align-items-center">
											<img src="../images/lazy.svg" data-src="images/icon/icon_37.svg" alt="" class="lazy-img icon">
											<div class="flex-fill ps-2">
												<h6>Your job post has been approved</h6>
												<span class="time">1 day ago</span>
											</div>
										</li>
										<li class="d-flex align-items-center unread">
											<img src="../images/lazy.svg" data-src="images/icon/icon_38.svg" alt="" class="lazy-img icon">
											<div class="flex-fill ps-2">
												<h6>Your meeting is cancelled</h6>
												<span class="time">3 days ago</span>
											</div>
										</li>
									</ul>
								</li>
							</ul>
						</div>
						<div><a href="employer-dashboard-submit-job.html" class="job-post-btn tran3s">Post a Job</a></div>
					</div>
				</header>
				<!-- End Header -->

				<div class="d-flex align-items-center justify-content-between mb-40 lg-mb-30">
                    <div class="d-flex align-items-center">
                    <!-- <a href="{{ url()->previous() }}" class="pe-2"> <button type="button" class="dash-btn-two tran3s" data-bs-dismiss="modal">Back</button></a> -->
                        <h2 class="main-title m0">Candidate</h2>
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
                    <div class="candidate-profile-card list-layout border-0 mb-25">
                        <div class="d-flex">
                            <div class="cadidate-avatar online position-relative d-block me-auto ms-auto"><a href="#" class="rounded-circle"><img src="../images/lazy.svg" data-src="../images/candidates/img_03.jpg" alt="" class="lazy-img rounded-circle"></a></div>
                            <div class="right-side">
                                <div class="row gx-1 align-items-center">
                                    <div class="col-xl-3">
                                        <div class="position-relative">
                                            <h4 class="candidate-name mb-0"><a href="#" class="tran3s">Shofie Ana</a></h4>
                                            <div class="candidate-post">Artist</div>
                                            <ul class="cadidate-skills style-none d-flex align-items-center">
                                                <li>Design</li>
                                                <li>UI</li>
                                                <li>Digital</li>
                                                <li class="more">2+</li>
                                            </ul>
                                            <!-- /.cadidate-skills -->
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="candidate-info">
                                            <span>Salary</span>
                                            <div>$30k-$50k/yr</div>
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
                                            <a href="{{route('candidateProfileNew')}}" class="save-btn text-center rounded-circle tran3s mt-10 fw-normal"><i class="bi bi-eye"></i></a>
                                            <div class="action-dots float-end mt-10 ms-2">
                                                <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <span></span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item" href="{{route('ListYourJob')}}"><img src="../images/lazy.svg" data-src="images/icon/icon_18.svg" alt="" class="lazy-img"> View</a></li>
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
                    </div> 
                    <!-- /.candidate-profile-card -->
                    <div class="candidate-profile-card list-layout border-0 mb-25">
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
                                            <!-- /.cadidate-skills -->
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="candidate-info">
                                            <span>Salary</span>
                                            <div>$30k-$50k/yr</div>
                                        </div>
                                        <!-- /.candidate-info -->
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="candidate-info">
                                            <span>Location</span>
                                            <div>Manchester, UK</div>
                                        </div>
                                        <!-- /.candidate-info -->
                                    </div>
                                    <div class="col-xl-3 col-md-4">
                                        <div class="d-flex justify-content-md-end align-items-center">
                                            <a href="#" class="save-btn text-center rounded-circle tran3s mt-10 fw-normal"><i class="bi bi-eye"></i></a>
                                            <div class="action-dots float-end mt-10 ms-2">
                                                <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <span></span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item"  href="{{route('ListYourJob')}}"><img src="../images/lazy.svg" data-src="images/icon/icon_18.svg" alt="" class="lazy-img"> View</a></li>
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
                    </div> 
                    <!-- /.candidate-profile-card -->
                    <div class="candidate-profile-card list-layout border-0 mb-25">
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
                                            <!-- /.cadidate-skills -->
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="candidate-info">
                                            <span>Salary</span>
                                            <div>$30k-$50k/yr</div>
                                        </div>
                                        <!-- /.candidate-info -->
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="candidate-info">
                                            <span>Location</span>
                                            <div>Milan, Italy</div>
                                        </div>
                                        <!-- /.candidate-info -->
                                    </div>
                                    <div class="col-xl-3 col-md-4">
                                        <div class="d-flex justify-content-md-end align-items-center">
                                            <a href="#" class="save-btn text-center rounded-circle tran3s mt-10 fw-normal"><i class="bi bi-eye"></i></a>
                                            <div class="action-dots float-end mt-10 ms-2">
                                                <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <span></span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item" href="{{route('ListYourJob')}}"><img src="../images/lazy.svg" data-src="images/icon/icon_18.svg" alt="" class="lazy-img"> View</a></li>
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
                    </div> 
                    <!-- /.candidate-profile-card -->
                    <div class="candidate-profile-card list-layout border-0 mb-25">
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
                                            <!-- /.cadidate-skills -->
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="candidate-info">
                                            <span>Salary</span>
                                            <div>$30k-$50k/yr</div>
                                        </div>
                                        <!-- /.candidate-info -->
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="candidate-info">
                                            <span>Location</span>
                                            <div>California, US</div>
                                        </div>
                                        <!-- /.candidate-info -->
                                    </div>
                                    <div class="col-xl-3 col-md-4">
                                        <div class="d-flex justify-content-md-end align-items-center">
                                            <a href="#" class="save-btn text-center rounded-circle tran3s mt-10 fw-normal"><i class="bi bi-eye"></i></a>
                                            <div class="action-dots float-end mt-10 ms-2">
                                                <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <span></span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item" href="{{route('ListYourJob')}}"><img src="../images/lazy.svg" data-src="images/icon/icon_18.svg" alt="" class="lazy-img"> View</a></li>
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
                    </div> 
                    <!-- /.candidate-profile-card -->
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