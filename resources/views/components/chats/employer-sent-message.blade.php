  
        <div class = "row col-md-4" style = "padding-left:35px;">
        <div class="sender-info d-flex align-items-center">
            @if(isset($conversations->employer->employerDetails->institution_logo) && !empty($conversations->employer->employerDetails->institution_logo))
            <img src="{{asset($conversations->employer->employerDetails->institution_logo)}}" data-src="{{asset($conversations->employer->employerDetails->institution_logo)}}" alt="" class="lazy-img logo" style = "max-width:30%;">
            @else
            <img src="{{asset('assets/images/logo_02.png')}}" data-src="{{asset('assets/images/logo_02.png')}}" alt="" class="lazy-img logo" style = "max-width:30%;">
            @endif            
            <div class="ps-3">
                @if($type == 0)
                <div class="sender-name">You</div>
                @else
                <div class="sender-name">{{$conversations->employer->employerDetails->institution ?? ''}}</div>
                @endif
                <div class="sender-email">{{$conversations->employer->email ?? ''}}</div>
            </div>
        </div>
        </div>
        <div class="ps-4 pe-4 ps-xxl-5 pe-xxl-5">
            <p>{!! $chatDetails->message !!}</p>
        </div>