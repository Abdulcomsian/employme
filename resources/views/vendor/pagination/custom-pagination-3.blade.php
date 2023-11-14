@if ($paginator->hasPages())
<div class="pt-20 d-sm-flex align-items-center justify-content-between">
	<p class="m0 order-sm-last text-center text-sm-start xs-pb-20">Showing <span class="text-dark fw-500">{{ $paginator->firstItem() }} to {{ $paginator->lastItem() }}</span> of <span class="text-dark fw-500">{{ $paginator->total() }}</span></p>
	<div class="d-flex justify-content-center">
		<ul class="pagination-two d-flex align-items-center style-none">
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
							<li class="active"><a  >{{ $page }}</a></li> 
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
</div>
@endif