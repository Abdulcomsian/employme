@extends('employer.layout.main')
@section('title')
Account Settings
@endsection
@section('content')
@push('page-css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<style>
    /* Summernote Additional CSS */
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
</style>
@endpush
<div class="dashboard-body">
    <div class="position-relative">
        <!-- ************************ Header **************************** -->
		 	@include('employer.layout.header_menu')
        <!-- End Header -->

        <h2 class="main-title">Business Operation</h2>

        <div class="bg-white card-box border-20">
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
            <h4 class="dash-title-three">Manage Business Operation</h4>
            <form action="{{route('employer.updateBusinessOperation')}}" method="POST" enctype= "multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="dash-input-wrapper mb-20">
                            <label for="">Curriculum</label>
                            <textarea  name="curriculum" value="" id="summernote" class = " @error('title') is-invalid @enderror" placeholder="Zubayer">{!! $businessOperationDetails->curriculum ?? '' !!}</textarea>
                            @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <!-- /.dash-input-wrapper -->
                    </div>
                </div>
                <div class="row mt-4 mb-2">
                    <div class="col-lg-3">
                        <div class="dash-input-wrapper mb-20">
                            <label for="">Day</label>
                        </div>
                        <!-- /.dash-input-wrapper -->
                    </div>
                    <div class="col-lg-3">
                        <div class="dash-input-wrapper mb-20">
                            <label for="">Start Time</label>
                        </div>
                        <!-- /.dash-input-wrapper -->
                    </div>
                    <div class="col-lg-3">
                        <div class="dash-input-wrapper mb-20">
                            <label for="">End Time</label>
                        </div>
                        <!-- /.dash-input-wrapper -->
                    </div>
                </div>
                @isset($businessOperationDetails->operation_time)
                @foreach($businessOperationDetails->operation_time as $index=>$operationTime)
                @if($index == 0)
                <div class="row" >
                    <div class="col-lg-3">
                        <div class="dash-input-wrapper mb-20">
                            <input type="text" name="operation_time[0][day]" value="{{$operationTime['day']}}" class = " @error('monday_start_time') is-invalid @enderror" placeholder="Day">
                        </div>
                        <!-- /.dash-input-wrapper -->
                    </div>
                    <div class="col-lg-3">
                        <div class="dash-input-wrapper mb-20">
                            <input type="time" name="operation_time[0][start_time]" value="{{$operationTime['start_time']}}" class = " @error('monday_start_time') is-invalid @enderror" placeholder="Day">
                            @error('monday_start_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <!-- /.dash-input-wrapper -->
                    </div>
                    <div class="col-lg-3">
                        <div class="dash-input-wrapper mb-20">
                            <input type="time" name="operation_time[0][end_time]" value="{{$operationTime['end_time']}}" class = " @error('monday_end_time') is-invalid @enderror" placeholder="Day">
                            @error('monday_end_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <!-- /.dash-input-wrapper -->
                    </div>
                    <div class="col-lg-2">
                        <div class="dash-input-wrapper mb-30">
                            <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @else
                <div class="row" >
                    <div class="col-lg-3">
                        <div class="dash-input-wrapper mb-20">
                            <input type="text" name="operation_time[$index][day]" value="" class = " @error('monday_start_time') is-invalid @enderror" placeholder="Day">
                        </div>
                        <!-- /.dash-input-wrapper -->
                    </div>
                    <div class="col-lg-3">
                        <div class="dash-input-wrapper mb-20">
                            <input type="time" name="operation_time[$index][start_time]" value="{{$businessOperationDetails->monday_start_time ?? ''}}" class = " @error('monday_start_time') is-invalid @enderror" placeholder="Day">
                            @error('monday_start_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <!-- /.dash-input-wrapper -->
                    </div>
                    <div class="col-lg-3">
                        <div class="dash-input-wrapper mb-20">
                            <input type="time" name="operation_time[$index][end_time]" value="{{$businessOperationDetails->monday_end_time ?? ''}}" class = " @error('monday_end_time') is-invalid @enderror" placeholder="Day">
                            @error('monday_end_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <!-- /.dash-input-wrapper -->
                    </div>
                    <div class="col-lg-2">
                        <div class="dash-input-wrapper mb-30">
                            <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                        </div>
                    </div>
                </div>
                @endisset
                    <div id="add-time-field">
                    @isset($businessOperationDetails->operation_time)
                    @foreach($businessOperationDetails->operation_time as $index=>$operationTime)
                    @if($index != 0)
                    <div class="row time-field-row">
                        <div class="col-lg-3">
                            <div class="dash-input-wrapper mb-20">
                                <input type="text" name="operation_time[$index][day]"  placeholder="Day" value = "{{$operationTime['day']}}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="dash-input-wrapper mb-20">
                                <input type="time" name="operation_time[$index][start_time]"  placeholder="Add Skill" value = "{{$operationTime['start_time']}}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="dash-input-wrapper mb-20">
                                <input type="time" name="operation_time[$index][end_time]"  placeholder="Add Skill" value = "{{$operationTime['end_time']}}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="dash-input-wrapper mb-20">
                                <button type="button" class="btn btn-danger remove-tr">Remove</button>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @endisset
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
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<!-- Summernote JS -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
$('#summernote').summernote({
        placeholder: 'Curriculum',
        tabsize: 2,
        height: 200
 });

 var i = 0;
       
       $("#add").click(function(){
      
           ++i;
      
        //    $("#add-skill-field").append('<tr><td><input type="text" name="addmore['+i+'][name]" placeholder="Enter your Name" class="form-control" /></td><td><input type="text" name="addmore['+i+'][qty]" placeholder="Enter your Qty" class="form-control" /></td><td><input type="text" name="addmore['+i+'][price]" placeholder="Enter your Price" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
           $("#add-time-field").append('<div class="row time-field-row"><div class="col-lg-3"><div class="dash-input-wrapper mb-20"><input type="text" name="operation_time['+i+'][day]"  placeholder="Day" value = ""></div></div><div class="col-lg-3"><div class="dash-input-wrapper mb-20"><input type="time" name="operation_time['+i+'][start_time]"  placeholder="Add Skill" value = ""></div></div><div class="col-lg-3"><div class="dash-input-wrapper mb-20"><input type="time" name="operation_time['+i+'][end_time]"  placeholder="Add Skill" value = ""></div></div><div class="col-lg-3"><div class="dash-input-wrapper mb-20"><button type="button" class="btn btn-danger remove-tr">Remove</button></div></div></div>')
       });
      
       $(document).on('click', '.remove-tr', function(){  
            $(this).parents('.time-field-row').remove();
       });
</script>
@endpush
@endsection