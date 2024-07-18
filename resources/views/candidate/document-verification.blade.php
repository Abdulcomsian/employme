@extends('candidate.layout.main')

@section('title')
File verification
@endsection
@push('page-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .step {
        display: none;
    }

    .active {
        display: block;
        color: rgba(0, 0, 0, 0.7) !important;
    }

    .stepper {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }

    .candidate-sign-up #multi-step-form {
        margin-top: 25px;
    }

    .candidate-sign-up .stepper>.step {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 1rem;
    }

    .candidate-sign-up .stepper>.step>.icon>div {
        border: 1px solid rgba(0, 0, 0, 0.5);
        border-radius: 50%;
        padding: 15%;
        width: 30px;
        height: 30px;
    }

    .candidate-sign-up .stepper>.step.selected>.icon>div {
        background: #31795A;
        color: #fff;
    }

    .candidate-sign-up .stepper>.step>.icon,
    .candidate-sign-up .stepper>.step>.text {
        /* white-space: nowrap; */
        font-size: 13px;
        font-weight: 600;
    }

    .select2-container {
        width: 100% !important;
        border: 1px solid #E5E5E5!important;
        height: 54px;
        border-radius : 5px!important;
    }

    .select2-container--default .select2-selection--multiple{
        border: none!important;
        height: 100%;
        overflow-y: scroll;
    }
    .alert-danger {
        width: content-fit;
    }
    .card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: none;
    border-radius: .25rem;
}

    p.docname {
        width: 400px;
        text-align: left;
    }
    .upload-btn{
        position: relative;
    }

    p.docname.text-dark {
    position: absolute;
    top: 40px;
}

    h4{
        font-family: 'gordita';
    }
    .btn-file{
	color: #fff;
    background: #ff715b;
}
.btn-file:hover{
	background: #b1b0eb;
    color: #fff;
}

.h1, h1, .h2, h2, .h3, h3, .h4, h4, .h5, h5, .h6, h6 {
    font-family: 'gordita';
}

button.dash-btn-one:disabled {
  background: #dddddd;
}

</style>
@endpush
@section('content')
<div class="dashboard-body">
    <div class="position-relative">
        <!-- ************************ Header **************************** -->
			@include('candidate.layout.header_menu')
         <!-- End Header -->

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card p-4">
                        <div>
                            <h4>Disclaimer for E2 Visa Document Verification</h4>
                            <p>By uploading, you authorize "Employme" to verify your documents. They will not be shared with third parties and will only be used for E2 visa eligibility verification.</p>
                            <div class="my-3">
                                <p class="p-0 m-0"><strong>Verified: </strong>Documents are eligible for visa application.</p>
                                <p class="p-0 m-0"><strong>Rejected: </strong>Issues found (e.g., expired criminal record, invalid apostille).</p>
                                <p class="p-0 m-0"><strong>Pending: </strong>Under review by our verification team.</p>
                                <p class="p-0 m-0"><strong>Ineligible: </strong>Do not meet E2 visa requirements.</p>
                            </div>
                            <p>Verification does not guarantee a visa but increases your chances. Immigration may require additional documents.</p>
                        </div>
                        <form id = "upload-documents-form" enctype = "multipart/form-data">
                            <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">File</th>
                                <th scope="col">Verification Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                        <td><div class="d-flex flex-column"><h5>Degree</h5><small>Bachelors or higher</small></div></td>
                                        <td><div class="d-flex flex-column"><input  class="form-control" type="file" name="degree" id="degree" accept="image/jpeg,image/png,.docx,.doc,.txt,.pdf">@if($candidateDocumentDetail->degree) <small><a href="{{url($candidateDocumentDetail->degree->url)}}" target="_blank">view: degree</a></small>@endif</div></td>
                                        <td class="ms-3">@if($candidateDocumentDetail->degree) {{ucfirst($candidateDocumentDetail->degree->status)}} @else Pending @endif</td>
                                </tr>
        
                                <tr>
                                    <th scope="row">2</th>
                                        <td><div class="d-flex flex-column"><h5>Criminal Record</h5><small>Issued within the last 6 months</small></div></td>
                                        <td><div class="d-flex flex-column"><input  class="form-control" type="file" name="police_certificate" id="police_certificate" accept="image/jpeg,image/png,.docx,.doc,.txt,.pdf">@if($candidateDocumentDetail->policeCertificate) <small><a href="{{url($candidateDocumentDetail->policeCertificate->url)}}" target="_blank">view: police-certificate</a></small>@endif</div></td>
                                        <td class="ms-3">@if($candidateDocumentDetail->policeCertificate) {{ucfirst($candidateDocumentDetail->policeCertificate->status)}} @else Pending @endif</td>
                                </tr>
        
                                <tr>
                                    <th scope="row">3</th>
                                        <td><div class="d-flex flex-column"><h5>Passport</h5><small>7 English-speaking countries (or F visa)</small></div></td>
                                        <td><div class="d-flex flex-column"><input  class="form-control" type="file" name="passport" id="passport" accept="image/jpeg,image/png,.docx,.doc,.txt,.pdf"> @if($candidateDocumentDetail->passport) <small><a href="{{url($candidateDocumentDetail->passport->url)}}" target="_blank">view: passport</a></small>@endif</div></td>
                                        <td class="ms-3">@if($candidateDocumentDetail->passport) {{ucfirst($candidateDocumentDetail->passport->status)}} @else Pending @endif</td>
                                </tr>
        
                                <tr>
                                    <th scope="row">4</th>
                                        <td><div class="d-flex flex-column"><h5>Apostille Degree Copy</h5><small>Required at the visa application stage</small></div></td>
                                        <td><div class="d-flex flex-column"><input  class="form-control" type="file" name="degree_apostille" id="degree_apostille" accept="image/jpeg,image/png,.docx,.doc,.txt,.pdf"> @if($candidateDocumentDetail->degreeApostilled) <small><a href="{{url($candidateDocumentDetail->degreeApostilled->url)}}" target="_blank">view: apostille-degree</a></small>@endif</div></td>
                                        <td class="ms-3">@if($candidateDocumentDetail->degreeApostilled) {{ucfirst($candidateDocumentDetail->degreeApostilled->status)}} @else Pending @endif</td>
                                </tr>
        
                                <tr>
                                    <th scope="row">5</th>
                                        <td><div class="d-flex flex-column"><h5>Apostille Criminal Record</h5><small>Required at the visa application stage</small></div></td>
                                        <td><div class="d-flex flex-column"><input  class="form-control" type="file" name="police_apostille" id="police_apostille" accept="image/jpeg,image/png,.docx,.doc,.txt,.pdf">@if($candidateDocumentDetail->policeApostilled) <small><a href="{{url($candidateDocumentDetail->policeApostilled->url)}}" target="_blank">view: apostille-police</a></small>@endif</div></td>
                                        <td class="ms-3">@if($candidateDocumentDetail->policeApostilled) {{ucfirst($candidateDocumentDetail->policeApostilled->status)}} @else Pending @endif</td>
                                </tr>
        
                                <tr>
                                    <th scope="row">6</th>
                                        <td><div class="d-flex flex-column"><h5>SAQA Letter</h5><small>South African graduates only</small></div></td>
                                        <td><div class="d-flex flex-column"><input  class="form-control" type="file" name="saqa_letter" id="saqa_letter" accept="image/jpeg,image/png,.docx,.doc,.txt,.pdf">@if($candidateDocumentDetail->saqaLetter) <small><a href="{{url($candidateDocumentDetail->saqaLetter->url)}}" target="_blank">view: saqa-letter</a></small>@endif</div></td>
                                        <td class="ms-3">@if($candidateDocumentDetail->saqaLetter) {{ucfirst($candidateDocumentDetail->saqaLetter->status)}} @else Pending @endif</td>
                                </tr>
                            </table>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                            <p><strong>What Happens After Verification and Singing a Contract</strong></p>
                                            <p><strong>Mail Documents </strong>After signing a contract, send the physical verified documents to your school. They will apply for your visa and give you an approval number. Use this number to finalize your visa at your nearest Korean Embassy. This process can take a minimum of one month or more.</p>
                                    </div>
                                    <div class="col-12">
                                            <input type="checkbox" name="terms_and_conditions" id="preferences_terms_and_conditions" @if($candidatePreferencesDetails->terms_and_conditions) checked @endif>
                                            <label for="preferences_terms_and_conditions"><strong>Terms And Conditions</strong></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="dash-btn-one" id="teaching-video-details"  @if(!$candidatePreferencesDetails->terms_and_conditions) disabled @endif>Submit <i class="fas fa-circle-notch mx-2 fa-spin d-none candidate-teaching-video-progress"></i></button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
    </div>
</div>
@push('page-script')
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $(document).on("change" , 'input[name="terms_and_conditions"]' , function(e){
        this.checked == true ? document.querySelector(".dash-btn-one").removeAttribute('disabled') : document.querySelector(".dash-btn-one").setAttribute('disabled' , true); 
    })


    $("#upload-documents-form").on("submit", function(e) {
        e.preventDefault();
        document.querySelector(".candidate-teaching-video-progress").classList.remove("d-none")
        $("#teaching-video-details").attr('disabled',true);
        var formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        if(document.getElementById("degree").files.length > 0){
            formData.append("degree", document.getElementById("degree").files[0]);
        }

        if(document.getElementById("police_certificate").files.length > 0){
            formData.append("police_certificate", document.getElementById("police_certificate").files[0]);
        }

        if(document.getElementById("degree_apostille").files.length > 0){
            formData.append("degree_apostille", document.getElementById("degree_apostille").files[0]);
        }

        if(document.getElementById("police_apostille").files.length > 0){
            formData.append("certificate_apostille", document.getElementById("police_apostille").files[0]);
        }


        if(document.getElementById("saqa_letter").files.length > 0){
            formData.append("saqa_letter", document.getElementById("saqa_letter").files[0]);
        }

        if(document.getElementById("passport").files.length > 0){
            formData.append("passport", document.getElementById("passport").files[0]);
        }

        formData.append('terms_and_conditions' , document.getElementById("preferences_terms_and_conditions").checked == true ? 1 : 0);

          $.ajax({
            type: "POST",
              url: "{{route('candidate.profile-6.save')}}",
              data: formData,
              dataType: 'json',
              contentType: false,
              processData: false,
              success: function (data) {
    
                if (data.status) {
                    
                    // toastr.success(data.message)
                    location.reload();
                }else{
                    $(".alert").remove();
                    if (data.errors){
                        $.each(data.errors, function (key, val) {
                            toastr.error(val);                    
                    });
                    }
                  
                }
              },
            complete:function(){
                document.querySelector(".candidate-teaching-video-progress").classList.add("d-none")
                $("#teaching-video-details").attr('disabled',false);
              }
          });
  
          return false;
      });
</script>
@endpush
@endsection