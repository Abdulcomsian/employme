<style>
.text-muted {
    --bs-text-opacity: 1;
    color: #6c757d!important;
    padding: 13px 23px 1px 5px;
}
</style>
@if ($paginator->hasPages())
<div class="dash-pagination d-flex justify-content-end mt-30">
    <div>
        <p class="small text-muted">
            {!! __('Showing') !!}
            <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
            {!! __('to') !!}
            <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
            {!! __('of') !!}
            <span class="fw-semibold">{{ $paginator->total() }}</span>
            {!! __('results') !!}
        </p>
    </div>
    <ul class="style-none d-flex align-items-center">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <li><a ><i class="bi bi-chevron-left"></i></a></li>
    @else
    <li><a href="{{ $paginator->previousPageUrl() }}"><i class="bi bi-chevron-left"></i></a></li>
    @endif
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
         <li><a  class="">{{ $element }}</a></li> 
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li><a  class="active">{{ $page }}</a></li> 
                @else
                <li><a href="{{ $url }}" >{{ $page }}</a></li> 
                @endif
            @endforeach
        @endif
    @endforeach
    <!-- <li><a href="#"><i class="bi bi-chevron-left"></i></a></li> -->
        <!-- 
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li> -->
        {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <li><a href="{{ $paginator->nextPageUrl() }}" style="border-right:1px solid #626262"><i class="bi bi-chevron-right"></i></a></li>
    @else
        <li ><a style="border-right:1px solid #626262" ><i class="bi bi-chevron-right" ></i></a></li>
    @endif
    </ul>
 
</div>
@endif