<div class="w-full border-3 border-secondary rounded-[10px] overflow-x-auto bg-light text-dark text-center">
    <table class="w-full text-[13px] table-fixed">
        <thead class="bg-secondary">
            <tr class="*:text-start *:py-[8px] *:text-[14px] *:first:rounded-tl-[7px] *:last:rounded-tr-[7px] *:first:pl-[20px]">
                <th>No ID</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Division</th>
                <th>Position</th>
                <th class="!max-w-[210px]">Action</th>
            </tr>
        </thead>
        <tbody class="*:*:text-start *:*:py-[8px] divide-y-[2px] *:border-secondary *:hover:bg-hovered *:*:first:pl-[20px] bg-light *:last:*:first:rounded-bl-[7px] *:last:*:last:rounded-br-[7px] *:last:align-middle *:last:max-w-[210px] *:last:min-w-[150px]">
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->no_id }}</td>
                    <td><a href="{{ $employee->photo ? Storage::url($employee->photo) : asset('user-tie-solid.svg') }}" target="_blank"><img src="{{ $employee->photo ? Storage::url($employee->photo) : asset('user-tie-solid.svg') }}" class="size-[32px] mr-[5px] p-[5px] rounded-[6px] bg-secondary text-dark"></a></td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->division }}</td>
                    <td>{{ $employee->position }}</td>
                    <td class="**:hover:text-dark **:hover:outline-dark">
                        <div class="flex gap-[10px] items-center justify-start min-w-0 !max-w-[210px] mx-auto flex-wrap">
                            <a onclick="info({{ $employee->id }})" class="flex items-center w-min font-bold bg-secondary text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 hover:bg-transparent hover:text-secondary" href="javascript:void(0)"><i class="fa-solid fa-pen font-[16px] mr-[5px]"></i>Edit</a>
                            <a onclick="delete_data({{ $employee->id }})" class="flex items-center w-min font-bold bg-secondary text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 hover:bg-transparent hover:text-secondary" href="javascript:void(0)"><i class="fa-solid fa-trash font-[16px] mr-[5px]"></i>Delete</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if ($employees->total() < 1)
        <div class="py-[5px] font-bold">
            No Data.
        </div>
    @endif
</div>

{{ $employees->links() }}
<div>
    <p class="text-sm text-light leading-5">
        {!! __('Showing') !!}
        @if ($employees->links()->paginator->firstItem())
            <span class="font-medium">{{ $employees->links()->paginator->firstItem() }}</span>
            {!! __('to') !!}
            <span class="font-medium">{{ $employees->links()->paginator->lastItem() }}</span>
        @else
            {{ $employees->links()->paginator->count() }}
        @endif
        {!! __('of') !!}
        <span class="font-medium">{{ $employees->links()->paginator->total() }}</span>
        {!! __('results') !!}
    </p>
</div>

<script>
    $("#total_employee").html('{{$employees->total()}}')
</script>