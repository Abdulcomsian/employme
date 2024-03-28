@extends('employer.layout.main')
@section('title')
Messages
@endsection
@section('content')
@push('page-css')
<style>
    .dashboard-body .message-wrapper .open-email-container .email-body .attachments .file {
    padding: 9px 15px;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    margin-right: 15px;
}
.dashboard-body .message-wrapper .open-email-container .email-body  {
    height: 45vh;
    overflow-x: scroll;
}
.message-wrapper{
    height: 100vh;
    overflow: scroll;
}
.dashboard-body{
    
    padding: 10px 55px 50px;
}

</style>
@endpush
<div class="dashboard-body">
    <div class="position-relative">
        <!-- ************************ Header **************************** -->
			{{--@include('employer.layout.header_menu')--}}
         <!-- End Header -->

        {{--<div class="row gx-0 align-items-center">
            <div class="offcanvas compose-mail-offcanvas" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                <div class="compose-new-email-container">
                    <div class="new-email-header position-relative">
                        <div class="btn-group">
                            <a data-bs-toggle="collapse" href="#CC-input" role="button" aria-expanded="false" aria-controls="collapseExample">Cc</a>
                            <a data-bs-toggle="collapse" href="#BCC-input" role="button" aria-expanded="false" aria-controls="collapseExample">Bcc</a>
                        </div>
                        <div class="input-group d-flex align-items-center">
                            <div class="text-center" style="width: 60px;">To</div>
                            <input type="email" class="flex-fill" placeholder="payoneer@inquiry.com">
                        </div>
                        <div class="collapse" id="CC-input">
                            <div class="input-group d-flex align-items-center">
                                <div class="text-center" style="width: 60px;">Cc</div>
                                <input type="email" class="flex-fill" placeholder="payoneer@inquiry.com">
                            </div>
                        </div>
                        <div class="collapse" id="BCC-input">
                            <div class="input-group d-flex align-items-center">
                                <div class="text-center" style="width: 60px;">Bcc</div>
                                <input type="email" class="flex-fill" placeholder="payoneer@inquiry.com">
                            </div>
                        </div>
                    </div>
                    <!-- /.new-email-header -->
                    <div class="compose-body">
                        <textarea>Hi, Mary Cooper! 

                        Thanks for your invitation for the account manager position for you company. I Will back to you soon with all the require documents.</textarea>
                    </div>
                    <!-- /.compose-body -->

                    <div class="compose-email-footer d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="insert-file position-relative me-3">
                                <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_32.svg')}}" alt="" class="lazy-img">
                                <input type="file" name="uploadImg" placeholder="" title="Insert File">
                            </div>
                            <button class="insert-emoji me-3"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_33.svg')}}" alt="" class="lazy-img"></button>
                            <div class="insert-file position-relative me-3">
                                <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_34.svg')}}" alt="" class="lazy-img">
                                <input type="file" name="uploadImg" placeholder="" title="Insert Image">
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <a href="#" class="delete-mail me-3"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_35.svg')}}" alt="" class="lazy-img"></a>
                            <a href="#" class="reply-btn tran3s">Reply</a>
                        </div>
                    </div>
                    <!-- /.compose-email-footer -->
                </div>
                <!-- /.compose-new-email-container -->
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="col-lg-4">
                <div class="d-flex align-items-center justify-content-between">
                    <h2 class="main-title m0">Messages</h2>
                    <a class="new-message-compose rounded-circle" data-bs-toggle="offcanvas" href="#offcanvasScrolling" role="button" aria-controls="offcanvasScrolling">+</a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="message-pagination ps-lg-4 ps-xxl-5 d-flex align-items-center justify-content-between md-mt-40">
                    <a href="javascript:void()" class="prev-msg"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_26.svg')}}" alt="" class="lazy-img"></a>
                    <div class="d-flex align-items-center">
                        <a href="#"><i class="bi bi-chevron-left"></i></a>
                        <span>1-5 of 120</span>
                        <a href="#"><i class="bi bi-chevron-right"></i></a>
                    </div>
                    <a href="javascript:void()" class="next-msg"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_27.svg')}}" alt="" class="lazy-img"></a>
                </div>
                <!-- /.message-pagination -->
            </div>
        </div>--}}

        <div class="bg-white card-box border-20 p0 mt-30">
            <div class="message-wrapper">
                <div class="row gx-0">
                    <div class="col-lg-4">
                        <div class="message-sidebar pt-20">
                            <div class="ps-3 pe-3 ps-xxl-4 pe-xxl-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="page-title fw-500">Inbox</div>
                                      {{--
                                        <div class="action-dots float-end">
                                            <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#">Sent</a></li>
                                                <li><a class="dropdown-item" href="#">Important</a></li>
                                                <li><a class="dropdown-item" href="#">Draft</a></li>
                                                <li><a class="dropdown-item" href="#">Trash</a></li>
                                            </ul>
                                        </div>
                                         --}}
                                </div>
                                <form action="{{route('getEmployerDashboardMessage')}}" method = "get" class="search-form mt-20 mb-20">
                                    <input type="text" name = "searchUser" placeholder="Search contacts">
                                    <button type = "submit"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_10.svg')}}" alt="" class="lazy-img m-auto"></button>
                                </form>

                                {{--<div class="message_filter d-flex align-items-center justify-content-between mb-20" id="module_btns">
                                    <button class="filter_btn active">All</button>
                                    <button class="filter_btn"><span style="background:#FF4545;"></span> Read</button>
                                    <button class="filter_btn"><span style="background:#3BDA84;"></span> Unread</button>
                                    <button class="filter_btn"><span style="background:#50C0FF;"></span> Primary</button>
                                </div>--}}
                            </div>
                            <div class="email-read-panel">
								@isset($allConversations)
								@foreach($allConversations as $index=>$conversation)
                                <div class="email-list-item users ps-3 pe-3 ps-xxl-4 pe-xxl-4 read {{$index==0 ? 'selected' : ''}}" data-user-id = "{{$conversation->id}}">
                                    <div class="email-short-preview position-relative">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="sender-name">{{$conversation->candidate->candidatePersonalDetails->full_name}}</div>
                                            <div class="date">@isset($conversation->lastChat->created_at){{date('d M',strtotime($conversation->lastChat->created_at))}}@endisset</div>
                                        </div>
                                        {{--<div class="mail-sub">Work inquiry from google.</div>--}}
                                        <div class="mail-text">{{$conversation->lastChat->message ?? ''}}</div>
                                        @isset($conversation->lastChat->chatFiles)
                                        @foreach($conversation->lastChat->chatFiles as $file)
                                        <div class="attached-file-preview d-flex align-items-center mt-15">
                                            <div class="file d-flex align-items-center me-2">
                                                <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_28.svg')}}" alt="" class="lazy-img me-2">
                                                <span>{{$file->original_name}}</span>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endisset
                                        <!-- /.attached-file-preview -->
                                    </div>
                                    <!-- /.email-short-preview -->
                                </div>
								@endforeach
								@endif
                                <!-- /.email-list-item -->
								{{--

                                <div class="email-list-item users ps-3 pe-3 ps-xxl-4 pe-xxl-4 primary " data-user-id = "2">
                                    <div class="email-short-preview position-relative">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="sender-name">Hasan Islam.</div>
                                            <div class="date">May 22</div>
                                        </div>
                                        <div class="mail-sub">Account Manager</div>
                                        <div class="mail-text">Hello, Greeting from Uber. Hope you doing great. I am approcing to you for..</div>
                                        <div class="attached-file-preview d-flex align-items-center mt-15">
                                            <div class="file d-flex align-items-center me-2">
                                                <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_28.svg')}}" alt="" class="lazy-img me-2">
                                                <span>details.pdf</span>
                                            </div>
                                            <div class="file d-flex align-items-center me-2">
                                                <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_28.svg')}}" alt="" class="lazy-img me-2">
                                                <span>form.pdf</span>
                                            </div>
                                        </div>
                                        <!-- /.attached-file-preview -->
                                    </div>
                                    <!-- /.email-short-preview -->
                                </div>
                                <!-- /.email-list-item -->
                                 
                                <div class="email-list-item users ps-3 pe-3 ps-xxl-4 pe-xxl-4" data-user-id = "3">
                                    <div class="email-short-preview position-relative">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="sender-name">Jannatul Ferdaus.</div>
                                            <div class="date">Jun 22</div>
                                        </div>
                                        <div class="mail-sub">Product Designer Opportunities</div>
                                        <div class="mail-text">Hello, This is Jannat from HuntX. We offer business solution to our client..</div>
                                    </div>
                                    <!-- /.email-short-preview -->
                                </div>
                                <!-- /.email-list-item -->


                                <div class="email-list-item users ps-3 pe-3 ps-xxl-4 pe-xxl-4 read" data-user-id = "4">
                                    <div class="email-short-preview position-relative">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="sender-name">Jakie Chan</div>
                                            <div class="date">NOV 22</div>
                                        </div>
                                        <div class="mail-sub">Hunting Marketing Specialist</div>
                                        <div class="mail-text">Hello, We’r the well known Real Estate Inc provide best interior/exterior solut...</div>
                                    </div>
                                    <!-- /.email-short-preview -->
                                </div>
								       --}}
                                <!-- /.email-list-item -->
                            </div>
                            <!-- /.email-read-panel -->

                        </div>
                        <!-- /.message-sidebar -->
                    </div>
                    <div class="col-lg-8 candidate-message-body">
                        @isset($allConversations)
                        @foreach($allConversations as $index=>$conversations)
                        @if($index==0)
                        <div class="open-email-container pb-40">
                            <div class="email-header divider d-flex justify-content-between ps-4 pe-4 ps-xxl-5 pe-xxl-5">
                                <div class="sender-info d-flex align-items-center">
                                    @if(isset($conversations->candidate->candidatePersonalDetails->profile_picture) && !empty($conversations->candidate->candidatePersonalDetails->profile_picture))
                                    <img src="{{asset($conversations->candidate->candidatePersonalDetails->profile_picture)}}" data-src="{{asset($conversations->candidate->candidatePersonalDetails->profile_picture)}}" alt="" class="lazy-img logo">
                                    @else
                                    <img src="{{asset('assets/images/logo_02.png')}}" data-src="{{asset('assets/images/logo_02.png')}}" alt="" class="lazy-img logo">
                                    @endif            
                                    <div class="ps-3">
                                        <div class="sender-name">{{$conversations->candidate->candidatePersonalDetails->full_name ?? ''}}</div>
                                        <div class="sender-email">{{$conversations->candidate->email ?? ''}}</div>
                                    </div>
                                </div>
                                {{--
                                <div class="email-info">
                                    <div class="time">4:45AM (3 hours ago)</div>
                                    <div class="d-flex align-items-center justify-content-end">
                                        <button class="delete-email"><img src="{{asset('assets/images/icon/icon_29.svg')}}" data-src="{{asset('assets/images/icon/icon_29.svg')}}" alt="" class="lazy-img"></button>
                                        <button class="reply-email ms-3 me-3"><img src="{{asset('assets/images/icon/icon_30.svg')}}" data-src="{{asset('assets/images/icon/icon_30.svg')}}" alt="" class="lazy-img"></button>
                                        <div class="action-dots float-end">
                                            <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#">Reply</a></li>
                                                <li><a class="dropdown-item" href="#">Fowrward</a></li>
                                                <li><a class="dropdown-item" href="#">Block</a></li>
                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                       --}}
                            </div>
                            <!-- /.email-header -->

                            <div class="email-body divider conversation-{{$conversations->id}}">
                                @isset($conversations->chats)
                                @foreach($conversations->chats as $chat)
                                @if($chat->user_id == auth()->user()->id)
                                <div class = "row col-md-4" style = "padding-left:35px;">
                                <div class="sender-info d-flex align-items-center">
                                    @if(isset($conversations->employer->employerDetails->institution_logo) && !empty($conversations->employer->employerDetails->institution_logo))
                                    <img src="{{asset($conversations->employer->employerDetails->institution_logo)}}" data-src="{{asset($conversations->employer->employerDetails->institution_logo)}}" alt="" class="lazy-img logo" style = "max-width:30%;">
                                    @else
                                    <img src="{{asset('assets/images/logo_02.png')}}" data-src="{{asset('assets/images/logo_02.png')}}" alt="" class="lazy-img logo" style = "max-width:30%;">
                                    @endif            
                                    <div class="ps-3">
                                        <div class="sender-name">You</div>
                                        <div class="sender-email">{{$conversations->employer->email ?? ''}}</div>
                                    </div>
                                </div>
                                </div>
                                @else
                                <div class = "row col-md-4" style = "padding-left:35px;">
                                <div class="sender-info d-flex align-items-center">
                                    @if(isset($conversations->candidate->candidatePersonalDetails->profile_picture) && !empty($conversations->candidate->candidatePersonalDetails->profile_picture))
                                    <img src="{{asset($conversations->candidate->candidatePersonalDetails->profile_picture)}}" data-src="{{asset($conversations->candidate->candidatePersonalDetails->profile_picture)}}" alt="" class="lazy-img logo" style = "max-width:30%;">
                                    @else
                                    <img src="{{asset('assets/images/logo_02.png')}}" data-src="{{asset('assets/images/logo_02.png')}}" alt="" class="lazy-img logo" style = "max-width:30%;">
                                    @endif            
                                    <div class="ps-3">
                                        <div class="sender-name">{{$conversations->candidate->candidatePersonalDetails->full_name ?? ''}}</div>
                                        <div class="sender-email">{{$conversations->candidate->email ?? ''}}</div>
                                    </div>
                                </div>
                                </div>
                                @endif
                                <div class="ps-4 pe-4 ps-xxl-5 pe-xxl-5">
                                    <p>{!! $chat->message !!}</p>
                                </div>
                                <div class="ps-4 pe-4 ps-xxl-5 pe-xxl-5">
                                    <div class="attachments mb-30 d-flex">
                                        @isset($chat->chatFiles)
                                        @foreach($chat->chatFiles as $file)
                                        <a href="javascript:void(0)" class="file tran3s d-flex align-items-center mt-10" onclick= "downloadFile('{{asset($file->file_path)}}', '{{$file->original_name}}')">
                                            <div class="icon rounded-circle d-flex align-items-center justify-content-center"><img src="{{asset($file->file_path)}}" data-src="{{asset($file->file_path)}}" alt="" class="lazy-img"></div>
                                            <div class="ps-2">
                                                <div class="file-name">{{$file->original_name}}</div>
                                                {{--<div class="file-size">2.3mb</div>--}}
                                            </div>
                                        </a>
                                        @endforeach
                                        @endisset
                                    </div>
                                </div>
                                

                                @endforeach
                                @endisset
                            </div>
                            <!-- /.email-body -->

                            <div class="email-footer">
                                <div class="ps-4 pe-4 ps-xxl-5 pe-xxl-5">
                                    <div class="compose-new-email-container">
                                        <div class="new-email-header position-relative">
                                            {{--<div class="btn-group">
                                                <a data-bs-toggle="collapse" href="#CC-input" role="button" aria-expanded="false" aria-controls="collapseExample">Cc</a>
                                                <a data-bs-toggle="collapse" href="#BCC-input" role="button" aria-expanded="false" aria-controls="collapseExample">Bcc</a>
                                            </div>--}}
                                            {{--<div class="input-group d-flex align-items-center">
                                                <div class="text-center" style="width: 60px;">To</div>
                                                <input type="email" class="flex-fill" placeholder="{{$conversations->candidate->candidatePersonalDetails->full_name ?? ''}}">
                                            </div>--}}
                                            {{--<div class="collapse" id="CC-input">
                                                <div class="input-group d-flex align-items-center">
                                                    <div class="text-center" style="width: 60px;">Cc</div>
                                                    <input type="email" class="flex-fill" placeholder="payoneer@inquiry.com">
                                                </div>
                                            </div>
                                            <div class="collapse" id="BCC-input">
                                                <div class="input-group d-flex align-items-center">
                                                    <div class="text-center" style="width: 60px;">Bcc</div>
                                                    <input type="email" class="flex-fill" placeholder="payoneer@inquiry.com">
                                                </div>
                                            </div>--}}
                                        </div>
                                        <!-- /.new-email-header -->
                                        <form id = "send-text-to-candidate-form" method = "post" enctype = "multipart/form-data">
                                            @csrf
                                            <input type = "hidden" name = "conversation_id"  value = "{{$conversations->id}}">
                                            <div class="compose-body">
                                                <textarea name = "message" placeholder = "send message here"></textarea>
                                            </div>
                                            <!-- /.compose-body -->
                                        
                                            <div class="compose-email-footer d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <div class="insert-file position-relative me-3">
                                                        <img src="{{asset('assets/images/icon/icon_32.svg')}}" data-src="{{asset('assets/images/icon/icon_32.svg')}}" alt="" class="lazy-img">
                                                        <input type="file" name="chat_files[]" id = "chatFiles" placeholder="" title="Insert File" multiple>
                                                    </div>
                                                    {{--<button class="insert-emoji me-3"><img src="{{asset('assets/images/icon/icon_33.svg')}}" data-src="{{asset('assets/images/icon/icon_33.svg')}}" alt="" class="lazy-img"></button>
                                                    <div class="insert-file position-relative me-3">
                                                        <img src="{{asset('assets/images/icon/icon_34.svg')}}" data-src="{{asset('assets/images/icon/icon_34.svg')}}" alt="" class="lazy-img">
                                                        <input type="file" name="uploadImg" placeholder="" title="Insert Image">
                                                    </div>--}}
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <a href="#" class="delete-mail me-3"><img src="{{asset('assets/images/icon/icon_35.svg')}}" data-src="{{asset('assets/images/icon/icon_35.svg')}}" alt="" class="lazy-img"></a>
                                                    <button type = "submit"  class="reply-btn tran3s">Send</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- /.compose-email-footer -->
                                    </div>
                                    <!-- /.compose-new-email-container -->
                                </div>
                            </div>
                            <!-- /.email-footer -->
                        </div>
                        @endif
                        @endforeach
                        @endisset
                        <!-- /.open-email-container -->
                    </div>
                </div>
            </div>
            <!-- /.message-wrapper -->
        </div>
        <!-- /.card-box -->
    </div>
</div>

@push('page-script')
<script>
    $(document).ready(function(){
        $(".compose-new-email-container").find(".compose-body textarea").focus();
        $(".email-body").scrollTop($(".email-body")[0].scrollHeight);
    });
    let conversationId = $(".email-list-item.selected").data("user-id");
    $(document).on('click', '.users', function() {
     $('.users').removeClass('selected');
     conversationId = $(this).data('user-id');
    var selectedUser = $('[data-user-id="' + conversationId + '"]');
    selectedUser.addClass('selected');
    selectedUser.removeClass('unread');
    selectedUser.addClass('read');
	var apiUrl = '{{url("employer/get-candidate-chat")}}' + '/' + conversationId;
		$.ajax({
				type: "GET",
				url:apiUrl,
				dataType: 'json',
				contentType: false,
				processData: false,
				success: function (data) {
		
					if (data.status) {
						// window.location = data.redirect;
						$(".candidate-message-body").empty();
						$(".candidate-message-body").html(data.html);
                        $(".compose-new-email-container").find(".compose-body textarea").focus();
                        $(".email-body").scrollTop($(".email-body")[0].scrollHeight);
					}else{
						$.each(data.errors, function (key, val) {
							$("#errors-list").append("<div class='alert alert-danger'>" + val + "</div>");
						});
					}
				
				}
			});
	});
	$(document).on('submit', '#send-text-to-candidate-form', function(e) {
		e.preventDefault();
		var formData = new FormData();
		formData.append("_token", "{{ csrf_token() }}");
		formData.append("conversation_id", $("#send-text-to-candidate-form").find("input[name=conversation_id]").val());
		formData.append("message", $("#send-text-to-candidate-form").find("textarea[name=message]").val());
        var filesInput = $('#chatFiles')[0];
        // Check if the file input element and its files property are defined
        if (filesInput && filesInput.files && filesInput.files.length > 0) {
            var files = filesInput.files;
            // Iterate through each file
            for (var i = 0; i < files.length; i++) {
                var licenseFile = files[i];
                // Do whatever you want with the file
                formData.append('chat_files[]', licenseFile);
            }
        } else {
            // No file selected or file input element not found
            console.log("No files selected.");
        }
		var apiUrl = '{{route("employer.sendTextToCandidate")}}';
		$.ajax({
				type: "POST",
				url:apiUrl,
				data: formData ,
				dataType: 'json',
				contentType: false,
				processData: false,
				success: function (data) {
		
					if (data.status) {
				    $(".conversation-"+conversationId).append(data.html);
                    $("#send-text-to-candidate-form").find("textarea[name=message]").val('');
                    $(".compose-new-email-container").find(".compose-body textarea").focus();
                     $(".email-body").scrollTop($(".email-body")[0].scrollHeight);
					}else{
						$.each(data.errors, function (key, val) {
							$("#errors-list").append("<div class='alert alert-danger'>" + val + "</div>");
						});
					}
				
				}
			});
	});

    function downloadFile(url, fileName) {
        // Create a temporary anchor element
        var link = document.createElement("a");
        // Set the href attribute to the file URL
        link.href = url;
        // Set the download attribute to the desired filename
        link.download = fileName;
        // Append the anchor element to the document body
        document.body.appendChild(link);
        // Trigger a click event on the anchor element
        link.click();
        // Remove the anchor element from the document body
        document.body.removeChild(link);
    }
</script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
@vite('resources/js/app.js')


<script type="module">
      Echo.private(`candidate-chat.{{auth()->user()->id}}`)
    .listen('CandidateEvent', (e) => {
        console.log(e.conversationId);
      
        if(e.conversationId == conversationId)
        {
            $(".conversation-"+e.conversationId).append(e.html);
            $(".compose-new-email-container").find(".compose-body textarea").focus();
            $(".email-body").scrollTop($(".email-body")[0].scrollHeight);
        }
        else
        {
            $(".users[data-user-id='" + e.conversationId + "']").remove();
            $(".email-read-panel").prepend(e.newCandidate);
        }
    });
</script>
@endpush
@endsection