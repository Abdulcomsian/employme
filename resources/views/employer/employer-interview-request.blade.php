@extends('employer.layout.main')

@section('title') 
    Employer Interview Request
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

				<div class="d-sm-flex align-items-center justify-content-between mb-40 lg-mb-30">
                    <h2 class="main-title m0">My Jobs</h2>
                    <div class="d-flex ms-auto xs-mt-30">
                        <div class="nav nav-tabs tab-filter-btn me-4" id="nav-tab" role="tablist">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#a1" type="button" role="tab"  aria-selected="true">All</button>
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#a2" type="button" role="tab"  aria-selected="false">New</button>
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
                                            <th scope="col">Job Created</th>
                                            <th scope="col">Applicants</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-0"> 
                                        <tr class="active">
                                            <td>
                                                <div class="job-name fw-500">Brand & Producr Designer</div>
                                                <div class="info1">Fulltime . Spain</div>
                                            </td>
                                            <td>13 Aug, 2022</td>
                                            <td>130 Applications</td>
                                            <td><div class="job-status">Active</div></td>
                                            <td>
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
                                            </td>
                                        </tr>
                                        <tr class="pending">
                                            <td>
                                                <div class="job-name fw-500">Marketing Specialist</div>
                                                <div class="info1">Part-time . Uk</div>
                                            </td>
                                            <td>05 Jun, 2022</td>
                                            <td>20 Applicants</td>
                                            <td><div class="job-status">Pending</div></td>
                                            <td>
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
                                            </td>
                                        </tr>
                                        <tr class="expired">
                                            <td>
                                                <div class="job-name fw-500">Accounting Manager</div>
                                                <div class="info1">Fulltime . USA</div>
                                            </td>
                                            <td>27 Sep, 2021</td>
                                            <td>273 Applicants</td>
                                            <td><div class="job-status">Expired</div></td>
                                            <td>
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
                                            </td>
                                        </tr>
                                        <tr class="active">
                                            <td>
                                                <div class="job-name fw-500">Developer for IT company</div>
                                                <div class="info1">Fulltime . Germany</div>
                                            </td>
                                            <td>14 Feb, 2021</td>
                                            <td>70 Applicants</td>
                                            <td><div class="job-status">Active</div></td>
                                            <td>
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
                                            </td>
                                        </tr>
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
                                            <td><div class="job-status">Pending</div></td>
                                            <td>
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
                                            </td>
                                        </tr>
                                        <tr class="active">
                                            <td>
                                                <div class="job-name fw-500">Brand & Producr Designer</div>
                                                <div class="info1">Fulltime . Spain</div>
                                            </td>
                                            <td>13 Aug, 2022</td>
                                            <td>130 Applications</td>
                                            <td><div class="job-status">Active</div></td>
                                            <td>
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
                                            </td>
                                        </tr>
                                        <tr class="active">
                                            <td>
                                                <div class="job-name fw-500">Developer for IT company</div>
                                                <div class="info1">Fulltime . Germany</div>
                                            </td>
                                            <td>14 Feb, 2021</td>
                                            <td>70 Applicants</td>
                                            <td><div class="job-status">Active</div></td>
                                            <td>
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
                                            </td>
                                        </tr>
                                        <tr class="expired">
                                            <td>
                                                <div class="job-name fw-500">Accounting Manager</div>
                                                <div class="info1">Fulltime . USA</div>
                                            </td>
                                            <td>27 Sep, 2021</td>
                                            <td>273 Applicants</td>
                                            <td><div class="job-status">Expired</div></td>
                                            <td>
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