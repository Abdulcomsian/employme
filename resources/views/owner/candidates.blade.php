@extends('owner.layout.main')
@section('title')
Candidates
@endsection
@push('page-css')
<style>
 .candidate-name  {
    color: #00BF58 !important;
    
 }
 .candidate-name a:hover{
    color: #D2F34C !important;
    
    /* color: #244034; */
 }
.active {
    /* background-color: #04AA6D; */
    color: black !important;
}


.table-responsive {
        overflow-y: auto; 
        height: 800px; 
      }
      .table-responsive thead th {
        position: sticky;
        top: 0px; 
      }
      table {
        border-collapse: collapse;
        width: 100%;
      }
      th,
      td {
        padding: 8px 16px;
        border: 1px solid #ccc;
      }
      th {
        background: #eee;
      }

      .document-verification-dropdown{
        background: #ff715b;
        color: white;
      }


      select.form-select.certificate-status {
        width: 130px;
    }

    p.certificate-title {
    width: 230px;
}

h4 {
    font-family: "gordita";
}

h2#swal2-title {
    font-family: "gordita";
    font-weight: 500;
}

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endpush
@section('content')
<div class="modal" id="confirmation-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <input type="hidden" name="user_id" value="" id="candidate_eligible_id">
        <p class="text-center"><b>Are you sure you want to close this account.</b></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger update-user-eligibility">Save changes <i class="fas fa-circle-notch mx-2 fa-spin d-none progress"></i></button>
        <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="dashboard-body">
    <div class="position-relative">
        <!-- ************************ Header **************************** -->
        <!-- <header class="dashboard-header">
            <div class="d-flex align-items-center justify-content-end">
                <button class="dash-mobile-nav-toggler d-block d-md-none me-auto">
                    <span></span>
                </button>
                <form action="#" class="search-form">
                    <input type="text" placeholder="Search here..">
                    <button><img src="{{ asset('assets/images/lazy.svg') }}" data-src="{{ asset('assets/images/dashboard-icon/icon_10.svg') }}" alt="" class="lazy-img m-auto"></button>
                </form>
                <div class="profile-notification ms-2 ms-md-5 me-4">
                    <button class="noti-btn dropdown-toggle" type="button" id="notification-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                        <img src="{{ asset('assets/images/lazy.svg') }}" data-src="{{ asset('assets/images/icon/icon_11.svg') }}" alt="" class="lazy-img">
                        <div class="badge-pill"></div>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="notification-dropdown">
                        <li>
                            <h4>Notification</h4>
                            <ul class="style-none notify-list">
                                <li class="d-flex align-items-center unread">
                                    <img src="{{ asset('assets/images/lazy.svg') }}" data-src="{{ asset('assets/images/icon/icon_36.svg') }}" alt="" class="lazy-img icon">
                                    <div class="flex-fill ps-2">
                                        <h6>You have 3 new mails</h6>
                                        <span class="time">3 hours ago</span>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <img src="{{ asset('assets/images/lazy.svg') }}" data-src="{{ asset('assets/images/icon/icon_37.svg') }}" alt="" class="lazy-img icon">
                                    <div class="flex-fill ps-2">
                                        <h6>Your job post has been approved</h6>
                                        <span class="time">1 day ago</span>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center unread">
                                    <img src="{{ asset('assets/images/lazy.svg') }}" data-src="{{ asset('assets/images/icon/icon_38.svg') }}" alt="" class="lazy-img icon">
                                    <div class="flex-fill ps-2">
                                        <h6>Your meeting is cancelled</h6>
                                        <span class="time">3 days ago</span>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div><a href="{{ route('postAJob') }}" class="job-post-btn tran3s">Post a Job</a></div>
            </div>
        </header> -->

        <div class="d-sm-flex align-items-center justify-content-between mb-40 lg-mb-30">
            <h2 class="main-title m0">Candidates</h2>
          
        </div>

        <div class="bg-white card-box border-20">
            <div class="table-responsive">
                
                <table class="table job-alert-table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Verification Status</th>
                            <th scope="col">Verify Documents</th>
                        </tr>
                    </thead>
                    <tbody class="border-0">
                    @isset($candidates)
                    @foreach($candidates as $index => $candidate)
                        <tr class="active">
                            <td>{{$index+1}}</td>
                            <td>
                                <div class="job-name candidate-name" ><a href="{{route('candidateProfileNew', \Crypt::encryptString($candidate->id))}}">{{$candidate->candidatePersonalDetails->first_name ?? ''}} {{$candidate->candidatePersonalDetails->middle_name ?? ''}} {{$candidate->candidatePersonalDetails->last_name ?? ''}}</a></div>
                                <!-- <div class="info1">Fulltime . Spain</div> -->
                            </td>
                            <td >{{$candidate->email}}</td>
                            @if($candidate->email_verified_at)
                            <td>
                                <div class="job-status"  >Verified</div>
                            </td>
                            @else
                            <td>
                                <div class="job-status"  >Unverified</div>
                            </td>
                            @endif
                            <td>
                            <div class="btn-group">
                                <button type="button" class="btn document-verification-dropdown dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Documents
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="d-flex justify-content-between px-2 my-1">
                                        <p class="certificate-title" >Degree</p>
                                        @if($candidate->degree)
                                            <a href="{{asset($candidate->degree->url)}}" target='_blank'><i class="fa-regular fa-file mx-3"></i></a>
                                        @endif
                                        <select class="form-select certificate-status" data-candidate-id="{{$candidate->id}}" data-certificate-type="{{AppConst::DEGREE}}" name="candidate-degree" id="" @if(!$candidate->degree) disabled @endif>
                                            <option value="pending" @if($candidate->degree && $candidate->degree->status == 'pending' ) selected @endif>Pending</option>
                                            <option value="verified" @if($candidate->degree && $candidate->degree->status == 'verified' ) selected @endif>Verified</option>
                                            <option value="rejected" @if($candidate->degree && $candidate->degree->status == 'rejected' ) selected @endif>Rejected</option>
                                            <option value="ineligible" @if($candidate->degree && $candidate->degree->status == 'ineligible' ) selected @endif>Ineligible</option>
                                        </select>
                                    </li>
                                    <li class="d-flex justify-content-between px-2 my-1">
                                        <p class="certificate-title"  >Police Certificate</p>
                                        @if($candidate->policeCertificate)
                                            <a href="{{asset($candidate->policeCertificate->url)}}" target='_blank'><i class="fa-regular fa-file mx-3"></i></a>
                                        @endif
                                        <select class="form-select certificate-status" data-candidate-id="{{$candidate->id}}" data-certificate-type="{{AppConst::POLICE_CERTIFICATE}}" name="police-certificate" id="" @if(!$candidate->policeCertificate) disabled @endif>
                                            <option value="pending" @if($candidate->policeCertificate && $candidate->policeCertificate->status == 'pending' ) selected @endif>Pending</option>
                                            <option value="verified" @if($candidate->policeCertificate && $candidate->policeCertificate->status == 'verified' ) selected @endif>Verified</option>
                                            <option value="rejected" @if($candidate->policeCertificate && $candidate->policeCertificate->status == 'rejected' ) selected @endif>Rejected</option>
                                            <option value="ineligible" @if($candidate->policeCertificate && $candidate->policeCertificate->status == 'ineligible' ) selected @endif>Ineligible</option>
                                        </select>
                                    </li>
                                    <li class="d-flex justify-content-between px-2 my-1">
                                        <p class="certificate-title"  >Passport</p>

                                        @if($candidate->passport)
                                            <a href="{{asset($candidate->passport->url)}}" target='_blank'><i class="fa-regular fa-file mx-3"></i></a>
                                        @endif
                                        <select class="form-select certificate-status" data-candidate-id="{{$candidate->id}}" name="police-certificate" data-certificate-type="{{AppConst::PASSPORT}}" id="" @if(!$candidate->passport) disabled @endif>
                                            <option value="pending" @if($candidate->passport && $candidate->passport->status == 'pending' ) selected  @endif>Pending</option>
                                            <option value="verified" @if($candidate->passport && $candidate->passport->status == 'verified' ) selected  @endif>Verified</option>
                                            <option value="rejected" @if($candidate->passport && $candidate->passport->status == 'rejected' ) selected  @endif>Rejected</option>
                                            <option value="ineligible" @if($candidate->passport && $candidate->passport->status == 'ineligible' )  selected @endif>Ineligible</option>
                                        </select>
                                    </li>                      
                                    <li class="d-flex justify-content-between px-2 my-1">
                                        <p class="certificate-title" >Apostilled Degree Copy</p>
                                        @if($candidate->degreeApostilled)
                                            <a href="{{asset($candidate->degreeApostilled->url)}}" target='_blank'><i class="fa-regular fa-file mx-3"></i></a>
                                        @endif
                                        <select class="form-select certificate-status" data-candidate-id="{{$candidate->id}}" name="police-certificate" data-certificate-type="{{AppConst::DEGREE_APOSTILED}}" id="" @if(!$candidate->degreeApostilled) disabled @endif>
                                            <option value="pending" @if($candidate->degreeApostilled && $candidate->degreeApostilled->status == 'pending' ) selected  @endif>Pending</option>
                                            <option value="verified" @if($candidate->degreeApostilled && $candidate->degreeApostilled->status == 'verified' ) selected  @endif>Verified</option>
                                            <option value="rejected" @if($candidate->degreeApostilled && $candidate->degreeApostilled->status == 'rejected' ) selected  @endif>Rejected</option>
                                            <option value="ineligible" @if($candidate->degreeApostilled && $candidate->degreeApostilled->status == 'ineligible' ) selected  @endif>Ineligible</option>
                                        </select>
                
                                    </li>
                                    <li class="d-flex justify-content-between px-2 my-1">
                                        <p class="certificate-title" >Apostilled Certificate Copy</p>
                                        @if($candidate->policeApostilled)
                                            <a href="{{asset($candidate->policeApostilled->url)}}" target='_blank'><i class="fa-regular fa-file mx-3"></i></a>
                                        @endif
                                        <select class="form-select certificate-status" data-candidate-id="{{$candidate->id}}" name="police-certificate" data-certificate-type="{{AppConst::POLICE_APOSTILLED}}" id="" @if(!$candidate->policeApostilled) disabled @endif>
                                            <option value="pending" @if($candidate->policeApostilled && $candidate->policeApostilled->status == 'pending' ) selected  @endif>Pending</option>
                                            <option value="verified" @if($candidate->policeApostilled && $candidate->policeApostilled->status == 'verified' ) selected  @endif>Verified</option>
                                            <option value="rejected" @if($candidate->policeApostilled && $candidate->policeApostilled->status == 'rejected' ) selected  @endif>Rejected</option>
                                            <option value="ineligible" @if($candidate->policeApostilled && $candidate->policeApostilled->status == 'ineligible' ) selected  @endif>Ineligible</option>
                                        </select>
                                    </li>
                                    <li class="d-flex justify-content-between px-2 my-1">
                                        <p class="certificate-title" >SAQA Letter</p>
                                        @if($candidate->saqaLetter)
                                            <a href="{{asset($candidate->saqaLetter->url)}}" target='_blank'><i class="fa-regular fa-file mx-3"></i></a>
                                        @endif
                                        <select class="form-select certificate-status" data-candidate-id="{{$candidate->id}}" name="police-certificate" data-certificate-type="{{AppConst::SAQA_LETTER}}" id="" @if(!$candidate->saqaLetter) disabled @endif>
                                            <option value="pending" @if($candidate->saqaLetter && $candidate->saqaLetter->status == 'pending' ) selected  @endif>Pending</option>
                                            <option value="verified" @if($candidate->saqaLetter && $candidate->saqaLetter->status == 'verified' )  selected @endif>Verified</option>
                                            <option value="rejected" @if($candidate->saqaLetter && $candidate->saqaLetter->status == 'rejected' )  selected @endif>Rejected</option>
                                            <option value="ineligible" @if($candidate->saqaLetter && $candidate->saqaLetter->status == 'ineligible' )  selected @endif>Ineligible</option>
                                        </select>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li class="d-flex justify-content-between px-2"><strong>Ineligible</strong><div class="form-check form-switch"><input class="form-check-input ineligible" type="checkbox" role="switch" data-candidate-id="{{$candidate->id}}"></div></li>
                                </ul>
                            </div>

                            </td>
                            {{--<td>
                                <div class="action-dots float-end">
                                    <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="{{route('candidateProfileNew', \Crypt::encryptString($candidate->id))}}"><img src="../images/lazy.svg" data-src="images/icon/icon_18.svg" alt="" class="lazy-img"> View</a></li>
                                        <li><a class="dropdown-item" href="#"><img src="../images/lazy.svg" data-src="images/icon/icon_19.svg" alt="" class="lazy-img"> Share</a></li>
                                        <li><a class="dropdown-item" href="#"><img src="../images/lazy.svg" data-src="images/icon/icon_20.svg" alt="" class="lazy-img"> Edit</a></li>
                                        <li><a class="dropdown-item" href="#"><img src="../images/lazy.svg" data-src="images/icon/icon_21.svg" alt="" class="lazy-img"> Delete</a></li>
                                    </ul>
                                </div>
                            </td>--}}
                        </tr>
                        @endforeach
                        @endisset
                    </tbody>
                </table>
                <!-- /.table job-alert-table -->
            </div>
        </div>
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
        {{ $candidates->links('vendor.pagination.custom-pagination-2') }}

    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $(document).on("change" , ".certificate-status" , function(e){
        let certificateType = this.dataset.certificateType;
        let candidateId = this.dataset.candidateId;
        let status = this.value;
        $.ajax({
            type : "post",
            url : "{{route('changeCertificateStatus')}}",
            data : {
                certificateType : certificateType,
                candidateId : candidateId,
                status : status,
                _token : "{{csrf_token()}}",
            },
            success:function(res){
                if(res.status){
                    toastr.success(res.msg)
                }else{
                    toastr.error(res.error)
                }
            }
        })
    })

    $(document).on("click" , ".update-user-eligibility" ,function(e){
        document.querySelector(".progress").classList.remove("d-none")
        let candidateId = document.getElementById("candidate_eligible_id").value;
        let status = 0;
        $.ajax({
            type : "post",
            url : "{{route('updateCandidateEligibily')}}",
            data : {
                candidateId : candidateId,
                status : status,
                _token : "{{csrf_token()}}",
            },
            success:function(res){
                if(res.status){
                    toastr.success(res.msg)
                    location.reload();
                }else{
                    toastr.error(res.error)
                }
            }
        })
    })

    $(document).on("click" , ".close-modal" , function(e){
        $("#confirmation-modal").modal("hide");
    })

    $(document).on("change" , ".ineligible" , function(e){
        let candidateId = this.dataset.candidateId;
        document.getElementById("candidate_eligible_id").value = candidateId;
        $("#confirmation-modal").modal("show");
    })
</script>
@endsection