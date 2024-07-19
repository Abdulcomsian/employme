<div class="email-header divider d-flex justify-content-between d-flex flex-column flex-grow-1">
    <div class="sender-info d-flex align-items-center">
        @if(isset($conversations->candidate->candidatePersonalDetails->profile_picture) && !empty($conversations->candidate->candidatePersonalDetails->profile_picture))
        <img src="{{asset($conversations->candidate->candidatePersonalDetails->profile_picture)}}" data-src="{{asset($conversations->candidate->candidatePersonalDetails->profile_picture)}}" alt="" class="lazy-img logo round-avatar ms-3">
        @else
        <img src="{{asset('assets/images/human-avatar.png')}}" data-src="{{asset('assets/images/human-avatar.png')}}" alt="" class="lazy-img logo round-avatar ms-3">
        @endif            
        <div class="ps-3">
            <div class="sender-name">
            {{$conversations->candidate->candidatePersonalDetails->first_name ?? ''}}
            {{$conversations->candidate->candidatePersonalDetails->middle_name ?? ''}}
            {{$conversations->candidate->candidatePersonalDetails->last_name ?? ''}}
            </div>
            <!-- <div class="sender-email">{{$conversations->candidate->email ?? ''}}</div> -->
        </div>
    </div>
</div>
    <!-- /.email-header -->



    



    <div class="email-body divider conversation-{{$conversations->id}}">
    @php
        $previousDate = null;
    @endphp
    @isset($conversations->chats)
    @foreach($conversations->chats as $key => $chat)
    @php
    $previousCarbonDate = !$previousDate ? \Carbon\Carbon::createFromFormat('Y-m-d' , $chat->created_at->format('Y-m-d')) : $previousDate;
    $newDate = \Carbon\Carbon::createFromFormat('Y-m-d' ,$chat->created_at->format('Y-m-d'));
    
    
    @endphp
    @if(!$previousDate || !$previousCarbonDate->isSameDay($newDate))
    @php
        $previousDate = $chat->created_at;
    @endphp
    <div>
        <p class = "text-start ms-3" style = "font-size:12px; font-weight:600;">{{date('d F Y',strtotime($chat->created_at))}}</p>
    </div>
    @endif    
    @if($chat->user_id == auth()->user()->id)
    <div class="row" style = "padding-left:35px;">
        <div class="col-12">
            <div class="sender-info d-flex align-items-center if">
                <div class="d-flex">
                    <div class="avatar-section">
                        @if(isset($conversations->candidate->candidatePersonalDetails->profile_picture) && !empty($conversations->candidate->candidatePersonalDetails->profile_picture))
                        <img src="{{asset($conversations->candidate->candidatePersonalDetails->profile_picture)}}" data-src="{{asset($conversations->candidate->candidatePersonalDetails->profile_picture)}}" alt="" class="lazy-img logo chat-round-avatar">
                        @else
                        <img src="{{asset('assets/images/human-avatar.png')}}" data-src="{{asset('assets/images/human-avatar.png')}}" alt="" class="lazy-img logo chat-round-avatar" >
                        @endif            
                    </div>
                    <div class="d-flex flex-column flex-grow-1">
                        <div class="sender-name"><p>{{auth()->user()->employerDetails->first_name ?? auth()->user()->name}}  <small> &nbsp;&nbsp;&nbsp;{{$chat->created_at->format('g:i A')}}</small></p></div>
                        <div class="pe-4 pe-xxl-5 single-message">
                            <p>{!! $chat->message !!}</p>
                        </div>
                        <!-- <div class="sender-email">{{$conversations->candidate->email ?? ''}}</div> -->
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    @else
    <div class = "row" style = "padding-left:35px;">
        <div class="col-12">
            <div class="sender-info d-flex align-items-center else">
                <div class="d-flex">
                    <div class="avatar-section">
                        @if(isset($conversations->employer->employerDetails->institution_logo) && !empty($conversations->employer->employerDetails->institution_logo))
                        <img src="{{asset($conversations->employer->employerDetails->institution_logo)}}" data-src="{{asset($conversations->employer->employerDetails->institution_logo)}}" alt="" class="lazy-img logo chat-round-avatar " >
                        @else
                        <img src="{{asset('assets/images/human-avatar.png')}}" data-src="{{asset('assets/images/human-avatar.png')}}" alt="" class="lazy-img logo chat-round-avatar" >
                        @endif            
                    </div>
                    <div class="d-flex flex-column flex-grow-1">
                        <div class="sender-name"><p class="d-flex">{{$conversations->candidate->candidateDetails->first_name ?? $conversations->candidate->name}}  <small> &nbsp;&nbsp;&nbsp;{{$chat->created_at->format('g:i A')}}</small></p></div>
                        <div class="pe-4 pe-xxl-5 single-message">
                            <p>{!! $chat->message !!}</p>
                        </div>
                        <!-- <div class="sender-email">{{$conversations->employer->email ?? ''}}</div> -->
                    </div>
                </div>
            </div>
        </div>


    </div>
    @endif
    
        
    @endforeach
    @endisset
</div>



