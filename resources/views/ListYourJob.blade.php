@extends('employer.layout.main')
@section('title') 
    Employer Job Listing
@endsection

@section('content')
<style>
	.step {
		display: none;
	}

	.active {
		display: block;
		color: rgba(0, 0, 0, 0.7) !important;
	}

	.dashboard-body .stepper {
		display: flex;
		flex-direction: row;
		justify-content: space-between;
		align-items: center;
		width: 100%;
		gap: 1%;
	}

	.dashboard-body #multi-step-form {
		margin-top: 25px;
	}

	.dashboard-body .stepper>.step {
		display: flex;
		flex-direction: column;
		align-items: center;
		text-align: center;
		gap: 1rem;
	}

	.dashboard-body .stepper>.step>.icon>div {
		border: 1px solid rgba(0, 0, 0, 0.5);
		border-radius: 50%;
		padding: 15%;
		width: 30px;
		height: 30px;
	}

	.dashboard-body .stepper>.step.selected>.icon>div {
		background: #31795A;
		color: #fff;
	}

	.dashboard-body .stepper>.step>.icon,
	.dashboard-body .stepper>.step>.text {
		font-size: 13px;
		font-weight: 600;
	}

    
.rating-box {
  position: relative;
  background: #fff;
  padding: 25px 50px 35px;
  border-radius: 25px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.05);
}
.rating-box header {
  font-size: 22px;
  color: #dadada;
  font-weight: 500;
  margin-bottom: 20px;
  text-align: center;
}
.rating-box .stars {
  display: flex;
  align-items: center;
  gap: 25px;
}
.stars i {
  color: #e6e6e6;
  font-size: 35px;
  cursor: pointer;
  transition: color 0.2s ease;
}
.stars i.active {
  color: #ff9c1a !important;
}

@media screen and (min-width: 761px) {
    .adjust_height
    {
        height:45px;
    }
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
   <script src="script.js" defer></script>

<div class="dashboard-body">
<div class="bg-white card-box border-20 section" >
        <div class="stepper">
            <!-- <div id="tag-step-1" class="step selected">
                <div class="icon">
                    <div>1</div>
                </div>
                <div class="text">Pending</div>
            </div> -->
            <div id="tag-step-1" class="step selected">
                <div class="icon">
                    <div>1</div>
                </div>
                <div class="text">Schedule Interview</div>
            </div>
            <div id="tag-step-2" class="step ">
                <div class="icon">
                    <div>2</div>
                </div>
                <div class="text">Conditional Offer</div>
            </div>
            <div id="tag-step-3" class="step">
                <div class="icon">
                    <div>3</div>
                </div>
                <div class="text">Document & Final Offer</div>
            </div>
                            
                            
        </div>

        <!-- <div class="py-4 step active" id="step1">
            <div class="button-group d-inline-flex align-items-center mt-30" style="width:100%;justify-content: flex-end;">
                <button type="button"  class="dash-btn-two tran3s" onclick="nextStep(1)">Next</button>
            </div>
        </div> -->

        <div class="py-4 step active" id="step1">
        <h4 class="dash-title-three">Schedule Interview</h4>
                   <form>
                        <div class="row">
                                            <div class="dash-input-wrapper mb-30 col-md-6">
                                                <label for="">Interview Date:</label>
                                                <input type="datetime-local" name="dateTime" placeholder="Select date and time" requird>

                                            </div>
                                            <div class="dash-input-wrapper mb-30 col-md-6">
                                                <label for="">Comment:</label>
                                                <textarea type="datetime-local" name="dateTime" placeholder="Select date and time" ></textarea>

                                            </div>
                        </div>
                        <div class="button-group d-inline-flex align-items-center mt-30" style="width:100%;justify-content: flex-end;">
                        <!-- <button type="button" id="prevBtn" class="dash-cancel-btn tran3s  me-3" onclick="previousStep(2)">Previous</button> -->
                                <button type="button"  class="dash-btn-two tran3s" onclick="nextStep(1)">Schedule Interview</button>
                        </div>
                </form>
                <div>
                <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr</th>
                                <th>Name</th>
                                <th>Interview Date</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>System Architect</td>
                                <td>10/10/2023 2:05 pm</td>
                                <td><button type="button" class="dash-btn-two tran3s" data-bs-toggle="modal" data-bs-target="#exampleModal">Accepted</button></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Accountant</td>
                                <td>10/10/2023 2:05 pm</td>
                               <td><button type="button" class="dash-btn-two tran3s" data-bs-toggle="modal" data-bs-target="#exampleModal">Pending</button></td>
                            </tr>
                            
                        </tbody>
                </table>
                </div>
        </div>
        <div class="py-4 step" id="step2">
                   <h4 class="dash-title-three">Conditional Offer</h4>
                   <form>
                        <div class="row">
                            <div class="dash-input-wrapper mb-30 col-md-4">
                                <label for="">Compensation Amount:</label>
                                <input type="text" name="Compensation Amount" placeholder="" ></input>

                            </div>
                            <div class="dash-input-wrapper mb-30 col-md-4">
                                <label for="">Work and break hours:</label>
                                <input type="text" name="Work and break hours" placeholder="" ></input>

                            </div>
                            <div class="dash-input-wrapper mb-30 col-md-4">
                                <label for="">Holidays:</label>
                                <input type="text" name="Holidays" placeholder="" ></input>

                            </div>
                            <div class="dash-input-wrapper mb-30 col-md-4">
                                <label for="">Accommodation:</label>
                                <input type="text" name="Accommodation" placeholder="" ></input>

                            </div>
                            <div class="dash-input-wrapper mb-30 col-md-4">
                                <label for="">Flights:</label>
                                <input type="text" name="Flights" placeholder="" ></input>

                            </div>
                            <div class="dash-input-wrapper mb-30 col-md-4">
                                <label for="">Insurance:</label>
                                <input type="text" name="Insurance" placeholder="" ></input>

                            </div>
                            <div class="dash-input-wrapper mb-30 col-md-4">
                                <label for="">Training period:</label>
                                <input type="text" name="Training period " placeholder="" ></input>

                            </div>
                            <div class="dash-input-wrapper mb-30 col-md-4">
								<label for="">Start Date:</label>
								<input type="date" name="startDate" placeholder=""></input>
                            </div>
                            <div class="dash-input-wrapper mb-30 col-md-4">
                                        <label for="">End Date:</label>
                                        <input type="date" name="endDate" placeholder=""></input>
                            </div>
                            <div class="dash-input-wrapper mb-30 col-md-12">
                                <label for="">Additional benefits:</label>
                                <textarea type="text" name="Additional benefits:" placeholder="" ></textarea>

                            </div>
                            <div class="dash-input-wrapper mb-10 col-md-12">
								<label style="font-size: 20px;font-weight: 600;">Conditions:</label>
					        </div>
                            <div class="dash-input-wrapper mb-30 col-md-3">
                                        <label for="" class="adjust_height">Apostille Degree MUST be delivered by:</label>
                                        <input type="date" name="endDate" placeholder=""></input>
                            </div>
                            <div class="dash-input-wrapper mb-30 col-md-3">
                                        <label for="">Apostilled Criminal Clearance MUST be delivered by:</label>
                                        <input type="date" name="endDate" placeholder=""></input>
                            </div>
                            <div class="dash-input-wrapper mb-30 col-md-3">
                                        <label for=""  class="adjust_height">SAQA Letter MUST be delivered by:</label>
                                        <input type="date" name="endDate" placeholder=""></input>
                            </div>
                            <div class="dash-input-wrapper mb-30 col-md-3">
                                        <label for="">Visa Documents and associated items things MUST be delivered by:</label>
                                        <input type="date" name="endDate" placeholder=""></input>
                            </div>
                            

                        </div>
                        <div class="button-group d-inline-flex align-items-center mt-30" style="width:100%;justify-content: flex-end;">
                        <button type="button" id="prevBtn" class="dash-cancel-btn tran3s  me-3" onclick="previousStep(2)">Previous</button>
                                <button type="button"  class="dash-btn-two tran3s" onclick="nextStep(2)">Offer Conditional Job</button>
                        </div>
                </form>
</div>
<div class="py-4 step" id="step3">
        <h4 class="dash-title-three">Document & Final Offer</h4>
                <div>
                <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr</th>
                                <th>Degree</th>
                                <th>Status</th>
                                <th>Deadline</th>
                                <th>Link</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>System Architect</td>
                                <td>Uploaded</td>
                                <td>20/10/2023</td>
                                <td>url</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Accountant</td>
                                <td>Pending</td>
                                <td>20/10/2023</td>
                                <td>url</td>

                            </tr>
                            
                        </tbody>
                </table>
                </div>
                <div class="button-group d-inline-flex align-items-center mt-30" style="width:100%;justify-content: flex-end;">
                        <button type="button" id="prevBtn" class="dash-cancel-btn tran3s  me-3" onclick="previousStep(3)">Previous</button>
                                <button type="button"  class="dash-btn-two tran3s" onclick="nextStep(3)">Submit</button>
                        </div>
        </div>

       
     

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <form>
                <div class="modal-header">
                    <h5 class="modal-title " id="exampleModalLabel" style="font-family:gordita">Rating</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="dash-input-wrapper mb-30 col-md-6">
                                    <label for=""> Status:</label>
                                    <select class="nice-select">
                                        <option>Conducted</option>
                                        <option>Not Conducted</option>
                                        <option>Conducted & Accepted</option>
                                        <option>Conducted & Rejected</option>
                                    </select>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Comment:</label>
                            <textarea type="text" name="Work and break hours" placeholder="Comment" ></textarea>

                        </div>
                        <div class=" d-flex justify-content-center">
                            <div class="stars">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                        <input type="text" name="Rating" hidden value=0 ></input>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="dash-cancel-btn tran3s" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="dash-btn-two tran3s">Save changes</button>
                </div>
                </form>
                </div>
            </div>
        </div>

<script>
	let currentStep = 1;

	function nextStep(step) {
		document.getElementById(`tag-step-${step}`).classList.remove('selected');
        document.getElementById(`step${step}`).classList.remove('active');
		currentStep =step+1;
		document.getElementById(`step${currentStep}`).classList.add('active');
		document.getElementById(`tag-step-${currentStep}`).classList.add('selected');
	}

	function previousStep(step) {
		document.getElementById(`step${step}`).classList.remove('active');
		document.getElementById(`tag-step-${step}`).classList.remove('selected');
		currentStep = step - 1;
		document.getElementById(`step${currentStep}`).classList.add('active');
		document.getElementById(`tag-step-${currentStep}`).classList.add('selected');
	}
</script>

<script>
const stars = document.querySelectorAll(".stars i");


stars.forEach((star, index1) => {
  star.addEventListener("click", () => {
    stars.forEach((star, index2) => {
      index1 >= index2 ? star.classList.add("active") : star.classList.remove("active");
    });
    const rating = document.querySelectorAll(".stars i.active").length;
    const hiddenInput = modal.querySelector('input[name="Rating"]');
    hiddenInput.value = rating;
  });
});


const modal = document.getElementById('exampleModal');
modal.addEventListener('hidden.bs.modal', function () {
    // Clear the select element
    const selectElement = modal.querySelector('select');
    selectElement.selectedIndex = 0; // Set it to the default option

    // Clear the textarea
    const textareaElement = modal.querySelector('textarea');
    textareaElement.value = '';

    const hiddenInput = modal.querySelector('input[name="Rating"]');
    hiddenInput.value = 0;

    // Clear the star ratings (remove the "active" class)
    const stars = modal.querySelectorAll('.stars i');
    stars.forEach(star => star.classList.remove('active'));
  });
    </script>
@endsection