@extends('layouts.index')

@section('content')
    <div class="flex items-end ml-[20px]">
        <div class="w-full text-start text-light font-medium w-max">
            <div class="text-[20px] font-bold text-nowrap">Data Employees</div>
            <div class="text-[14px]">Total Employee: <span id="total_employee">-</span></div>
        </div>
        <form id="form_search" class="mb-[2px] flex justify-end gap-[10px] w-full h-min items-center flex-wrap *:flex *:items-center *:font-bold *:bg-secondary *:text-dark *:rounded-[6px] *:px-[16px] *:py-[6px] *:has-[select]:pr-[0px] *:gap-[5px] *:outline-secondary *:outline-2 *:transition-all *:duration-300">
            @csrf
            <div class="group has-[input:focus-within]:bg-dark has-[input:focus-within]:text-secondary hover:bg-dark hover:text-secondary">
                <i class="fa-solid fa-magnifying-glass text-[16px]"></i>
                <input name="no_id" value="{{ request('no_id') }}" class="group-hover:placeholder:text-secondary group-hover:text-secondary focus:outline-none focus:text-secondary focus:placeholder:text-secondary/75 block min-w-0 grow text-base text-dark placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300" placeholder="Search No ID" size="15">
            </div>
            <div class="group has-[input:focus-within]:bg-dark has-[input:focus-within]:text-secondary hover:bg-dark hover:text-secondary">
                <i class="fa-solid fa-magnifying-glass text-[16px]"></i>
                <input name="name" value="{{ request('name') }}"  class="group-hover:placeholder:text-secondary group-hover:text-secondary focus:outline-none focus:text-secondary focus:placeholder:text-secondary/75 block min-w-0 grow text-base text-dark placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300" placeholder="Search Name" size="15">
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
            <button onclick="info()" class="flex items-center w-min font-bold bg-secondary text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 hover:bg-transparent hover:text-secondary" ><i class="fa-solid fa-circle-plus font-[16px] mr-[5px]"></i>Add</button>

        </form>
    </div>
    <div id="table" class="mt-[10px] flex flex-col items-center gap-[10px]">
        
    </div>
    <div id="modal_form" class="hidden absolute bg-dark/25 h-full w-full top-0 left-0 z-4 flex items-center justify-center">
    </div>
@endsection

@section('notif')
    <div id="notif" class="rounded-[6px] font-bold opacity-0 transition-all ease-in-out duration-75 py-[6px] px-[12px] bg-light text-dark border-[3px] border-secondary z-2 w-fit text-center absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2">a</div>
@endsection

@push('scripts')
    <script>
        let $table = $('#table'),
            $form_search = $('#form_search'),
            $modal = $('#modal_form'),
            $notif = $('#notif')

        let show = function($el) {
            $el.removeClass('opacity-0').addClass('opacity-100');
        }

        let hide = function($el) {
            $el.removeClass('opacity-100').addClass('opacity-0');
        }
        
        let selected_page = 1, _token = '{{ csrf_token() }}', base_url = '{{ route("employee.index") }}', params_url = '{{ $params ?? '' }}'

        let init = function() { 
            $modal.html('');
            search_data(selected_page);
            $modal.addClass('hidden');
        }

        let search_data = function(page = 1) {
            let data = get_form_data($form_search)
            data.paginate = 10
            data.page = selected_page = get_selected_page(page, selected_page)
            $.post(base_url + '/search?' + params_url, data, (result) => $table.html(result)).fail((xhr) => $table.html(xhr.responseText))
        }

        let info = function(id = '') {
            $.get(base_url + '/' + (id === '' ? 'create' : (id + '/edit')), (result) => {
                $modal.html(result);
                $modal.removeClass('hidden')
            }).fail((xhr) => {
                $modal.html(xhr.responseText);
                $modal.removeClass('hidden')
            })
        }

        let notificationTimeoutId = null;

        let notif = function(msg) { 
            if (notificationTimeoutId !== null) {
                clearTimeout(notificationTimeoutId);
                notificationTimeoutId = null;
            }
            $notif.html('');
            $notif.html(msg);
            show($notif)
            console.log('muncul')
            notificationTimeoutId = setTimeout(() => {
                console.log('hilang')
                hide($notif)
                notificationTimeoutId = null;
            }, 6000);
        }

        let delete_data = (id) => {
            $.post(base_url + "/" + id, {_token, _method: "delete"}, (res) => {
                if (res.error) {
                    notif(res.error)  
                } 
                init()
            }).fail((xhr)=>$table.html(xhr.responseText))
        }

        $form_search.submit((e) => {
            e.preventDefault();
            search_data();
        });

        init();
    </script>
@endpush