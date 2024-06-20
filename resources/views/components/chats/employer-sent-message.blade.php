    @if($chatFlag)
        <div>
            <p class = "text-start ms-3" style = "font-size:12px; font-weight:600;">{{$chatDetails->created_at->format('d F Y')}}</p>
        </div>
    @endif
        
        <div class = "row" style = "padding-left:35px;">
            <div class="col-12">
                <div class="d-flex">
                    <div class="avatar-section">
                        @if(isset($conversations->employer->employerDetails->institution_logo) && !empty($conversations->employer->employerDetails->institution_logo))
                        <img src="{{asset($conversations->employer->employerDetails->institution_logo)}}" data-src="{{asset($conversations->employer->employerDetails->institution_logo)}}" alt="" class="lazy-img logo chat-round-avatar">
                        @else
                        <img src="{{asset('assets/images/human-avatar.png')}}" data-src="{{asset('assets/images/human-avatar.png')}}" alt="" class="lazy-img logo chat-round-avatar">
                        @endif            
                    </div>
                    <div class="ps-3 d-flex flex-column">
                        @if($type == 0)
                        <div class="sender-name"><p>{{auth()->user()->name}}  <small> &nbsp;&nbsp;&nbsp;{{$chatDetails->created_at->format('g:i A')}}</small></p></div>
                        @else
                        <div class="sender-name"><p>{{$conversations->employer->employerDetails->institution ?? ''}} <small> &nbsp;&nbsp;&nbsp;{{$chatDetails->created_at->format('g:i A')}}</small></p></div>
                        @endif
                        <div class="pe-4 pe-xxl-5 single-message">
                            <p>{!! $chatDetails->message !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" pe-4 pe-xxl-5">
            <div class="attachments mb-30 d-flex">
                @isset($chatDetails->chatFiles)
                @foreach($chatDetails->chatFiles as $file)
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