@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div class="flex justify-between flex-1">
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center p-2 text-sm font-medium text-gray-500 bg-[#7CFD8A] shadow-title cursor-default leading-5 rounded-md">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center p-2 text-sm font-medium text-black bg-[#7CFD8A] shadow-title leading-5 rounded-md hover:text-gray-500 focus:bg-[#7CFD8A]/50 transition ease-in-out duration-150">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center p-2 ml-3 text-sm font-medium text-black bg-[#7CFD8A] shadow-title leading-5 rounded-md hover:text-gray-500 focus:bg-[#7CFD8A]/50 transition ease-in-out duration-150">
                    {!! __('pagination.next') !!}
                </a>
                <a href="?page={{ $paginator->lastPage() }}" class="relative inline-flex items-center p-2 text-sm font-medium text-black bg-[#7CFD8A] shadow-title leading-5 rounded-md hover:text-gray-500 focus:bg-[#7CFD8A]/50 transition ease-in-out duration-150">
                    {!! __('pagination.last') !!}
                </a>
            @else
                <span class="relative inline-flex items-center p-2 ml-3 text-sm font-medium text-gray-500 bg-[#7CFD8A] shadow-title cursor-default leading-5 rounded-md">
                    {!! __('pagination.next') !!}
                </span>
                    <span class="relative inline-flex items-center p-2 ml-3 text-sm font-medium text-gray-500 bg-[#7CFD8A] shadow-title cursor-default leading-5 rounded-md">
                    {!! __('pagination.last') !!}
                </span>
            @endif
        </div>
    </nav>
@endif
