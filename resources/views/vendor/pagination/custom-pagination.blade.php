@if ($paginator->hasPages())

<div class="pt-30 lg-pt-20 d-sm-flex align-items-center justify-content-between">
    <p class="m0 order-sm-last text-center text-sm-start xs-pb-20">Showing <span class="text-dark fw-500">{{ $paginator->firstItem() }} to {{ $paginator->lastItem() }}</span> of <span class="text-dark fw-500">{{ $paginator->total() }}</span></p>
    <ul class="pagination-one d-flex align-items-center justify-content-center justify-content-sm-start style-none pagination">
               @foreach ($elements as $element)
               @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="active" ><a >{{ $page }}</a></li>
                                @elseif($page == $paginator->lastPage())
                                    <li class="ms-2"><a href="{{ \Request::url().'?page='.$paginator->lastPage() }}" class="d-flex align-items-center">Last <img src="images/icon/icon_50.svg" alt="" class="ms-2"></a></li> 
                                @else
                                    <li><a href="{{$url}}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
        <!-- <li class="active"><a href="#">1</a></li> -->
        <!-- {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">@lang('pagination.previous')</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
                    </li>
                @endif
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link">@lang('pagination.next')</span>
            </li>
        @endif -->
        <!-- <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li>....</li>-->
        @if ($paginator->hasMorePages())
        @endif
    </ul>
</div>
@endif