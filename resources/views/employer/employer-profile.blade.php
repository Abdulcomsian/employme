@extends('employer.layout.main')

@section('title') 
    Employer Profile
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
						<div><a href="employer-dashboard-submit-job.html" class="job-post-btn tran3s">Job Marketplace</a></div>
					</div>
				</header>
				<!-- End Header -->

				<h2 class="main-title">Profile</h2>

				<div class="bg-white card-box border-20">
                    <div class="user-avatar-setting d-flex align-items-center mb-30">
                        <img src="../images/lazy.svg" data-src="{{asset('assets/images/avatar_04.jpg')}}" alt="" class="lazy-img user-img">
                        <div class="upload-btn position-relative tran3s ms-4 me-3">
                            Upload new photo
                            <input type="file" id="uploadImg" name="uploadImg" placeholder="">
                        </div>
                        <button class="delete-btn tran3s">Delete</button>
                    </div>
                    <!-- /.user-avatar-setting -->
					<div class="row">
						<div class="col-md-6">
							<div class="dash-input-wrapper mb-30">
								<label for="">Employer Name*</label>
								<input type="text" placeholder="Zubayer Hasan">
							</div>
						</div>
						<div class="col-md-6">
							<div class="dash-input-wrapper mb-30">
								<label for="">Employer Bussiness Registration Number *</label>
								<input type="text" placeholder="AD1234">
							</div>
						</div>
					</div>
           
                    <!-- /.dash-input-wrapper -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Email*</label>
                                <input type="email" placeholder="companyinc@gmail.com">
								<!-- <label for="socialmedia">Social Media</label>
								<input type="email" placeholder="www.facebook.com/profile"> -->
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>
                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Website*</label>
                                <input type="text" placeholder="http://somename.come">
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Founded Date*</label>
                                <input type="date">
                            </div>
                    
                        </div>
                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Company Size*</label>
                                <input type="text" placeholder="700">
                            </div>
                    
                        </div> -->
                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Phone Number*</label>
                                <input type="tel" placeholder="+880 01723801729">
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Category*</label>
                                <input type="text" placeholder="Account, Finance, Marketing">
                            </div>
                    
                        </div> -->
                    </div>
                    <!-- <div class="dash-input-wrapper">
                        <label for="">About Company*</label>
                        <textarea class="size-lg" placeholder="Write something interesting about you...."></textarea>
						<div class="alert-text">Brief description for your company. URLs are hyperlinked.</div>
                    </div> -->
                    <!-- /.dash-input-wrapper -->
                </div>
				<!-- /.card-box -->

				<div class="bg-white card-box border-20 mt-40">
                    <h4 class="dash-title-three">Social Media</h4>

                    <div class="dash-input-wrapper mb-20">
                        <label for="">Network 1</label>
                        <input type="text" placeholder="https://www.facebook.com/zubayer0145">
                    </div>
                    <!-- /.dash-input-wrapper -->
                    <div class="dash-input-wrapper mb-20">
                        <label for="">Network 2</label>
                        <input type="text" placeholder="https://twitter.com/FIFAcom">
                    </div>
                    <!-- /.dash-input-wrapper -->
					<a href="#" class="dash-btn-one"><i class="bi bi-plus"></i> Add more link</a>
                </div>
				<!-- /.card-box -->

				<div class="bg-white card-box border-20 mt-40">
                    <h4 class="dash-title-three">Address & Location</h4>
					<div class="row">
						<div class="col-12">
							<div class="dash-input-wrapper mb-25">
								<label for="">Address*</label>
								<input type="text" placeholder="Cowrasta, Chandana, Gazipur Sadar">
							</div>
							<!-- /.dash-input-wrapper -->
						</div>
						<div class="col-lg-3">
							<div class="dash-input-wrapper mb-25">
								<label for="">Country*</label>
								<select class="nice-select">
									<option>Afghanistan</option>
									<option>Albania</option>
									<option>Algeria</option>
									<option>Andorra</option>
									<option>Angola</option>
									<option>Antigua and Barbuda</option>
									<option>Argentina</option>
									<option>Armenia</option>
									<option>Australia</option>
									<option>Austria</option>
									<option>Azerbaijan</option>
									<option>Bahamas</option>
									<option>Bahrain</option>
									<option>Bangladesh</option>
									<option>Barbados</option>
									<option>Belarus</option>
									<option>Belgium</option>
									<option>Belize</option>
									<option>Benin</option>
									<option>Bhutan</option>
								</select>
							</div>
							<!-- /.dash-input-wrapper -->
						</div>
						<div class="col-lg-3">
							<div class="dash-input-wrapper mb-25">
								<label for="">City*</label>
								<select class="nice-select">
									<option>Dhaka</option>
									<option>Tokyo</option>
									<option>Delhi</option>
									<option>Shanghai</option>
									<option>Mumbai</option>
									<option>Bangalore</option>
								</select>
							</div>
							<!-- /.dash-input-wrapper -->
						</div>
						<div class="col-lg-3">
							<div class="dash-input-wrapper mb-25">
								<label for="">Zip Code*</label>
								<input type="number" placeholder="1708">
							</div>
							<!-- /.dash-input-wrapper -->
						</div>
						<div class="col-lg-3">
							<div class="dash-input-wrapper mb-25">
								<label for="">State*</label>
								<select class="nice-select">
									<option>Dhaka</option>
									<option>Tokyo</option>
									<option>Delhi</option>
									<option>Shanghai</option>
									<option>Mumbai</option>
									<option>Bangalore</option>
								</select>
							</div>
							<!-- /.dash-input-wrapper -->
						</div>
						<div class="col-12">
							<div class="dash-input-wrapper mb-25">
								<label for="">Map Location*</label>
								<div class="position-relative">
									<input type="text" placeholder="XC23+6XC, Moiran, N105">
									<button class="location-pin tran3s"><img src="../images/lazy.svg" data-src="images/icon/icon_16.svg" alt="" class="lazy-img m-auto"></button>
								</div>
								<div class="map-frame mt-30">
									<div class="gmap_canvas h-100 w-100">
										<iframe class="gmap_iframe h-100 w-100" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=dhaka collage&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
									</div>
								</div>
							</div>
							<!-- /.dash-input-wrapper -->
						</div>
					</div>
                </div>
				<!-- /.card-box -->

                <div class="bg-white card-box border-20 mt-40">
                    <h4 class="dash-title-three">Members</h4>

                    <div class="dash-input-wrapper">
						<label for="">Add & Remove Member</label>
					</div>

					<div class="accordion dash-accordion-one" id="accordionOne">
						<div class="accordion-item">
							<div class="accordion-header" id="headingOne">
								  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
									Add Member 1
								  </button>
							</div>
							<div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionOne">
								<div class="accordion-body">
									<div class="row">
										<div class="col-lg-2">
											<div class="dash-input-wrapper mb-30 md-mb-10">
												<label for="">Name*</label>
											</div>
											<!-- /.dash-input-wrapper -->
										</div>
										<div class="col-lg-10">
											<div class="dash-input-wrapper mb-30">
												<input type="text" placeholder="Product Designer (Google)">
											</div>
											<!-- /.dash-input-wrapper -->
										</div>
									</div>
									<div class="row">
										<div class="col-lg-2">
											<div class="dash-input-wrapper mb-30 md-mb-10">
												<label for="">Designation*</label>
											</div>
											<!-- /.dash-input-wrapper -->
										</div>
										<div class="col-lg-10">
											<div class="dash-input-wrapper mb-30">
												<input type="text" placeholder="Account Manager">
											</div>
											<!-- /.dash-input-wrapper -->
										</div>
									</div>
									<div class="row">
										<div class="col-lg-2">
											<div class="dash-input-wrapper mb-30 md-mb-10">
												<label for="">Email*</label>
											</div>
											<!-- /.dash-input-wrapper -->
										</div>
                                        <div class="col-lg-10">
											<div class="dash-input-wrapper mb-30">
												<input type="email" placeholder="newmmwber@gmail.com">
											</div>
											<!-- /.dash-input-wrapper -->
										</div>
									</div>

                                    <div class="d-flex justify-content-end mb-20">
                                        <a href="#" class="dash-btn-one">Remove</a>
                                    </div>
								</div>
							</div>
						</div>
						<div class="accordion-item">
							<div class="accordion-header" id="headingTwo">
								  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									Add Member 2
								  </button>
							</div>
							<div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionOne">
								<div class="accordion-body">
									<div class="row">
										<div class="col-lg-2">
											<div class="dash-input-wrapper mb-30 md-mb-10">
												<label for="">Name*</label>
											</div>
											<!-- /.dash-input-wrapper -->
										</div>
										<div class="col-lg-10">
											<div class="dash-input-wrapper mb-30">
												<input type="text" placeholder="Product Designer (Google)">
											</div>
											<!-- /.dash-input-wrapper -->
										</div>
									</div>
									<div class="row">
										<div class="col-lg-2">
											<div class="dash-input-wrapper mb-30 md-mb-10">
												<label for="">Designation*</label>
											</div>
											<!-- /.dash-input-wrapper -->
										</div>
										<div class="col-lg-10">
											<div class="dash-input-wrapper mb-30">
												<input type="text" placeholder="Account Manager">
											</div>
											<!-- /.dash-input-wrapper -->
										</div>
									</div>
									<div class="row">
										<div class="col-lg-2">
											<div class="dash-input-wrapper mb-30 md-mb-10">
												<label for="">Email*</label>
											</div>
											<!-- /.dash-input-wrapper -->
										</div>
                                        <div class="col-lg-10">
											<div class="dash-input-wrapper mb-30">
												<input type="email" placeholder="newmmwber@gmail.com">
											</div>
											<!-- /.dash-input-wrapper -->
										</div>
									</div>

                                    <div class="d-flex justify-content-end mb-20">
                                        <a href="#" class="dash-btn-one">Remove</a>
                                    </div>
								</div>
							</div>
						</div>
					</div> <!-- /.dash-accordion-one -->
					<a href="#" class="dash-btn-one"><i class="bi bi-plus"></i> Add Another Member</a>
                </div>
				<!-- /.card-box -->

				<div class="button-group d-inline-flex align-items-center mt-30">
					<a href="#" class="dash-btn-two tran3s me-3">Save</a>
					<a href="#" class="dash-cancel-btn tran3s">Cancel</a>
				</div>				
			</div>
		</div>

@endsection




