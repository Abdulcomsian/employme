    @if($chatFlag)
        <div>
            <p class = "text-start ms-3" style = "font-size:12px; font-weight:600;">{{$chatDetails->created_at->format('d F Y')}}</p>
        </div>
    @endif
        <div class = "row" style="padding-left: 35px;">
            <div class="col-12">
                <div class="d-flex">
                    <div class="avatar-section">
                        @if(isset($conversations->employer->employerDetails->institution_logo) && !empty($conversations->employer->employerDetails->institution_logo))
                        <img src="{{asset($conversations->employer->employerDetails->institution_logo)}}" data-src="{{asset($conversations->employer->employerDetails->institution_logo)}}" alt="" class="lazy-img logo chat-round-avatar">
                        @else
                        <img src="{{asset('assets/images/human-avatar.png')}}" data-src="{{asset('assets/images/human-avatar.png')}}" alt="" class="lazy-img logo chat-round-avatar">
                        @endif            
                    </div>
                    <div class="d-flex flex-column flex-grow-1">
                        @if($type == 0)
                        <div class="sender-name"><p>{{auth()->user()->name}}  <small> &nbsp;&nbsp;&nbsp;{{$chatDetails->created_at->format('g:i A')}}</small></p></div>
                        @else
                        <div class="sender-name"><p>{{$conversations->employer->name ?? ''}} <small> &nbsp;&nbsp;&nbsp;{{$chatDetails->created_at->format('g:i A')}}</small></p></div>
                        @endif
                        <div class="pe-4 pe-xxl-5 single-message">
                            <p>{!! $chatDetails->message !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      