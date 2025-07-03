@extends('layouts.index')

@section('content')
    <div class="flex gap-[10px] mb-[5px]">
        <div class="flex items-end pl-[20px] w-full basis-2/3">
            <div class="w-full text-start text-light font-medium w-max">
                <div class="text-[20px] font-bold text-nowrap">Visit Histories Today</div>
                <div class="text-[14px]">Total Visitations Today: {{ $visit_histories_today->total() }}</div>
            </div>
            <form method="get" class="mb-[2px] mr-[2px] flex justify-end gap-[9px] w-full h-min items-center flex-wrap-reverse flex justify-end w-full h-min items-center flex-wrap *:not-has-[a]:flex *:not-has-[a]:items-center *:not-has-[a]:font-bold *:not-has-[a]:bg-secondary *:not-has-[a]:text-dark *:not-has-[a]:rounded-[6px] *:not-has-[a]:px-[16px] *:not-has-[a]:py-[6px] *:not-has-[a]:has-[select]:pr-[0px] *:not-has-[a]:gap-[5px] *:not-has-[a]:outline-secondary *:not-has-[a]:outline-2 *:not-has-[a]:transition-all *:not-has-[a]:duration-300">
                <div class="group has-[input:focus-within]:bg-dark has-[input:focus-within]:text-secondary hover:bg-dark hover:text-secondary">
                    <i class="fa-solid fa-magnifying-glass text-[16px]"></i>
                    <input name="name" value="{{ request('name') }}" class="group-hover:placeholder:text-secondary group-hover:text-secondary focus:outline-none focus:text-secondary focus:placeholder:text-secondary/75 block min-w-0 grow text-base text-dark placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300" placeholder="Search Name" size="10">
                </div>
                <div class="group has-[input:focus-within]:bg-dark has-[input:focus-within]:text-secondary hover:bg-dark hover:text-secondary">
                    <i class="fa-solid fa-magnifying-glass text-[16px]"></i>
                    <input name="employee_name" value="{{ request('employee_name') }}" class="group-hover:placeholder:text-secondary group-hover:text-secondary focus:outline-none focus:text-secondary focus:placeholder:text-secondary/75 block min-w-0 grow text-base text-dark placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300" placeholder="Search Employee" size="13">
                </div>
                <button type="submit" name="time_order" value="{{ (request('time_order') == 'desc' || empty(request('time_order')) ) ? 'asc' : 'desc' }}"><i class="fa-solid fa-arrow-down-{{ (request('time_order') == 'desc' || empty(request('time_order')) ) ? '1-9' : '9-1' }} text-[16px]"></i> {{ (request('time_order') == 'desc' || empty(request('time_order')) ) ? 'Asc' : 'Desc' }}</button>
                <button type="submit"><i class="fa-solid fa-magnifying-glass text-[16px]"></i>Search</button>
            </form>
        </div>
        <div class="basis-1/3"></div>
    </div>
    <div class="flex items-start gap-[10px]">
        <div class="w-full flex flex-col justify-end items-center gap-[5px] basis-2/3">
            <div class="w-full border-3 border-secondary rounded-[10px] overflow-x-auto bg-light text-center text-dark">
                <table class="w-full text-dark text-[13px]">
                    <thead class="bg-secondary">
                        <tr class="*:text-start *:py-[8px] *:text-[14px] *:first:rounded-tl-[7px] *:last:rounded-tr-[7px] *:first:pl-[20px]">
                            <th>Date</th>
                            <th>Time In</th>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Employee</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody class="*:*:text-start *:*:py-[8px] divide-y-[2px] *:border-secondary *:hover:bg-gray-300/25 *:*:first:pl-[20px] bg-light *:last:*:first:rounded-bl-[7px] *:last:*:last:rounded-br-[7px]">
                        @foreach($visit_histories_today as $visitHistory)
                            <tr>
                                <td>{{ format_date($visitHistory->date) }}</td>
                                <td>{{ format_time($visitHistory->time) }}</td>
                                <td>{{ $visitHistory->name }}</td>
                                <td>{{ $visitHistory->company }}</td>
                                <td>{{ $visitHistory->employee->name }}</td>
                                <td>{{ $visitHistory->description }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($visit_histories_today->count() < 1)
                    <div class="py-[5px] font-bold">
                        No Data.
                    </div>
                @endif
            </div>
            {{ $visit_histories_today->links() }}

            <div>
                <p class="text-sm text-light leading-5">
                    {!! __('Showing') !!}
                    @if ($visit_histories_today->links()->paginator->firstItem())
                        <span class="font-medium">{{ $visit_histories_today->links()->paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-medium">{{ $visit_histories_today->links()->paginator->lastItem() }}</span>
                    @else
                        {{ $visit_histories_today->links()->paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-medium">{{ $visit_histories_today->links()->paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>
        </div>
        <div class="basis-1/3">
            <form class="bg-secondary flex flex-col p-[10px] rounded-[10px] text-dark w-full min-w-1/2 gap-[10px] *:font-bold" method="post" action="{{ route('dashboard.store') }}">
                @csrf
                <div class="text-center text-[18px] font-medium">Create New Visit History</div>
                <div class="flex flex-col gap-[10px] *:pb-[10px] *:gap-[20px] *:*:last:w-3/4 *:*:first:w-1/4 divide-y-2 border-b-2 border-dark *:flex *:justifybetween *:items-center">
                    <div class="flex justify-between items-center">
                        <label for="name">Name:</label>
                        <input name="name" class="py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
                    </div>
                    <div class="flex justify-between items-center">
                        <label for="company">Company:</label>
                        <input name="company" class="py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
                    </div>
                    <div class="flex justify-between items-center">
                        <label for="phone">Phone:</label>
                        <input name="phone" class="py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
                    </div>
                    <div class="flex justify-between items-center">
                        <label for="employees">Employee:</label>
                        <div class="relative flex-grow">
                            <input disabled id="employees" name="employees" class="w-full py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
                            <input class="hidden" id="employee_id" name="employee_id">
                            <button onclick="info($modal_form)" type="button" class="absolute rounded-[4px] right-[5px] top-1/2 -translate-y-1/2 bg-secondary py-[1px] px-[6px] flex items-center gap-[3px] text-[12px]"><i class="fa-solid fa-magnifying-glass text-[10px]"></i>Search</button>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <label for="description">Description:</label>
                        <input name="description" class="py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
                    </div>
                </div>
                <div class="flex justify-between items-center">
                    <button onclick="info($modal_camera)" type="button" class="cursor-pointer flex items-center border-2 border-dark rounded-[8px] font-bold hover:bg-secondary hover:text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] transition-all duration-300 bg-dark text-secondary w-min text-nowrap"><icon class="fa-solid fa-camera size-[16px]"></icon>Scan KTP</button>
                    <button type="submit" class="cursor-pointer flex items-center border-2 border-dark rounded-[8px] font-bold hover:bg-secondary hover:text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] transition-all duration-300 bg-dark text-secondary w-min"><icon class="fa-solid fa-check size-[16px]"></icon>Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div id="modal_form" class="hidden absolute bg-dark/25 h-full w-full top-0 left-0 z-4 flex items-center justify-center">
        <div class="flex bg-secondary flex flex-col gap-[10px] p-[10px] rounded-[10px] text-dark w-fit min-w-1/2 gap-[10px] mx-auto *:font-bold">
            <div class="border-3 border-dark rounded-[10px] overflow-x-auto bg-light text-dark text-center">
                <table class="w-3xl text-[13px] table-fixed">
                    <thead class="bg-dark text-light">
                        <tr class="*:text-start *:py-[8px] *:text-[14px] *:first:rounded-tl-[7px] *:last:rounded-tr-[7px] *:first:pl-[20px]">
                            <th>Name</th>
                            <th>Division</th>
                            <th>Position</th>
                            <th>Select</th>
                        </tr>
                    </thead>
                    <tbody class="*:*:text-start *:*:py-[8px] divide-y-[2px] *:border-dark *:hover:bg-hovered *:*:first:pl-[20px] bg-light *:last:*:first:rounded-bl-[7px] *:last:*:last:rounded-br-[7px] *:last:align-middle *:last:max-w-[210px] *:last:min-w-[150px]">
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->division }}</td>
                                <td>{{ $employee->position }}</td>
                                <td class="**:hover:text-dark **:hover:outline-dark">
                                    <button onclick=" select_employee({{ $employee->id }}, '{{ $employee->name }}')" class="flex items-center w-min font-bold bg-dark text-light rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-dark outline-2 transition-all duration-300 hover:bg-transparent hover:text-secondary">Select</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($employees->count() < 1)
                    <div class="py-[5px] font-bold">
                        No Data.
                    </div>
                @endif
            </div>
            <button class="flex items-center border-2 border-dark rounded-[6px] font-bold hover:bg-secondary hover:text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] transition-all duration-300 bg-dark text-secondary w-min" onclick="close_modal($modal_form)"><icon class="fa-solid fa-arrow-left-long size-[16px]"></icon>Back</button>
        </div>
    </div>
    <div id="modal_camera" class="hidden absolute bg-dark/25 h-full w-full top-0 left-0 z-4 flex items-center justify-center">
        <div class="flex bg-secondary flex flex-col gap-[10px] p-[10px] rounded-[10px] text-dark w-fit min-w-1/2 gap-[10px] mx-auto *:font-bold items-center">
            <div class="text-center text-[20px] font-bold">Scan KTP</div>
            <div id="camera" class="bg-light w-[450px] h-[300px] relative border-3 border-dark">
                <icon class="fa-solid fa-plus text-[32px] absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"></icon>
            </div>
            <button class="size-[50px] bg-primary border-5 border-light rounded-full"></button>
            <div class="flex w-full justify-between">
                <button class="flex items-center border-2 border-dark rounded-[6px] font-bold hover:bg-secondary hover:text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] transition-all duration-300 bg-dark text-secondary w-min" onclick="close_modal($modal_camera)"><icon class="fa-solid fa-arrow-left-long size-[16px]"></icon>Back</button>
                <form action="{{ route('ocr') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="ocr_image" id="">
                    <button type="submit" class="flex items-center border-2 border-dark rounded-[6px] font-bold hover:bg-secondary hover:text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] transition-all duration-300 bg-dark text-secondary w-min text-nowrap" onclick=""><icon class="fa-solid fa-rotate-right size-[16px]"></icon>Reset Camera</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    let $modal_form = $('#modal_form'), $input_employee_id = $('#employee_id'), $input_employee_name = $('#employees'), $modal_camera = $('#modal_camera')
    let info = function(el) { el.removeClass('hidden') }
    let close_modal = function(el) { el.addClass('hidden') }
    let select_employee = function(id, name) {
        $input_employee_name.val(name)
        $input_employee_id.val(id)
        close_modal($modal_form)
    }

</script>

@endpush
