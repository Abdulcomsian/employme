<div class="email-list-item users ps-3 pe-3 ps-xxl-4 pe-xxl-4 unread " data-user-id = "{{$conversations->id}}">
    <div class="email-short-preview position-relative">
        <div class="d-flex align-items-center justify-content-between">
            <div class="sender-name">{{$conversations->candidate->candidatePersonalDetails->full_name}}</div>
            <div class="date">@isset($conversations->lastChat->created_at){{date('d M',strtotime($conversations->lastChat->created_at))}}@endisset</div>
        </div>
        {{--<div class="mail-sub">Work inquiry from google.</div>--}}
        <div class="mail-text">{{$lastChat->message ?? ''}}</div>
        @isset($lastChat->chatFiles)
        @foreach($lastChat->chatFiles as $file)
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
</div>