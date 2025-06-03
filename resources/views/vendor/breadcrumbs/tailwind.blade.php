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
                <x-fas-angles-right class="size-[16px]"/>
            @endif
        @endforeach
    </div>
@endunless
