@extends('layouts.index')

@section('content')
    <div class="flex mt-[25px] items-end ml-[20px]">
        <div class="w-full text-start text-light font-medium w-max">
            <div class="text-[20px] font-bold text-nowrap">Data Employees</div>
            <div class="text-[14px]">Total Employee: {{ $employees->count() }}</div>
        </div>
        <form class="flex justify-end gap-[15px] w-full h-min items-center flex-wrap *:flex *:items-center *:font-bold *:bg-secondary *:text-dark *:rounded-[6px] *:px-[16px] *:py-[6px] *:has-[select]:pr-[0px] *:gap-[5px] *:outline-secondary *:outline-2 *:transition-all *:duration-300">
            @csrf
            @include('layouts._input_search', ['placeholder' => 'Search Name', 'name' => 'name', 'size' => '15'])
            <div class="min-w-fit group *:flex *:items-centerc *:last:has-[span]:[&.select2-container--open]:bg-dark *:last:has-[span]:[&.select2-container--open]:**:!text-secondary *:last:has-[span]:[&.select2-container--open]:**:has-[b]:*:content-['halo']" size="15">
                <select name="position" class="select-position-secondary">
                    <option value=""></option>
                    <option value="position">position 1</option>
                    <option value="position">position 2</option>
                    <option value="position">position 3</option>
                    <option value="position">position 4</option>
                    <option value="position">position 5</option>
                    <option value="position">position 6</option>
                </select>
            </div>
            <div class="group *:flex *:items-center" size="15">
                <select name="division" class="select-division-secondary">
                    <option value=""></option>
                    <option value="division">Division 1</option>
                    <option value="division">Division 2</option>
                    <option value="division">Division 3</option>
                    <option value="division">Division 4</option>
                    <option value="division">Division 5</option>
                    <option value="division">Division 6</option>
                </select>
            </div>
            @include('layouts._btn_a', ['route' => 'employee.create', 'icon' => 'circle-plus', 'text' => 'Add'])
        </form>
    </div>
    <div class="mt-[20px] flex flex-col items-center gap-[10px]">
        <div class="mw-full border-3 border-secondary rounded-[10px] overflow-x-auto bg-light text-dark">
            <table class="w-full text-[13px] table-fixed">
                <thead class="bg-secondary">
                    <tr class="*:text-start *:py-[8px] *:text-[14px] *:first:rounded-tl-[7px] *:last:rounded-tr-[7px] *:first:pl-[20px]">
                        <th>ID</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Division</th>
                        <th class="!max-w-[210px]">Action</th>
                    </tr>
                </thead>
                <tbody class="*:*:text-start *:*:py-[8px] divide-y-[2px] *:border-secondary *:hover:bg-hovered *:*:first:pl-[20px] bg-light *:last:*:first:rounded-bl-[7px] *:last:*:last:rounded-br-[7px] *:last:align-middle *:last:max-w-[210px] *:last:min-w-[150px]">
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->no_id }}</td>
                            <td><a href="{{ Storage::url($employee->photo) }}" target="_blank"><img src="{{ Storage::url($employee->photo) }}" class="size-[32px] mr-[5px] p-[5px] rounded-[6px] bg-secondary text-dark"></a></td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->position }}</td>
                            <td>{{ $employee->division }}</td>
                            <td class="**:hover:text-dark **:hover:outline-dark">
                                <div class="flex gap-[10px] items-center justify-start min-w-0 !max-w-[210px] mx-auto flex-wrap">
                                    <a class="flex items-center w-min font-bold bg-secondary text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 hover:bg-transparent hover:text-secondary" href="{{ route('employee.edit', $employee->id) }}"><i class="fa-solid fa-pen font-[16px] mr-[5px]"></i>Edit</a>
                                    <a onclick="delete_data({{ $employee->id }})" class="flex items-center w-min font-bold bg-secondary text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 hover:bg-transparent hover:text-secondary" href="javascript:void(0)"><i class="fa-solid fa-trash font-[16px] mr-[5px]"></i>Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @include('layouts._pagination')
    </div>
@endsection

@push('scripts')
    <script>
        let delete_data = (id) => {
            $.post("{{ url('employee') }}/" + id, {_token: "{{ csrf_token() }}", _method: "delete"}, () => {
                window.location.reload();
            })
        }
    </script>
@endpush