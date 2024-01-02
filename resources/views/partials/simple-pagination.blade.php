@if ($paginator->hasPages())
    <div class="flex justify-center">
        <div class="join my-4">
            @if ($paginator->onFirstPage())
                <button aria-hidden="true" class="join-item btn btn-disabled" aria-disabled="true"
                    aria-label="@lang('pagination.previous')">«</button>
            @else
                <a class="join-item btn" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                    aria-label="@lang('pagination.previous')">«</a>
            @endif

            <button class="join-item btn no-animation">Page {{ $paginator->currentPage() }}</button>


            {{-- Since paginator lastPage funct not working in simplePaginate it's not possible to implement the last page button--}}

            @if ($paginator->hasMorePages())
                <a class="join-item btn" href="{{ $paginator->nextPageUrl() }}" rel="next"
                    aria-label="@lang('pagination.next')">»</a>
            @else
                <button class="join-item btn btn-disabled" aria-hidden="true" class="disabled" aria-disabled="true"
                    aria-label="@lang('pagination.next')">»</button>
            @endif
        </div>
    </div>
@endif
