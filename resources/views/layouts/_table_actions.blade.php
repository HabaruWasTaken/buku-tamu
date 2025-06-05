@php
    $btns = collect(explode(", ", $buttons));
@endphp

<td class="**:hover:text-dark **:hover:outline-dark">
    @if ($btns->count() > 1)
        <div class="flex gap-[10px] items-center justify-start min-w-0 !max-w-[210px] mx-auto flex-wrap">
    @endif
        @if ($btns->contains('edit'))
            @include('layouts._btn_a', ['route' => $model.'.edit', 'id' => 1, 'icon' => 'pen', 'text' => 'Edit'])
        @endif
        @if ($btns->contains('delete'))
            @include('layouts._btn_a', ['route' => $model.'.destroy', 'id' => 1, 'icon' => 'trash', 'text' => 'Delete'])
        @endif
    @if ($btns->count() > 1)
        </div>
    @endif
</td>