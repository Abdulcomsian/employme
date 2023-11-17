@extends('owner.layout.main')
@section('title')
Modules
@endsection
@push('page-css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}" media="all">	
@endpush
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
        </header>

        <div class="d-sm-flex align-items-center justify-content-between mb-40 lg-mb-30">
            <h2 class="main-title m0">{{$moduleDetails->name}}</h2>
            <div class="d-flex ms-auto xs-mt-30">
                <div class="nav nav-tabs tab-filter-btn me-4" id="nav-tab" role="tablist">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#a1" type="button" role="tab" aria-selected="true">All</button>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#a2" type="button" role="tab" aria-selected="false">New</button>
                </div>
                <div class="short-filter d-flex align-items-center ms-auto">
                    <div class="text-dark fw-500 me-2">Short by:</div>
                    <select class="nice-select">
                        <option value="0">Verified</option>
                        <option value="1">Unverified</option>
                        <option value="2">Active</option>
                        <option value="2">Disabled</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="bg-white card-box border-20">
        <a href="#" class="dash-btn-one Add-Module-Button m-2" type="button" data-bs-toggle="modal" data-bs-target="#Add-Module-Modal"><i class="bi bi-plus"></i>  {{$moduleDetails->name}}</a>

            <div class="table-responsive">
                <table class="table job-alert-table" id = "modules-table">
                    <thead>
                        <tr>
                            <th scope="col" style="text-align:left">#</th>
                            <th scope="col" style="text-align:left">Name</th>
                            <th scope="col" style="text-align:left">Action</th>
                        </tr>
                    </thead>
                    <tbody class="border-0">
                      
                    </tbody>
                </table>
            </div>
        </div>
     
    </div>
</div>
<div class="modal fade" id="Add-Module-Modal" tabindex="-1" role="dialog" aria-labelledby="Edit User"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="User-Edit-Modal">Add {{$moduleDetails->name}}</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id='Add-Module-Item-Form' method="POST" class="clearfix" enctype="multipart/form-data">
                    <div class="md-form mb-1" id="edit-alert-error" style="display: none;">
                        <div class="alert alert-dismissable alert-danger shadow-danger">
                            <ul class="list" id="edit-error-message">
                            </ul>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="Major Name">{{__('Name')}}</label>
                        <input class="form-control" type="text" value="" name="name" id="name"
                            placeholder="{{__('Name')}}" autocomplete="off">
                    </div>
                    <input type="hidden" name="module_id" id="module_id" value="{{$moduleDetails->id}}">

            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i>
                </button>
                <button class="btn btn-primary" type="submit" name="submit">
                    <i class="bi bi-save"></i></button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="Edit-Module-Item-Modal" tabindex="-1" role="dialog" aria-labelledby="Edit User"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="User-Edit-Modal">Edit {{$moduleDetails->name}}</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id='Edit-Module-Item-Form' method="PUT" class="clearfix" enctype="multipart/form-data">
                    <div class="md-form mb-1" id="edit-alert-error" style="display: none;">
                        <div class="alert alert-dismissable alert-danger shadow-danger">
                            <ul class="list" id="edit-error-message">
                            </ul>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="Major Name">{{__('Name')}}</label>
                        <input class="form-control" type="text" value="" name="name" id="name"
                            placeholder="{{__('Name')}}" autocomplete="off">
                    </div>
                
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="module_id" id="module_id" value="{{$moduleDetails->id}}">
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i>
                </button>
                <button class="btn btn-primary" type="submit" name="submit">
                    <i class="bi bi-save"></i></button>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">

    $(document).ready(function() {
        var table = $('#modules-table').DataTable({
            "ajax": {
            url: "{{route('modules.module-items.index',['module'=>$moduleDetails->id])}}",
            type: 'GET',
            },
            "columns": [{
            "data": "id" , "width":"30%"
            },
            {
            "data": "name" , "width":"30%"
            },
            {
            "data": "Options" , "width":"40%"
            }
            ]
        
        });

        $(document).on('click', 'button.Add-Module-Button', function() {
            $('#Add-Module-Item-Form').trigger('reset');
            $('#Add-Module-Item-Form').find($('#error-message')).empty();
            $('#Add-Module-Item-Form').find($('#alert-error')).css('display', 'none');  
        });

        $('#Add-Module-Item-Form').on('submit', function(e) {
            e.preventDefault();
            $('#Add-Module-Item-Form').find($('#error-message')).empty();
            $('#Add-Module-Item-Form').find($('#alert-error')).css('display', 'none');
            var url = "{{route('modules.module-items.index',['module'=>$moduleDetails->id])}}";
            $.ajax({
            type: 'POST',
            url: url,
            data: $(this).serialize(),
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            success: function(res) {
            if (res.status == 'success') {
            $('#Add-Module-Modal').modal('hide');
            swal("{{__('Alert')}}", res.msg, "success");
            table.ajax.url("{{route('modules.module-items.index',['module'=>$moduleDetails->id])}}").load().draw();
            } else {
            }
            },
            error: function(res) {
            if (res.responseText) {
            $('#Add-Module-Item-Form').find($('#alert-error')).css('display', 'block');
            var errors = JSON.parse(res.responseText).errors;
            var errors = Object.values(errors)
            for (let index = 0; index < errors.length; index++) { var html='<li><span>' + errors[index][0] + '</span></li>' ;
                $('#Add-Module-Item-Form').find($('#error-message')).append(html); } $('#alert-error').css('display', 'block' );
                } else { } } }); return false; 
        });
       
        $(document).on('click', 'button.Edit-Module-Item-Button', function() {
            $('#Edit-Module-Item-Form').find($('#edit-error-message')).empty();
            $('#Edit-Module-Item-Form').find($('#edit-alert-error')).css('display', 'none');
            var data = table.row($(this).closest('tr')).data();
            $('#Edit-Module-Item-Form').trigger("reset");
            $('#Edit-Module-Item-Form').find('[name="name"]').val(data.name);
            $('#Edit-Module-Item-Form').find('[name="id"]').val(data.id);
        });

        $('#Edit-Module-Item-Form').on('submit', function(e) {
            e.preventDefault();
            $('#Edit-Module-Item-Form').find($('#edit-error-message')).empty();
            $('#Edit-Module-Item-Form').find($('#edit-alert-error')).css('display', 'none');
            var moduleItemId = $('#Edit-Module-Item-Form').find('[name="id"]').val();
            var moduleId = $('#Edit-Module-Item-Form').find('[name="module_id"]').val();
            var url = "{{ route('modules.module-items.update', ['module' => ':module', 'module_item' => ':module_item']) }}";
            url = url.replace(':module', moduleId);
            url = url.replace(':module_item', moduleItemId);
            $.ajax({
            type: 'PUT',
            url: url,
            data: $(this).serialize(),
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            success: function(res) {
            if (res.status == 'success') {
            $('#Edit-Module-Item-Modal').modal('hide');
            swal("{{__('Alert')}}", res.msg, "success");
            table.ajax.url("{{route('modules.module-items.index',['module'=>$moduleDetails->id])}}").load().draw();
            } else {
            }
            },
            error: function(res) {
                if (res.responseText) {
                    $('#Edit-Module-Item-Form').find($('#edit-alert-error')).css('display', 'block');
                var errors = JSON.parse(res.responseText).errors;
                var errors = Object.values(errors)
                for (let index = 0; index < errors.length; index++) 
                { 
                    var html='<li><span>' + errors[index][0] + '</span></li>' ;
                    $('#Edit-Module-Item-Form').find($('#edit-error-message')).append(html);
                } 
                $('#alert-error').css('display', 'block' ); 
                }
                    else { 
                    }
                } 
                
            }); return false; 
        });
           
        $(document).on('click', '.Delete-Module-Item-Button', function() {
            var data = table.row($(this).closest('tr')).data();
            var moduleItemId = data.id;
            var moduleId = "{{$moduleDetails->id}}";
            var url = "{{ route('modules.module-items.destroy', ['module' => ':module', 'module_item' => ':module_item']) }}";
            url = url.replace(':module', moduleId);
            url = url.replace(':module_item', moduleItemId);
            swal({
            title: "{{__('Are you sure?')}}",
            text: "{{__('Once deleted, you will not be able to recover it')}}",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
            $.ajax({
            type: 'DELETE',
            url: url,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            success: function(res) {
            if (res.status == 'success') {
            swal("{{__('User data was successfully deleted')}}", {
                    icon: "success",
                });
                table.ajax.url("{{route('modules.module-items.index',['module'=>$moduleDetails->id])}}").load().draw();
            }
            else {
            swal({text: "{{__('Delete process not completed')}}",
            dangerMode: true,
            icon: "error",});
            }
            },
            error: function(res) {
            swal({text: "{{__('Delete process not completed')}}",
            dangerMode: true,
            icon: "error",});
            }
            });
            } else {
            swal({text: "{{__('Delete process not completed')}}",
            dangerMode: true,
            icon: "error",});
            }
            })
            return false;
        });
    });
    </script>
@push('page-script')
<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
<script src="{{asset('assets/js/sweet-alert/sweetalert.min.js')}}"></script>
@endpush
@endsection