@extends('layouts.index')

@section('content')
<form action="{{ route('employee.store') }}" method="post" class="bg-secondary flex flex-col gap-[10px] p-[10px] rounded-[10px] text-dark w-fit min-w-1/2 gap-[30px] mx-auto *:font-bold">
    @csrf
    <div class="text-center text-[20px] font-bold">Create New Employee</div>
    <div class="flex flex-col gap-[10px] *:pb-[10px] *:gap-[20px] *:*:last:!w-3/4 *:*:first:w-1/4 *:*:first:text-bold *:*:first:text-[16px] divide-y-2 border-b-2 border-dark *:flex *:justifybetween *:items-center">
        <div class="flex justify-between items-center">
            <label for="name">Name:</label>
            <input name="name" class="py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
        </div>
        <div class="flex justify-between items-center">
            <label for="no_id">ID:</label>
            <input name="no_id" class="py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
        </div>
        <div class="flex justify-between items-center">
            <label for="division">Division:</label>
            <div class="w-full py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
                <select name="division" class="select-division-light">
                    <option value=""></option>
                    <option value="division-1">Division 1</option>
                    <option value="division-2">Division 2</option>
                    <option value="division-3">Division 3</option>
                    <option value="division-4">Division 4</option>
                    <option value="division-5">Division 5</option>
                    <option value="division-6">Division 6</option>
                </select>
            </div>
        </div>
        <div class="flex justify-between items-center">
            <label for="position">Position:</label>
            <div class="w-full py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
                <select name="position" class="select-position-light">
                    <option value=""></option>
                    <option value="position-1">Position 1</option>
                    <option value="position-2">Position 2</option>
                    <option value="position-3">Position 3</option>
                    <option value="position-4">Position 4</option>
                    <option value="position-5">Position 5</option>
                    <option value="position-6">Position 6</option>
                </select>
            </div>
        </div>
        <div class="flex justify-between items-center">
            <label for="photo">Photo:</label>
            <input name="photo" class="file:border-r-2 file:border-dark file:pr-[5px] py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300" type="file">
        </div>
    </div>
    <div class="flex justify-between items-center">
        <a class="flex items-center border-2 border-dark rounded-[6px] font-bold hover:bg-secondary hover:text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 bg-dark text-secondary w-min" href="{{ route('employee.index') }}"><icon class="fa-solid fa-arrow-left-long size-[16px]"></icon>Back</a>
        <button type="submit" class="cursor-pointer flex items-center border-2 border-dark rounded-[8px] font-bold hover:bg-secondary hover:text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 bg-dark text-secondary w-min"><icon class="fa-solid fa-check size-[16px]"></icon>Submit</button>
    </div>
</form>
@endsection