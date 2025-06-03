@extends('layouts.index')
@section('content')
    <form class="mt-[25px] flex justify-end gap-[15px]">
        <div class="group flex items-center font-bold bg-secondary text-dark rounded-[6px] pl-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 has-[input:focus-within]:bg-dark has-[input:focus-within]:text-secondary hover:bg-dark hover:text-secondary">
            <x-fas-magnifying-glass class="size-[16px]"/>
            <input class="group-hover:placeholder:text-secondary group-hover:text-secondary focus:outline-none focus:text-secondary focus:placeholder:text-secondary/75 block min-w-0 grow text-base text-dark placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300" type="text" placeholder="Search Name" size="15">
        </div>
        <div id="select-position" class="min-w-fit group flex items-center font-bold bg-secondary text-dark rounded-[6px] pl-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 *:flex *:items-center" size="15">
            <select class="select-position w-full" style="width: 100%">
                <option value=""></option>
                <option value="position">position 1</option>
                <option value="position">position 2</option>
                <option value="position">position 3</option>
                <option value="position">position 4</option>
                <option value="position">position 5</option>
                <option value="position">position 6</option>
            </select>
        </div>
        <div id="select-division" class="group flex items-center font-bold bg-secondary text-dark rounded-[6px] pl-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 *:flex *:items-center" size="15">
            <select class="select-division w-full" style="width: 100%">
                <option value=""></option>
                <option value="division">Division 1</option>
                <option value="division">Division 2</option>
                <option value="division">Division 3</option>
                <option value="division">Division 4</option>
                <option value="division">Division 5</option>
                <option value="division">Division 6</option>
            </select>
        </div>
        <a class="flex items-center font-bold bg-secondary text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 hover:bg-dark hover:text-secondary" href="{{ route('employee.create') }}"><x-fas-circle-plus class="size-[16px] mr-[5px]"/>Add</a>
    </form>
    <div class="flex flex-col items-center">
        <div class="mt-[20px] mw-full border-3 border-secondary rounded-[10px] overflow-x-auto">
            <table class="w-full text-dark text-[13px] table-fixed">
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
                    <tr>
                        <td>001</td>
                        <td><div class="bg-secondary size-[50px] rounded-[6px]"></div></td>
                        <td>John Doe</td>
                        <td>Raja</td>
                        <td>Aku</td>
                        <td>
                            <div class="flex gap-[10px] items-center justify-start min-w-0 !max-w-[210px] mx-auto flex-wrap">
                                <a class="flex items-center w-min font-bold bg-secondary text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 hover:bg-dark hover:text-secondary" href="{{ route('employee.edit', ['id' => 1]) }}"><x-fas-pen class="size-[16px] mr-[5px]"/>Edit</a>
                                <a class="flex items-center w-min font-bold bg-secondary text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 hover:bg-dark hover:text-secondary" href="{{ route('employee.destroy', ['id' => 1]) }}"><x-fas-trash class="size-[16px] mr-[5px]"/>Delete</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td><div class="bg-secondary size-[50px] rounded-[6px]"></div></td>
                        <td>John Doe</td>
                        <td>Raja</td>
                        <td>Aku</td>
                        <td>
                            <div class="flex gap-[10px] items-center justify-start min-w-0 !max-w-[210px] mx-auto flex-wrap">
                                <a class="flex items-center w-min font-bold bg-secondary text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 hover:bg-dark hover:text-secondary" href="{{ route('employee.edit', ['id' => 1]) }}"><x-fas-pen class="size-[16px] mr-[5px]"/>Edit</a>
                                <a class="flex items-center w-min font-bold bg-secondary text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 hover:bg-dark hover:text-secondary" href="{{ route('employee.destroy', ['id' => 1]) }}"><x-fas-trash class="size-[16px] mr-[5px]"/>Delete</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td><div class="bg-secondary size-[50px] rounded-[6px]"></div></td>
                        <td>John Doe</td>
                        <td>Raja</td>
                        <td>Aku</td>
                        <td>
                            <div class="flex gap-[10px] items-center justify-start min-w-0 !max-w-[210px] mx-auto flex-wrap">
                                <a class="flex items-center w-min font-bold bg-secondary text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 hover:bg-dark hover:text-secondary" href="{{ route('employee.edit', ['id' => 1]) }}"><x-fas-pen class="size-[16px] mr-[5px]"/>Edit</a>
                                <a class="flex items-center w-min font-bold bg-secondary text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 hover:bg-dark hover:text-secondary" href="{{ route('employee.destroy', ['id' => 1]) }}"><x-fas-trash class="size-[16px] mr-[5px]"/>Delete</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td><div class="bg-secondary size-[50px] rounded-[6px]"></div></td>
                        <td>John Doe</td>
                        <td>Raja</td>
                        <td>Aku</td>
                        <td>
                            <div class="flex gap-[10px] items-center justify-start min-w-0 !max-w-[210px] mx-auto flex-wrap">
                                <a class="flex items-center w-min font-bold bg-secondary text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 hover:bg-dark hover:text-secondary" href="{{ route('employee.edit', ['id' => 1]) }}"><x-fas-pen class="size-[16px] mr-[5px]"/>Edit</a>
                                <a class="flex items-center w-min font-bold bg-secondary text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 hover:bg-dark hover:text-secondary" href="{{ route('employee.destroy', ['id' => 1]) }}"><x-fas-trash class="size-[16px] mr-[5px]"/>Delete</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td><div class="bg-secondary size-[50px] rounded-[6px]"></div></td>
                        <td>John Doe</td>
                        <td>Raja</td>
                        <td>Aku</td>
                        <td>
                            <div class="flex gap-[10px] items-center justify-start min-w-0 !max-w-[210px] mx-auto flex-wrap">
                                <a class="flex items-center w-min font-bold bg-secondary text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 hover:bg-dark hover:text-secondary" href="{{ route('employee.edit', ['id' => 1]) }}"><x-fas-pen class="size-[16px] mr-[5px]"/>Edit</a>
                                <a class="flex items-center w-min font-bold bg-secondary text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 hover:bg-dark hover:text-secondary" href="{{ route('employee.destroy', ['id' => 1]) }}"><x-fas-trash class="size-[16px] mr-[5px]"/>Delete</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td><div class="bg-secondary size-[50px] rounded-[6px]"></div></td>
                        <td>John Doe</td>
                        <td>Raja</td>
                        <td>Aku</td>
                        <td>
                            <div class="flex gap-[10px] items-center justify-start min-w-0 !max-w-[210px] mx-auto flex-wrap">
                                <a class="flex items-center w-min font-bold bg-secondary text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 hover:bg-dark hover:text-secondary" href="{{ route('employee.edit', ['id' => 1]) }}"><x-fas-pen class="size-[16px] mr-[5px]"/>Edit</a>
                                <a class="flex items-center w-min font-bold bg-secondary text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 hover:bg-dark hover:text-secondary" href="{{ route('employee.destroy', ['id' => 1]) }}"><x-fas-trash class="size-[16px] mr-[5px]"/>Delete</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td><div class="bg-secondary size-[50px] rounded-[6px]"></div></td>
                        <td>John Doe</td>
                        <td>Raja</td>
                        <td>Aku</td>
                        <td>
                            <div class="flex gap-[10px] items-center justify-start min-w-0 !max-w-[210px] mx-auto flex-wrap">
                                <a class="flex items-center w-min font-bold bg-secondary text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 hover:bg-dark hover:text-secondary" href="{{ route('employee.edit', ['id' => 1]) }}"><x-fas-pen class="size-[16px] mr-[5px]"/>Edit</a>
                                <a class="flex items-center w-min font-bold bg-secondary text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 hover:bg-dark hover:text-secondary" href="{{ route('employee.destroy', ['id' => 1]) }}"><x-fas-trash class="size-[16px] mr-[5px]"/>Delete</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="">
            <div class="text-[18px] border-secondary border-[2px] mt-[10px] rounded-[10px] flex items-center *:first:rounded-l-[8px] *:last:rounded-r-[8px] *:bg-secondary text-dark *h-full *py-[3px] *:px-[12px] *:hover:text-secondary *:hover:bg-dark *:transition-all *:duration-300 border-dark divide-x-[2px]">
                <a href="#" class="py-[4.5px]"><x-fas-chevron-left class="size-[18px]"/></a>
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#" class="py-[4.5px]"><x-fas-chevron-right class="size-[18px]"/></a>
            </div>
        </div>
    </div>
    
    <script type="module">
        
        $(document).ready(function() {
            $('.select-division').select2({
                placeholder: "Select Division",
                theme: 'tailwindcss-3',
                allowClear: true,
                scrollAfterSelect: true,
            })
            $('.select-position').select2({
                placeholder: "Select Position",
                theme: 'tailwindcss-3',
                allowClear: true,
                scrollAfterSelect: true,
            })
        });
    </script>
@endsection