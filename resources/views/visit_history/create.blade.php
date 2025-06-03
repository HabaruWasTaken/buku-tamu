@extends('layouts.index')

@section('content')
    <form class="bg-secondary flex flex-col gap-[10px] p-[10px] rounded-[10px] text-dark w-fit min-w-1/2 gap-[30px] mx-auto *:font-bold" action="">
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
                <label for="timeIn">Time In:</label>
                <input id="timepicker" name="timeIn" class="py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
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
                    <select name="employee" class="select-employee">
                        <option value=""></option>
                        <option value="employee">employee 1</option>
                        <option value="employee">employee 2</option>
                        <option value="employee">employee 3</option>
                        <option value="employee">employee 4</option>
                        <option value="employee">employee 5</option>
                        <option value="employee">employee 6</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <label for="description">Description:</label>
                <input name="description" class="py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
            </div>
        </div>
        <div class="flex justify-between items-center">
            <a class="flex items-center border-2 border-dark rounded-[6px] font-bold hover:bg-secondary hover:text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 bg-dark text-secondary w-min" href="{{ route('visit_history.index') }}"><x-fas-arrow-left-long class="size-[18px]"/>Back</a>
            <button type="submit" class="cursor-pointer flex items-center border-2 border-dark rounded-[8px] font-bold hover:bg-secondary hover:text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 bg-dark text-secondary w-min"><x-fas-check class="size-[16px]"/> Submit</button>
        </div>
    </form>
@endsection

@push('scripts')
    <script type="module">
        $(document).ready(function() {
            console.log('test')
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
            $('.select-employee').select2({
                placeholder: "Select Employee",
                theme: 'tailwindcss-2',
                allowClear: true,
                scrollAfterSelect: true,
                width: '100%',
            });
        });
    </script>
@endpush