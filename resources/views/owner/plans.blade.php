@extends('owner.layout.main')
@section('title')
Plans
@endsection
@push('page-css')
<style>
    i.fa-solid.fa-ellipsis-vertical.plan-detail {
        font-size: 20px;
        color: grey;
        cursor: pointer;
    }
    .modal-title {
        font-family: "gordita";
    }

    
</style>

@endphp
@section('content')
<div class="dashboard-body">
    <div class="position-relative">
        <!-- ************************ Header **************************** -->
        <header class="dashboard-header">
            <div class="d-flex align-items-center justify-content-end">
                <button class="dash-mobile-nav-toggler d-block d-md-none me-auto">
                    <span></span>
                </button>
              
            </div>
        </header>
        <div class="modal" id="plan-detail-modal" tabindex="-1" role="dialog">
            <form action="{{route('update.plan')}}" method="post" id="update-plan-form">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update Plan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body plan-detail-body">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn update-plan-btn" style="background: #ff715b; color:white;">Update</button>
                            <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="d-sm-flex align-items-center justify-content-between mb-40 lg-mb-30">
            <h2 class="main-title m0">Plans</h2>
        </div>

        <div class="bg-white card-box border-20">
           
            <div class="table-responsive">
                <table class="table job-alert-table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="border-0">
                    @foreach($plans as $index=>$plan)
                        <tr class="active">
                            <td>{{$index+1}}</td>
                            <td><div class="job-name " style = "color:black">{{$plan->name}}</div></td>
                            <td style = "color:black">₩ {{$plan->price}}</td>
                            <td style = "color:black">{{$plan->duration}} months</td>
                            <td style = "color:black">
                                <i class="fa-solid fa-ellipsis-vertical plan-detail" data-plan-id="{{$plan->id}}"></i>
                            
                            </td>
                      
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- /.table job-alert-table -->
            </div>
        </div>
   
    </div>
</div>
@endsection
@push('page-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
        $(document).on('click', '.plan-detail' , function (e) {
            e.preventDefault();
            let id = this.dataset.planId;
            $.ajax({
                type: "POST",
                url: "{{route('plan.detail')}}",
                data: {
                    _token : "{{csrf_token()}}",
                   id : id
                },
                success:function(res){
                        if(res.status){
                            $('#plan-detail-modal').modal('show');
                            document.querySelector('.plan-detail-body').innerHTML = res.html;
                        }else{
                            toastr.error(res.message)
                        }
                    }
                })
        })


        $(document).on('click', '.plan-detail' , function (e) {
            e.preventDefault();
            let id = this.dataset.planId;
            $.ajax({
                type: "POST",
                url: "{{route('plan.detail')}}",
                data: {
                    _token : "{{csrf_token()}}",
                   id : id
                },
                success:function(res){
                        if(res.status){
                            $('#plan-detail-modal').modal('show');
                            document.querySelector('.plan-detail-body').innerHTML = res.html;
                        }else{
                            toastr.error(res.message)
                        }
                    }
                })
        })

        $(document).on('click', '.update-plan-btn' , function (e) {
           e.preventDefault();
           let updateForm = document.querySelector("#update-plan-form")
           let form = new FormData(updateForm);
           form.append('_token' , "{{csrf_token()}}")
           let url = updateForm.getAttribute('action');
           $.ajax({
                type: "POST",
                url: url,
                data: form ,
                contentType: false,
                processData: false,
                success: function(res){
                    if(res.status){
                        toastr.success(res.msg);
                        $('#plan-detail-modal').modal('hide');
                        location.reload();
                    }else{
                        toastr.error(res.error);
                    }
                }
            })
        })

    })
</script>
@endpush