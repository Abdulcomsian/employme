@extends('employer.layout.main')
@section('title')
Account Settings
@endsection
@section('content')
@push('page-css')
<link rel="stylesheet" href="{{asset('assets/css/yearpicker.css')}}" />
@endpush
<div class="dashboard-body">
    <div class="position-relative">
        <!-- ************************ Header **************************** -->
		 	@include('employer.layout.header_menu')
        <!-- End Header -->

        <h2 class="main-title">Staff Management</h2>

        <div class="bg-white card-box border-20">
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
            <h4 class="dash-title-three">Add Staff Member</h4>
            <form action="{{route('staff.store')}}" method="POST" enctype= "multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="dash-input-wrapper mb-20">
                            <label for="">Title</label>
                            <input type="text" name="title" value="" class = " @error('title') is-invalid @enderror" placeholder="Zubayer">
                            @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <!-- /.dash-input-wrapper -->
                    </div>
                   
                    <div class="col-6">
                        <div class="dash-input-wrapper mb-20">
                            <label for="">Year Started</label>
                            <input type="text" name = "year_started" class="yearpicker @error('year_started') is-invalid @enderror" value="{{auth()->user()->email}}">
                                 @error('year_started')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <!-- /.dash-input-wrapper -->
                    </div>
                 
                </div>
                <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Staff Image</label>
                                    <div class="d-flex user-avatar-setting  mb-30">
                                        <div class="upload-btn position-relative tran3s ">
                                            Upload Image
                                            <input type="file" id="uploadImage" class = "@error('staff_image') is-invalid @enderror" name="staff_image" placeholder="" accept="image/jpeg,image/png">
                                            @error('staff_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class = "mx-4"><img id="image-preview" src="#" class="d-none" height = "100" width = "100" alt="Image Preview"></div>

                                    </div>
                                 
                                </div>
                            </div>
                        </div>

                <div class="button-group d-inline-flex align-items-center mt-20 mb-20">
                    <button type="submit" class="dash-btn-two tran3s me-3 rounded-3">Save</button>
                    {{--<a href="#" class="dash-cancel-btn tran3s">Cancel</a>--}}
                </div>
            </form>
         
        </div>
        
        <!-- /.card-box -->
    </div>
</div>
<!-- /.dashboard-body -->
@push('page-script')
<script src="{{asset('assets/js/yearpicker.js')}}"></script>
<script>
$(document).ready(function() {
        $(".yearpicker").yearpicker({
          year: 2017,
          startYear: 1970,
          endYear: 2030
        });
      });

      const imageInput = document.getElementById('uploadImage');
    const imagePreview = document.getElementById('image-preview');

    imageInput.addEventListener('change', function() {
      const file = this.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          imagePreview.src = e.target.result;
          imagePreview.classList.remove('d-none');
        }
        reader.readAsDataURL(file);
      }
      else{
            imagePreview.classList.add('d-none');
        }
    });
</script>
@endpush
@endsection