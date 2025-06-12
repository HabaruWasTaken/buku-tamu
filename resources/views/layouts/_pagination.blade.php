@if ($paginator->hasPages())
    <div>
        <div class="text-[18px] border-secondary *:border-secondary border-[2px] rounded-[10px] flex items-center *:first:rounded-l-[8px] *:last:rounded-r-[8px] *:bg-secondary text-dark *h-full *py-[3px] *:px-[12px] *:hover:text-secondary *:hover:bg-dark *:transition-all *:duration-300 divide-x-[2px]">
            @if ($paginator->onFirstPage())
                <a href="#" ><i class="fa-solid fa-chevron-left text-[18px]"></i></a>
            @else
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                @endif
                
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                        @else
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
            @else
            @endif


            <a href="#" ><i class="fa-solid fa-chevron-left text-[18px]"></i></a>
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#"><i class="fa-solid fa-chevron-right text-[18px]"></i></a>
        </div>
    </div>
@endif