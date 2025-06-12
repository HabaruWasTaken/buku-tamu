@extends('layouts.index')

@section('content')
    <div class="flex items-end ml-[20px]">
        <div class="w-full text-start text-light font-medium w-max">
            <div class="text-[20px] font-bold text-nowrap">Data Visit Histories</div>
            <div class="text-[14px]">Total Visitations: {{ $visitHistories->count() }}</div>
        </div>
        <form method="get" class="mb-[2px] flex justify-end gap-[10px] w-full h-min items-center flex-wrap flex justify-end gap-[15px] w-full h-min items-center flex-wrap *:not-has-[a]:flex *:not-has-[a]:items-center *:not-has-[a]:font-bold *:not-has-[a]:bg-secondary *:not-has-[a]:text-dark *:not-has-[a]:rounded-[6px] *:not-has-[a]:px-[16px] *:not-has-[a]:py-[6px] *:not-has-[a]:has-[select]:pr-[0px] *:not-has-[a]:gap-[5px] *:not-has-[a]:outline-secondary *:not-has-[a]:outline-2 *:not-has-[a]:transition-all *:not-has-[a]:duration-300">
            <div class="group has-[input:focus-within]:bg-dark has-[input:focus-within]:text-secondary hover:bg-dark hover:text-secondary">
                <i class="fa-solid fa-magnifying-glass text-[16px]"></i>
                <input name="name" value="{{ request('name') }}" class="group-hover:placeholder:text-secondary group-hover:text-secondary focus:outline-none focus:text-secondary focus:placeholder:text-secondary/75 block min-w-0 grow text-base text-dark placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300" placeholder="Search Name" size="10">
            </div>
            <div class="group has-[input:focus-within]:bg-dark has-[input:focus-within]:text-secondary hover:bg-dark hover:text-secondary">
                <i class="fa-solid fa-magnifying-glass text-[16px]"></i>
                <input name="company" value="{{ request('company') }}" class="group-hover:placeholder:text-secondary group-hover:text-secondary focus:outline-none focus:text-secondary focus:placeholder:text-secondary/75 block min-w-0 grow text-base text-dark placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300" placeholder="Search Company" size="13">
            </div>
            <div class="relative group has-[input:focus-within]:bg-dark has-[input:focus-within]:text-secondary hover:bg-dark hover:text-secondary">
                <icon class="fa-solid fa-calendar text-[16px]"></icon>
                <input name="date" id="inputdate"  value="{{ format_date(request('date')) }}" class="group-hover:placeholder:text-secondary group-hover:text-secondary focus:outline-none focus:text-secondary focus:placeholder:text-secondary/75 block min-w-0 grow text-base text-dark placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300" placeholder="Date" size="10">
                <div id="datepicker" class="absolute h-[6px] w-full top-full left-0"></div>
            </div>
            <div class="relative group has-[input:focus-within]:bg-dark has-[input:focus-within]:text-secondary hover:bg-dark hover:text-secondary">
                <icon class="fa-solid fa-calendar text-[16px]"></icon>
                <input name="range" id="inputrange"  value="{{ request('range') }}" class="group-hover:placeholder:text-secondary group-hover:text-secondary focus:outline-none focus:text-secondary focus:placeholder:text-secondary/75 block min-w-0 grow text-base text-dark placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300" placeholder="Range Date" size="10">
                <div id="rangepicker" class="absolute h-[6px] w-full top-full left-0"></div>
            </div>
            <button type="submit">Search</button>

            @include('layouts._btn_a', ['route' => 'visit_history.create', 'icon' => 'circle-plus', 'text' => 'Add'])
            
            <div class="group flex flex-col relative gap-[5px]">
                <a class="flex items-center font-bold bg-secondary text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 hover:bg-dark hover:text-secondary" href=""><icon class="fa-solid fa-file-arrow-down text-[16px]"></icon>Export<icon class="fa-solid fa-angle-down text-[16px]"></icon></a>
                <div class="invisible opacity-0 group-hover:visible group-hover:opacity-100 absolute w-full top-0 pt-[40px] flex flex-col text-dark text-[16px] transition-all duration-300 shadow-lg/30 *:flex *:items-center *:transition-all *:duration-300 *:px-[10px] *:py-[5px] *:bg-secondary *:items-center *:border-2 *:border-secondary *:hover:text-secondary *:hover:bg-dark *:first:rounded-t-lg *:first:border-b-0 *:last:rounded-b-lg *:last:border-t-0">
                    <a href="" class=""><icon class="fa-solid fa-file-excel text-[16px] mr-[5px]"></icon>Excel</a>
                    <a href="" class=""><icon class="fa-solid fa-file-pdf text-[16px] mr-[5px]"></icon>PDF</a>
                </div>
            </div>
        </form>
    </div>
    <div class="mt-[10px] flex flex-col items-center gap-[10px]">
        <div class="min-w-full border-3 border-secondary rounded-[10px] overflow-x-auto">
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
                                    <a onclick="toggle_modal()" class="flex items-center w-min font-bold bg-secondary text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 hover:bg-transparent hover:text-secondary" href="javascript:void(0)"><i class="fa-solid fa-circle-plus font-[16px] mr-[5px]"></i>Add</a>
                                    <div id="add_modal" onclick="toggle_modal()" class="absolute bg-dark/25 hidden h-full w-full top-0 left-0 z-4 flex items-center justify-center">
                                        <form action="{{ route('visit_history.update', $visitHistory->id) }}" method="post" onclick="toggle_modal()" class="flex flex-col gap-[10px] items-center bg-secondary p-[10px] rounded-[6px]">
                                            @csrf
                                            @method('put')
                                            <div class="text-center text-[20px] font-bold">Add Time Out</div>
                                            <div class="flex justify-between items-center gap-[5px]">
                                                <label for="time_out">Time Out:</label>
                                                <input id="timepicker" name="time_out" class="py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
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
        </div>
        
        {{ $visitHistories->links() }}
    </div>
@endsection

@push('scripts')
    <script type="module">
        $(document).ready(function () {
            flatpickr("#inputdate", {
                dateFormat: "d-m-Y",
                position: "auto center",
                allowInput: true,
                maxDate: "today",
                positionElement: document.querySelector("#datepicker"),
                nextArrow: '<icon class="fa-solid fa-angle-right size-[18px]"></icon>',
                prevArrow: '<icon class="fa-solid fa-angle-left size-[18px]"></icon>',
            });
            flatpickr("#inputrange", {
                mode: "range",
                dateFormat: "d-m-Y",
                position: "auto center",
                allowInput: true,
                maxDate: "today",
                positionElement: document.querySelector("#rangepicker"),
                nextArrow: '<icon class="fa-solid fa-angle-right size-[18px]"></icon>',
                prevArrow: '<icon class="fa-solid fa-angle-left size-[18px]"></icon>',
            });
            flatpickr("#timepicker", {
                enableTime: true,
                allowInput: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                // defaultHour: flatpickr.formatDate(new Date(), "h"),
                // defaultMinute: flatpickr.formatDate(new Date(), "i")
            });
        });
    </script>
    <script>
        const delete_data = (id) => {
            $.post("{{ url('visit_history') }}/" + id, { _token: "{{ csrf_token() }}", _method: "delete" }, () => {
                window.location.reload();
            })
        }

        const toggle_modal = () => {
            $('#add_modal').toggleClass('hidden');
        }
    </script>
@endpush