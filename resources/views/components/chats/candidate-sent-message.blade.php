  
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
                        <div class="d-flex flex-column flex-grow-1">
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
        </div>