@unless ($breadcrumbs->isEmpty())
    <div class="flex gap-[5px] items-center">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
                <a href="{{ $breadcrumb->url }}"
                    class="hover:text-secondary font-medium underline transition-all duration-300">
                    {{ $breadcrumb->title }}
                </a>
            @else
                {{ $breadcrumb->title }}
            @endif

            @unless ($loop->last)
                <icon class="fa-solid fa-angle-right size-[16px]"></icon>
            @endif
        @endforeach
    </div>
@endunless
