@extends('employer.layout.main')

@section('title')
Introduction Video
@endsection
@push('page-css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/select2.css')}}" media="all">	
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
<style>
	.step {
		display: none;
	}

	.active {
		display: block;
		color: rgba(0, 0, 0, 0.7) !important;
	}

	.employer-sign-up .stepper {
		display: flex;
		flex-direction: row;
		justify-content: space-between;
		align-items: center;
		width: 100%;
		gap: 1%;
	}

	.employer-sign-up #multi-step-form {
		margin-top: 25px;
	}

	.employer-sign-up .stepper>.step {
		display: flex;
		flex-direction: column;
		align-items: center;
		text-align: center;
		gap: 1rem;
	}

	.employer-sign-up .stepper>.step>.icon>div {
		border: 1px solid #b1b0eb;
		border-radius: 50%;
		padding: 15%;
		width: 30px;
		height: 30px;
	}

	.employer-sign-up .stepper>.step.selected>.icon>div {
		background: #ff715b	;
		color: #fff;
	}

	.employer-sign-up .stepper>.step>.icon,
	.employer-sign-up .stepper>.step>.text {
		font-size: 13px;
		font-weight: 600;
	}

	.note-editable{
   background: #fff;
}
.note-btn.dropdown-toggle:after {
   content: none;
}
.note-btn[aria-label="Help"]{
   display: none;
}

.note-editor .note-toolbar .note-color-all .note-dropdown-menu, .note-popover .popover-content .note-color-all .note-dropdown-menu{
   min-width: 185px;
}
/* Customize Summernote editor */
.note-editor {
/* Your custom styles here */
}

.note-editable {
/* Your custom styles here */
}

/* Toolbar customization */
.note-toolbar {
/* Your custom styles here */
}

/* Buttons customization */
.note-btn {
/* Your custom styles here */
}

.alert-danger {
	width: max-content;
}
.btn-file{
	color: #fff;
    background: #ff715b;
}
.btn-file:hover{
	background: #b1b0eb;
    color: #fff;
}
input[type='checkbox']{
	width: 20px!important;
}

h3{
	font-family: "gordita";
}
.video-post .video-icon {
    width: 65px;
    height: 65px;
    background: #D2F34C;
    color: #000;
    font-size: 45px;
    line-height: 65px;
    padding-left: 7px;
}
</style>

@endpush
@section('content')
<div class="dashboard-body">
	<div class="position-relative">
		 <!-- ************************ Header **************************** -->
		 	@include('employer.layout.header_menu')
        <!-- End Header -->
		
		<h2 class="main-title">Introduction Video</h2>
        @if(auth()->user()->intro)
        <div class="container">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 order-xl-first my-3 mr-1 p-1 padding-box">

                <!-- <div class="inner-card mb-60 lg-mb-50">
					    <h3 class="title">Introduction</h3>
						<div class="video-post d-flex align-items-center justify-content-center mt-25 lg-mt-20 mb-75 lg-mb-50">
							<a class="fancybox rounded-circle video-icon tran3s text-center" data-fancybox="" href="{{asset('uploads/employer/introduction-video/'.auth()->user()->intro->file_path)}}">
								<i class="bi bi-play"></i>
							</a>
						</div>
                    </div> -->

                    <video width="640" height="360" controls>
                        <source src="{{asset('uploads/employer/introduction-video/'.auth()->user()->intro->file_path)}}" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-12 p-3">
                    <form id="update-intro-form" action="{{route('add.introduct.video')}}" method="post" enctype="multipart/form-data">
                        <input type="file" id="file" accept=".mp4,.webm">
                        <strong id="filename"></strong>
                        <button type="submit" class="btn btn-success">@if(auth()->user()->intro) Update @else Upload @endif</button>
                    </form>
                </div>
            </div>
        </div>

	
	

		<!-- <div class="button-group d-inline-flex align-items-center mt-30">
			<a href="#" class="dash-btn-two tran3s me-3">Save</a>
			<a href="#" class="dash-cancel-btn tran3s">Cancel</a>
		</div> -->
	</div>
</div>
@push('page-script')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> -->
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>

<script>
   let fileInput =  document.getElementById("file");
   fileInput.addEventListener("change" , function(e){
    let filename = e.target.files[0].name;
     document.getElementById("filename").innerHTML = "filename";
   })


   document.getElementById("update-intro-form").addEventListener("submit" , function(e){
    e.preventDefault();
    let form = new FormData();
    let file = document.getElementById("file").files[0];
    let url = this.getAttribute('action');
    form.append('file' , file);
    form.append("_token" , "{{csrf_token()}}");
    $.ajax({
        type : 'POST',
        url : url,
        data : form,
        processData: false,
        contentType: false,
        success:function(res){
            if(res.status)
            {
                toastr.success(res.msg);
                location.reload();
            }else{
                toastr.error(res.msg);
                toastr.error(res.error);
            }
        }
    })

   })
</script>

@endpush
@endsection