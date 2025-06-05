@extends('layouts.index')

@section('content')
    <div class="flex mt-[25px] items-end ml-[20px]">

        @include('layouts._table_header', ['name' => 'Data Visit Histories', 'item' => 'Visitations', 'total' => 1])
        
        <form class="flex justify-end gap-[15px] w-full h-min items-center flex-wrap flex justify-end gap-[15px] w-full h-min items-center flex-wrap *:not-has-[a]:flex *:not-has-[a]:items-center *:not-has-[a]:font-bold *:not-has-[a]:bg-secondary *:not-has-[a]:text-dark *:not-has-[a]:rounded-[6px] *:not-has-[a]:px-[16px] *:not-has-[a]:py-[6px] *:not-has-[a]:has-[select]:pr-[0px] *:not-has-[a]:gap-[5px] *:not-has-[a]:outline-secondary *:not-has-[a]:outline-2 *:not-has-[a]:transition-all *:not-has-[a]:duration-300">

            @include('layouts._input_search', ['placeholder' => 'Search Visitation', 'name' => 'visitation', 'size' => '15'])

            @include('layouts._input_search', ['placeholder' => 'Search Company', 'name' => 'company', 'size' => '15'])
            
            <div class="relative group has-[input:focus-within]:bg-dark has-[input:focus-within]:text-secondary hover:bg-dark hover:text-secondary">
                <icon class="fa-solid fa-calendar text-[16px]"></icon>
                <input name="date" id="inputdate" class="group-hover:placeholder:text-secondary group-hover:text-secondary focus:outline-none focus:text-secondary focus:placeholder:text-secondary/75 block min-w-0 grow text-base text-dark placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300" placeholder="dd-mm-yyyy" size="10">
                <div id="datepicker" class="absolute h-[6px] w-full top-full left-0"></div>
            </div>

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
    <div class="mt-[20px] flex flex-col items-center gap-[10px]">
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
                    <tr>
                        <td>2023-10-01</td>
                        <td>08:00</td>
                        <td>17:00</td>
                        <td>John Doe</td>
                        <td>ABC Corp</td>
                        <td>1234567890</td>
                        <td>Jane Smith</td>
                        <td>Meeting</td>
                        @include('layouts._table_actions', ['buttons' => 'delete', 'model' => 'visit_history'])
                    </tr>
                </tbody>
            </table>
        </div>
        
        @include('layouts._pagination')

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
        });
    </script>
@endpush