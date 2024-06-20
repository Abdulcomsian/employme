  
        @if($chatFlag)
        <div>
            <p class = "text-start ms-3" style = "font-size:12px; font-weight:600;">{{$chatDetails->created_at->format('d F Y')}}</p>
        </div>
        @endif
        <div class="row" style = "padding-left:35px;">
            <div class='col-12'>
                <div class="sender-info d-flex align-items-center">
                    <div class="d-flex">
                        <div  class="avatar-section">
                            @if(isset($conversations->candidate->candidatePersonalDetails->profile_picture) && !empty($conversations->candidate->candidatePersonalDetails->profile_picture))
                            <img src="{{asset($conversations->candidate->candidatePersonalDetails->profile_picture)}}" data-src="{{asset($conversations->candidate->candidatePersonalDetails->profile_picture)}}" alt="" class="lazy-img logo chat-round-avatar">
                            @else
                            <img src="{{asset('assets/images/human-avatar.png')}}" data-src="{{asset('assets/images/human-avatar.png')}}" alt="" class="lazy-img logo chat-round-avatar">
                            @endif            
                        </div>
                    </div>
                    <div class="ps-3 d-flex flex-column">
                        @if($type == 0)
                        <div class="sender-name"><p>{{auth()->user()->name}} <small> &nbsp;&nbsp;&nbsp;{{$chatDetails->created_at->format('g:i A')}}</small></p></div>
                        @else
                        <div class="sender-name">
                        <p>{{$conversations->candidate->candidatePersonalDetails->first_name ?? ''}}
                        {{$conversations->candidate->candidatePersonalDetails->middle_name ?? ''}}
                        {{$conversations->candidate->candidatePersonalDetails->last_name ?? ''}}  <small> &nbsp;&nbsp;&nbsp;{{$chatDetails->created_at->format('g:i A')}}</small></p></p>
                        </div>
                        @endif
                        <div class="pe-4 pe-xxl-5 single-message">
                            <p>{!! $chatDetails->message !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="ps-4 pe-4 ps-xxl-5 pe-xxl-5">
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
            <!-- <p class = "text-center" style = "font-size:12px">{{date('d M, g:i A',strtotime($chatDetails->created_at))}}</p> -->
        </div>