  
        <div class = "row col-md-4" style = "padding-left:35px;">
        <div class="sender-info d-flex align-items-center">
            @if(isset($conversations->candidate->candidatePersonalDetails->profile_picture) && !empty($conversations->candidate->candidatePersonalDetails->profile_picture))
            <img src="{{asset($conversations->candidate->candidatePersonalDetails->profile_picture)}}" data-src="{{asset($conversations->candidate->candidatePersonalDetails->profile_picture)}}" alt="" class="lazy-img logo" style = "max-width:30%;">
            @else
            <img src="{{asset('assets/images/logo_02.png')}}" data-src="{{asset('assets/images/logo_02.png')}}" alt="" class="lazy-img logo" style = "max-width:30%;">
            @endif            
            <div class="ps-3">
                @if($type == 0)
                <div class="sender-name">You</div>
                @else
                <div class="sender-name">{{$conversations->candidate->candidatePersonalDetails->full_name ?? ''}}</div>
                @endif
                <div class="sender-email">{{$conversations->employer->email ?? ''}}</div>
            </div>
        </div>
        </div>
        <div class="ps-4 pe-4 ps-xxl-5 pe-xxl-5">
            <p>{!! $chatDetails->message !!}</p>
        </div>