<div class="min-w-full border-3 bg-light text-dark text-center border-secondary rounded-[10px] overflow-x-auto">
    <table class="w-full text-dark text-[13px]">
        <thead class="bg-secondary">
            <tr class="*:text-start *:py-[8px] *:text-[14px] *:first:rounded-tl-[7px] *:last:rounded-tr-[7px] *:first:pl-[20px]">
                <th>Date</th>
                <th>Time In</th>
                <th>Time Out</th>
                <th>Name</th>
                <th>Company</th>
                <th>Phone</th>
                <th>Employee</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="*:*:text-start *:*:py-[8px] divide-y-[2px] *:border-secondary *:hover:bg-gray-300/25 *:*:first:pl-[20px] bg-light *:last:*:first:rounded-bl-[7px] *:last:*:last:rounded-br-[7px]">
            @foreach($visitHistories as $visitHistory)
                <tr>
                    <td>{{ format_date($visitHistory->date) }}</td>
                    <td>{{ format_time($visitHistory->time) }}</td>
                    @if ($visitHistory->time_out !== null)
                        <td>{{ format_time($visitHistory->time_out)}}</td>
                    @elseif (date_difference(date("Y-m-d"), $visitHistory->date) == 1)
                        <td class="**:hover:text-dark **:hover:outline-dark">
                            <a onclick="toggle_modal({{$visitHistory->id}})" class="flex items-center w-min font-bold bg-secondary text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 hover:bg-transparent hover:text-secondary" href="javascript:void(0)"><i class="fa-solid fa-circle-plus font-[16px] mr-[5px]"></i>Add</a>
                            <div id="add_modal-{{$visitHistory->id}}" class="absolute bg-dark/25 hidden h-full w-full top-0 left-0 z-4 flex items-center justify-center">
                                <form id="form_time_out" class="flex flex-col gap-[10px] items-center bg-secondary p-[10px] rounded-[6px]">
                                    @csrf
                                    <div class="text-center text-[20px] font-bold">Add Time Out</div>
                                    <div class="flex justify-between items-center gap-[5px]">
                                        <label for="time_out">Time Out:</label>
                                        <input id="timepicker" name="time_out" class="py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
                                        <input class="hidden" name="id" value="{{$visitHistory->id}}">
                                        <button type="submit" class="self-end cursor-pointer flex items-center border-2 border-dark rounded-[8px] font-bold hover:bg-secondary hover:text-dark rounded-[6px] px-[8px] py-[2px] gap-[5px] transition-all duration-300 bg-dark text-secondary w-min"><icon class="fa-solid fa-check size-[16px]"></icon>Submit</button>
                                    </div>
                                </form>
                            </div>
                        </td>
                    @else
                        <td class="text-center">-</td>
                    @endif
                    <td>{{ $visitHistory->name }}</td>
                    <td>{{ $visitHistory->company }}</td>
                    <td>{{ $visitHistory->phone }}</td>
                    <td>{{ $visitHistory->employee->name }}</td>
                    <td>{{ $visitHistory->description }}</td>
                    <td class="**:hover:text-dark **:hover:outline-dark">
                        <a onclick="delete_data({{ $visitHistory->id }})" class="flex items-center w-min font-bold bg-secondary text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 hover:bg-transparent hover:text-secondary" href="javascript:void(0)"><i class="fa-solid fa-trash font-[16px] mr-[5px]"></i>Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if ($visitHistories->total() < 1)
        <div class="py-[5px] font-bold">
            No Data.
        </div>
    @endif
</div>

{{ $visitHistories->links() }}

<div>
    <p class="text-sm text-light leading-5">
        {!! __('Showing') !!}
        @if ($visitHistories->links()->paginator->firstItem())
            <span class="font-medium">{{ $visitHistories->links()->paginator->firstItem() }}</span>
            {!! __('to') !!}
            <span class="font-medium">{{ $visitHistories->links()->paginator->lastItem() }}</span>
        @else
            {{ $visitHistories->links()->paginator->count() }}
        @endif
        {!! __('of') !!}
        <span class="font-medium">{{ $visitHistories->links()->paginator->total() }}</span>
        {!! __('results') !!}
    </p>
</div>

<script>
    $("#total_visit").html('{{$visitHistories->total()}}')
    $form_time_out = $('#form_time_out')
    $form_time_out.submit((e) => {
        e.preventDefault()
        let url = base_url
        let data = new FormData($form_time_out.get(0))
        id = data.get('id')
        if (id !== '') url += '/' + id + '?_method=put'
        $.ajax({
            url,
            type: 'post',
            data,
            cache: false,
            processData: false,
            contentType: false,
            success: () => init(),
        }).fail((xhr) => {
            error_handle(xhr.responseText)
        })
    })
</script>