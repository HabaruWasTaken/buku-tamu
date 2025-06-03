@extends('layouts.index')
@section('content')
    <form class="bg-secondary flex flex-col gap-[10px] p-[10px] rounded-[10px] text-dark w-fit min-w-1/2 gap-[30px] mx-auto *:font-bold" action="">
        <h1 class="text-center text-[20px] font-bold">Create New Visit History</h1>
        <div class="flex flex-col gap-[10px] *:pb-[10px] *:gap-[20px] *:*:last:w-3/4 *:*:first:w-1/4 divide-y-2 border-b-2 border-dark *:flex *:justifybetween *:items-center">
            <div class="flex justify-between items-center">
                <label for="name">Name:</label>
                <input name="name" class="py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300" type="text">
            </div>
            <div class="flex justify-between items-center">
                <label for="date">Date:</label>
                <input id="datepicker" name="date" class="py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300" type="text">
            </div>
            <div class="flex justify-between items-center">
                <label for="timeIn">Time In:</label>
                <input id="timepicker" name="timeIn" class="py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300" type="text">
            </div>
            <div class="flex justify-between items-center">
                <label for="company">Company:</label>
                <input name="company" class="py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300" type="text">
            </div>
            <div class="flex justify-between items-center">
                <label for="phone">Phone:</label>
                <input name="phone" class="py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300" type="text">
            </div>
            <div class="flex justify-between items-center">
                <label for="employee">Employee:</label>
                <div class="group/employee flex flex-col relative">
                    <input list="employee-list" name="employee" class="py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300 z-2">
                    <datalist id="employee-list" class="invisible opacity-0 group-hover/employee:visible group-hover/employee:opacity-100 absolute w-full top-0 pt-[35px] flex flex-col text-primary text-[16px] transition-all duration-300 *:flex *:items-center *:transition-all *:duration-300 *:px-[10px] *:py-[5px] *:bg-secondary *:items-center *:border-2 *:border-secondary *:hover:text-secondary *:hover:bg-primary *:first:rounded-t-lg *:first:border-b-0 *:last:rounded-b-lg *:last:border-t-0">
                        <option class="bg-secondary" value="Evan"></option>
                    </datalist>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <label for="description">Description:</label>
                <input name="description" class="py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300" type="text">
            </div>
        </div>
        <div class="flex justify-between items-center">
            <a class="flex items-center border-2 border-dark rounded-[6px] font-bold hover:bg-secondary hover:text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 bg-dark text-secondary w-min" href="{{ route('visit_history.index') }}"><x-fas-arrow-left-long class="size-[18px]"/>Back</a>
            <button type="submit" class="cursor-pointer flex items-center border-2 border-dark rounded-[8px] font-bold hover:bg-secondary hover:text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 bg-dark text-secondary w-min"><x-fas-check class="size-[16px]"/> Submit</button>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#timepicker", {
                enableTime: true,
                allowInput: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                defaultDate: flatpickr.formatDate(new Date(), "h:i")
                // defaultHour: flatpickr.formatDate(new Date(), "h"),
                // defaultMinute: flatpickr.formatDate(new Date(), "i")
            });
            flatpickr("#datepicker", {
                dateFormat: "d-m-Y",
                position: "auto center",
                allowInput: true,
                maxDate: "today",
                positionElement: document.querySelector("#datepicker"),
                nextArrow: '<x-fas-angle-right class="size-[18px]"/>',
                prevArrow: '<x-fas-angle-left class="size-[18px]"/>',
                defaultDate: flatpickr.formatDate(new Date(), "d-m-Y"),
            });
        });
    </script>
@endsection