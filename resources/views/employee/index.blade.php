@extends('layouts.index')

@section('content')
    <div class="flex items-end ml-[20px]">
        <div class="w-full text-start text-light font-medium w-max">
            <div class="text-[20px] font-bold text-nowrap">Data Employees</div>
            <div class="text-[14px]">Total Employee: {{ $employees->count() }}</div>
        </div>
        <form method="get" class="mb-[2px] flex justify-end gap-[10px] w-full h-min items-center flex-wrap *:flex *:items-center *:font-bold *:bg-secondary *:text-dark *:rounded-[6px] *:px-[16px] *:py-[6px] *:has-[select]:pr-[0px] *:gap-[5px] *:outline-secondary *:outline-2 *:transition-all *:duration-300">
            <div class="group has-[input:focus-within]:bg-dark has-[input:focus-within]:text-secondary hover:bg-dark hover:text-secondary">
                <i class="fa-solid fa-magnifying-glass text-[16px]"></i>
                <input name="no_id" value="{{ request('no_id') }}" class="group-hover:placeholder:text-secondary group-hover:text-secondary focus:outline-none focus:text-secondary focus:placeholder:text-secondary/75 block min-w-0 grow text-base text-dark placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300" placeholder="Search No ID" size="15">
            </div>
            <div class="group has-[input:focus-within]:bg-dark has-[input:focus-within]:text-secondary hover:bg-dark hover:text-secondary">
                <i class="fa-solid fa-magnifying-glass text-[16px]"></i>
                <input name="name" value="{{ request('name') }}" class="group-hover:placeholder:text-secondary group-hover:text-secondary focus:outline-none focus:text-secondary focus:placeholder:text-secondary/75 block min-w-0 grow text-base text-dark placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300" placeholder="Search Name" size="15">
            </div>
            <div class="group *:flex *:items-center" size="15">
                <select name="division" class="select-division-secondary">
                    <option value=""></option>
                    @for ($i = 1; $i <= 6; $i++)
                        @if (request('division') == "division-".$i)
                            <option value="division-{{ $i }}" selected="selected">Division {{ $i }}</option>
                        @else
                            <option value="division-{{ $i }}">Division {{ $i }}</option>
                        @endif
                    @endfor
                </select>
            </div>
            <div class="min-w-fit group *:flex *:items-center" size="15">
                <select name="position" class="select-position-secondary">
                    <option value=""></option>
                    @for ($i = 1; $i <= 6; $i++)
                        @if (request('position') == "position-".$i)
                            <option value="position-{{ $i }}" selected="selected">Position {{ $i }}</option>
                        @else
                            <option value="position-{{ $i }}">Position {{ $i }}</option>
                        @endif
                    @endfor
                </select>
            </div>
            <button type="submit">Search</button>
            @include('layouts._btn_a', ['route' => 'employee.create', 'icon' => 'circle-plus', 'text' => 'Add'])
        </form>
    </div>
    <div class="mt-[10px] flex flex-col items-center gap-[10px]">
        <div class="mw-full border-3 border-secondary rounded-[10px] overflow-x-auto bg-light text-dark">
            <table class="w-full text-[13px] table-fixed">
                <thead class="bg-secondary">
                    <tr class="*:text-start *:py-[8px] *:text-[14px] *:first:rounded-tl-[7px] *:last:rounded-tr-[7px] *:first:pl-[20px]">
                        <th>No ID</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Division</th>
                        <th>Position</th>
                        <th class="!max-w-[210px]">Action</th>
                    </tr>
                </thead>
                <tbody class="*:*:text-start *:*:py-[8px] divide-y-[2px] *:border-secondary *:hover:bg-hovered *:*:first:pl-[20px] bg-light *:last:*:first:rounded-bl-[7px] *:last:*:last:rounded-br-[7px] *:last:align-middle *:last:max-w-[210px] *:last:min-w-[150px]">
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->no_id }}</td>
                            <td><a href="{{ Storage::url($employee->photo) }}" target="_blank"><img src="{{ Storage::url($employee->photo) }}" class="size-[32px] mr-[5px] p-[5px] rounded-[6px] bg-secondary text-dark"></a></td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->division }}</td>
                            <td>{{ $employee->position }}</td>
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

        {{ $employees->links() }}
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