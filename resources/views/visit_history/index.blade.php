@extends('layouts.index')
@section('content')
    <div class="text-[32px] font-semibold">Visitation Lists</div>
    <div class="text-[16px]"></div>
    <form class="mt-[25px] flex justify-end gap-[15px]">
        <div class="group flex items-center font-bold bg-secondary text-dark rounded-[6px] pl-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 has-[input:focus-within]:bg-dark has-[input:focus-within]:text-secondary hover:bg-dark hover:text-secondary">
            <x-fas-magnifying-glass class="size-[16px]"/>
            <input class="group-hover:placeholder:text-secondary group-hover:text-secondary focus:outline-none focus:text-secondary focus:placeholder:text-secondary/75 block min-w-0 grow text-base text-dark placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300" type="text" placeholder="Search Visitation" size="15">
        </div>
        <div class="group flex items-center font-bold bg-secondary text-dark rounded-[6px] pl-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 has-[input:focus-within]:bg-dark has-[input:focus-within]:text-secondary hover:bg-dark hover:text-secondary">
            <x-fas-magnifying-glass class="size-[16px]"/>
            <input class="group-hover:placeholder:text-secondary group-hover:text-secondary focus:outline-none focus:text-secondary focus:placeholder:text-secondary/75 block min-w-0 grow text-base text-dark placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300" type="text" placeholder="Search Company" size="15">
        </div>
        <div class="relative group flex items-center font-bold bg-secondary text-dark rounded-[6px] pl-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 has-[input:focus-within]:bg-dark has-[input:focus-within]:text-secondary hover:bg-dark hover:text-secondary">
            <x-fas-calendar class="size-[16px]"/>
            <input id="inputdate" class="group-hover:placeholder:text-secondary group-hover:text-secondary focus:outline-none focus:text-secondary focus:placeholder:text-secondary/75 block min-w-0 grow text-base text-dark placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300" type="text" placeholder="dd-mm-yyyy" size="10">
            <div id="datepicker" class="absolute h-[6px] w-full top-full left-0"></div>
        </div>
        <a class="flex items-center font-bold bg-secondary text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 hover:bg-dark hover:text-secondary" href="{{ route('employee.create') }}"><x-fas-circle-plus class="size-[16px] mr-[5px]"/>Add</a>
        <div class="group flex flex-col relative gap-[5px]">
            <a class="flex items-center font-bold bg-secondary text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 hover:bg-dark hover:text-secondary" href="{{ route('employee.create') }}"><x-fas-file-arrow-down class="size-[16px]"/>Export<x-fas-angle-down class="size-[16px]"/></a>
            <div class="invisible opacity-0 group-hover:visible group-hover:opacity-100 absolute w-full top-0 pt-[40px] flex flex-col text-dark text-[16px] transition-all duration-300 shadow-lg/30 *:flex *:items-center *:transition-all *:duration-300 *:px-[10px] *:py-[5px] *:bg-secondary *:items-center *:border-2 *:border-secondary *:hover:text-secondary *:hover:bg-dark *:first:rounded-t-lg *:first:border-b-0 *:last:rounded-b-lg *:last:border-t-0">
                <a href="" class=""><x-fas-file-excel class="size-[16px] mr-[5px]"/>Excel</a>
                <a href="" class=""><x-fas-file-pdf class="size-[16px] mr-[5px]"/>PDF</a>
            </div>
        </div>
    </form>
    <div class="mt-[20px] min-w-full border-3 border-secondary rounded-[10px] overflow-x-auto">
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
                </tr>
            </tbody>
        </table>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            flatpickr("#inputdate", {
                dateFormat: "d-m-Y",
                position: "auto center",
                allowInput: true,
                maxDate: "today",
                positionElement: document.querySelector("#datepicker"),
                nextArrow: '<x-fas-angle-right class="size-[18px]"/>',
                prevArrow: '<x-fas-angle-left class="size-[18px]"/>',
            });
        });
    </script>
@endsection