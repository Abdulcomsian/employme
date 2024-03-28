<div class="open-email-container pb-40">
    <div class="email-header divider d-flex justify-content-between ps-4 pe-4 ps-xxl-5 pe-xxl-5">
        <div class="sender-info d-flex align-items-center">
            @if(isset($conversations->employer->employerDetails->institution_logo) && !empty($conversations->employer->employerDetails->institution_logo))
            <img src="{{asset($conversations->employer->employerDetails->institution_logo)}}" data-src="{{asset($conversations->employer->employerDetails->institution_logo)}}" alt="" class="lazy-img logo">
            @else
            <img src="{{asset('assets/images/logo_02.png')}}" data-src="{{asset('assets/images/logo_02.png')}}" alt="" class="lazy-img logo">
            @endif
            <div class="ps-3">
                <div class="sender-name">{{$conversations->employer->employerDetails->institution ?? ''}}</div>
                <div class="sender-email">payoneer@inquiry.com</div>
            </div>
        </div>
        
        {{--<div class="email-info">
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
        </div>--}}
    </div>
    <!-- /.email-header -->

    <div class="email-body divider conversation-{{$conversations->id}}">
        @isset($conversations->chats)
        @foreach($conversations->chats as $chat)
        @if($chat->user_id == auth()->user()->id)
        <div class = "row col-md-4" style = "padding-left:35px;">
        <div class="sender-info d-flex align-items-center">
            @if(isset($conversations->candidate->candidatePersonalDetails->profile_picture) && !empty($conversations->candidate->candidatePersonalDetails->profile_picture))
            <img src="{{asset($conversations->candidate->candidatePersonalDetails->profile_picture)}}" data-src="{{asset($conversations->candidate->candidatePersonalDetails->profile_picture)}}" alt="" class="lazy-img logo" style = "max-width:30%;">
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
            @if(isset($conversations->employer->employerDetails->institution_logo) && !empty($conversations->employer->employerDetails->institution_logo))
            <img src="{{asset($conversations->employer->employerDetails->institution_logo)}}" data-src="{{asset($conversations->employer->employerDetails->institution_logo)}}" alt="" class="lazy-img logo" style = "max-width:30%;">
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
                        <input type="email" class="flex-fill" placeholder="{{$conversations->employer->employerDetails->institution ?? ''}}">
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
                <form id = "send-text-to-employer-form" method = "post" enctype = "multipart/form-data">
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