@extends('layouts.index')

@section('content')
    <form action="{{ route('employee.update', $employee->id) }}" method="post" enctype="multipart/form-data" class="bg-secondary flex flex-col gap-[10px] p-[10px] rounded-[10px] text-dark w-fit min-w-1/2 gap-[30px] mx-auto *:font-bold">
        @csrf
        @method('put')
        <div class="text-center text-[20px] font-bold">Edit Employee</div>
        <div class="flex flex-col gap-[10px] *:pb-[10px] *:gap-[20px] *:*:last:!w-3/4 *:*:first:w-1/4 *:*:first:text-bold *:*:first:text-[16px] divide-y-2 border-b-2 border-dark *:flex *:justifybetween *:items-center">
            <div class="flex justify-between items-center">
                <label for="name">Name:</label>
                <input value="{{ $employee->name }}" name="name" class="py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
            </div>
            <div class="flex justify-between items-center">
                <label for="no_id">ID:</label>
                <input value="{{ $employee->no_id }}" name="no_id" class="py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
            </div>
            <div class="flex justify-between items-center">
                <label for="division">Division:</label>
                <div class="w-full py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
                    <select name="division" class="select-division-light">
                        <option value=""></option>
                        @for ($i = 1; $i <= 6; $i++)
                            @if ($employee->division == "division-".$i)
                                <option value="division-{{ $i }}" selected="selected">Division {{ $i }}</option>
                            @else
                                <option value="division-{{ $i }}">Division {{ $i }}</option>
                            @endif
                        @endfor
                    </select>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <label for="position">Position:</label>
                <div class="w-full py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
                    <select name="position" class="select-position-light">
                        <option value=""></option>
                        @for ($i = 1; $i <= 6; $i++)
                            @if ($employee->position == "position-".$i)
                                <option value="position-{{ $i }}" selected="selected">Position {{ $i }}</option>
                            @else
                                <option value="position-{{ $i }}">Position {{ $i }}</option>
                            @endif
                        @endfor
                    </select>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <label for="photo">Photo:</label>
                <input type="file" accept="image/*" name="photo_profile" class="file:border-r-2 file:border-dark file:pr-[5px] py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
            </div>
        </div>
        <div class="flex justify-between items-center">
            <a class="flex items-center border-2 border-dark rounded-[6px] font-bold hover:bg-secondary hover:text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] transition-all duration-300 bg-dark text-secondary w-min" href="{{ route('employee.index') }}"><icon class="fa-solid fa-arrow-left-long size-[16px]"></icon>Back</a>
            <button type="submit" class="cursor-pointer flex items-center border-2 border-dark rounded-[8px] font-bold hover:bg-secondary hover:text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] transition-all duration-300 bg-dark text-secondary w-min"><icon class="fa-solid fa-check size-[16px]"></icon>Submit</button>
        </div>
    </form>
@endsection