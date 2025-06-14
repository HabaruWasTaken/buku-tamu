@extends('layouts.index')

@section('content')
    <form action="{{ route('visit_history.store' )}}" method="post"class="bg-secondary flex flex-col gap-[10px] p-[10px] rounded-[10px] text-dark w-fit min-w-1/2 gap-[30px] mx-auto *:font-bold" action="">
        @csrf
        <div class="text-center text-[20px] font-bold">Create New Visit History</div>
        <div class="flex flex-col gap-[10px] *:pb-[10px] *:gap-[20px] *:*:last:w-3/4 *:*:first:w-1/4 divide-y-2 border-b-2 border-dark *:flex *:justifybetween *:items-center">
            <div class="flex justify-between items-center">
                <label for="name">Name:</label>
                <input name="name" class="py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
            </div>
            <div class="flex justify-between items-center">
                <label for="date">Date:</label>
                <input id="datepicker" name="date" class="py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
            </div>
            <div class="flex justify-between items-center">
                <label for="time">Time In:</label>
                <input id="timepicker" name="time" class="py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
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
                <label for="position">Employee:</label>
                <div class="w-full py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
                    <select name="employee_id" class="select-employee-light">
                        <option value=""></option>
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <label for="description">Description:</label>
                <input name="description" class="py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
            </div>
        </div>
        <div class="flex justify-between items-center">
            <a class="flex items-center border-2 border-dark rounded-[6px] font-bold hover:bg-secondary hover:text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 bg-dark text-secondary w-min" href="{{ route('visit_history.index') }}"><icon class="fa-solid fa-arrow-left-long size-[16px]"></icon>Back</a>
            <button type="submit" class="cursor-pointer flex items-center border-2 border-dark rounded-[8px] font-bold hover:bg-secondary hover:text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 bg-dark text-secondary w-min"><icon class="fa-solid fa-check size-[16px]"></icon>Submit</button>
        </div>
    </form>
@endsection

@push('scripts')
    <script type="module">
        $(document).ready(function() {
            flatpickr("#timepicker", {
                enableTime: true,
                allowInput: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                defaultDate: flatpickr.formatDate(new Date(), "H:i")
                // defaultHour: flatpickr.formatDate(new Date(), "h"),
                // defaultMinute: flatpickr.formatDate(new Date(), "i")
            });
            flatpickr("#datepicker", {
                dateFormat: "d-m-Y",
                position: "auto center",
                allowInput: true,
                maxDate: "today",
                positionElement: document.querySelector("#datepicker"),
                nextArrow: '<icon class="fa-solid fa-angle-right size-[18px]"></icon>',
                prevArrow: '<icon class="fa-solid fa-angle-left size-[18px]"></icon>',
                defaultDate: flatpickr.formatDate(new Date(), "d-m-Y"),
            });
        });
    </script>
@endpush