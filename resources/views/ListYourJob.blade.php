@extends('employer.layout.main')
@section('title') 
    Employer Job Listing
@endsection

@section('content')
<div class="dashboard-body">
<div class="bg-white card-box border-20 section" id="step1">
                   
                   <h4 class="dash-title-three">Schedule Interview</h4>
                   <form>
                        <div class="row">
                                            <div class="dash-input-wrapper mb-30 col-md-6">
                                                <label for="">Start Date:</label>
                                                <input type="datetime-local" name="dateTime" placeholder="Select date and time" requird>

                                            </div>
                                            <div class="dash-input-wrapper mb-30 col-md-6">
                                                <label for="">Comment:</label>
                                                <textarea type="datetime-local" name="dateTime" placeholder="Select date and time" ></textarea>

                                            </div>
                        </div>
                        <div class="button-group d-inline-flex align-items-center mt-30" style="width:100%;justify-content: flex-end;">
                                <button type="submit"  class="dash-btn-two tran3s">Submit</button>
                        </div>
                </form>
                <div>
                <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                            </tr>
                            <tr>
                                <td>Garrett Winters</td>
                                <td>Accountant</td>
                            </tr>
                            
                        </tbody>
                </table>
                </div>
</div>
<div class="bg-white card-box border-20 section" id="step1">
                   
                   <h4 class="dash-title-three">Conditional Offer</h4>
                   <form>
                        <div class="row">
                            <div class="dash-input-wrapper mb-30 col-md-6">
                                <label for="">Compensation Amount:</label>
                                <input type="text" name="Compensation Amount" placeholder="" ></input>

                            </div>
                            <div class="dash-input-wrapper mb-30 col-md-6">
                                <label for="">Work and break hours:</label>
                                <input type="text" name="Work and break hours" placeholder="" ></input>

                            </div>
                            <div class="dash-input-wrapper mb-30 col-md-6">
                                <label for="">Holidays:</label>
                                <input type="text" name="Holidays" placeholder="" ></input>

                            </div>
                            <div class="dash-input-wrapper mb-30 col-md-6">
                                <label for="">Accommodation:</label>
                                <input type="text" name="Accommodation" placeholder="" ></input>

                            </div>
                            <div class="dash-input-wrapper mb-30 col-md-6">
                                <label for="">Flights:</label>
                                <input type="text" name="Flights" placeholder="" ></input>

                            </div>
                            <div class="dash-input-wrapper mb-30 col-md-6">
                                <label for="">Insurance:</label>
                                <input type="text" name="Insurance" placeholder="" ></input>

                            </div>
                            <div class="dash-input-wrapper mb-30 col-md-6">
                                <label for="">Training period:</label>
                                <input type="text" name="Training period " placeholder="" ></input>

                            </div>
                            <div class="dash-input-wrapper mb-30 col-md-6">
								<label for="">Start Date:</label>
								<input type="date" name="startDate" placeholder=""></input>
                            </div>
                            <div class="dash-input-wrapper mb-30 col-md-6">
                                        <label for="">End Date:</label>
                                        <input type="date" name="endDate" placeholder=""></input>
                            </div>
                            <div class="dash-input-wrapper mb-30 col-md-6">
                                <label for="">Additional benefits:</label>
                                <textarea type="text" name="Additional benefits:" placeholder="" ></textarea>

                            </div>
                            

                        </div>
                        <div class="button-group d-inline-flex align-items-center mt-30" style="width:100%;justify-content: flex-end;">
                                <button type="submit"  class="dash-btn-two tran3s">Submit</button>
                        </div>
                </form>
</div>
@endsection