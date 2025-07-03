@if ($paginator->hasPages())
    <div class="w-min text-[16px] border-secondary *:border-secondary border-[2px] rounded-[10px] flex items-center *:first:rounded-l-[8px] *:last:rounded-r-[8px] *:bg-secondary text-dark *h-full *py-[3px] *:px-[12px] *:hover:text-secondary *:hover:bg-dark *:transition-all *:duration-300 divide-x-[2px]">
        @if ($paginator->onFirstPage())
            <div class="!text-dark/25 hover:!bg-secondary hover:!text-dark/25" ><i class="fa-solid fa-chevron-left"></i></div>
            @else
            <a onclick="if (typeof search_data === 'function') { event.preventDefault(); search_data({{ $paginator->currentPage() - 1 }}); }" href="{{$paginator->previousPageUrl()}}" ><i class="fa-solid fa-chevron-left"></i></a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <div class="">{{ $element }}</div>
            @endif
            
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <div class="text-dark/25 hover:!bg-secondary hover:!text-dark/25">{{ $page }}</div>
                    @else
                        <a onclick="if (typeof search_data === 'function') { event.preventDefault(); search_data({{ $page }}); }"  href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a onclick="if (typeof search_data === 'function') { event.preventDefault();  search_data({{ $paginator->currentPage() + 1 }}); }" href="{{$paginator->nextPageUrl()}}"><i class="fa-solid fa-chevron-right "></i></a>
        @else
            <div class="!text-dark/25 hover:!bg-secondary hover:!text-dark/25"><i class="fa-solid fa-chevron-right "></i></div>
        @endif
    </div>
@endif
