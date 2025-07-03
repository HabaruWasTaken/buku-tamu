@extends('layouts.index')

@section('content')
    <div class="flex items-end ml-[20px]">
        <div class="w-full text-start text-light font-medium w-max">
            <div class="text-[20px] font-bold text-nowrap">Data Visit Histories</div>
            <div class="text-[14px]">Total Visitations: <span id="total_visit">-</span></div>
        </div>
        <form id="form_search" class="mb-[2px] flex justify-end gap-[10px] w-full h-min items-center flex-wrap-reverse flex justify-end gap-[15px] w-full h-min items-center flex-wrap *:not-has-[a]:flex *:not-has-[a]:items-center *:not-has-[a]:font-bold *:not-has-[a]:bg-secondary *:not-has-[a]:text-dark *:not-has-[a]:rounded-[6px] *:not-has-[a]:px-[16px] *:not-has-[a]:py-[6px] *:not-has-[a]:has-[select]:pr-[0px] *:not-has-[a]:gap-[5px] *:not-has-[a]:outline-secondary *:not-has-[a]:outline-2 *:not-has-[a]:transition-all *:not-has-[a]:duration-300">
            @csrf
            <div class="group has-[input:focus-within]:bg-dark has-[input:focus-within]:text-secondary hover:bg-dark hover:text-secondary">
                <i class="fa-solid fa-magnifying-glass text-[16px]"></i>
                <input name="name" value="{{ request('name') }}" class="group-hover:placeholder:text-secondary group-hover:text-secondary focus:outline-none focus:text-secondary focus:placeholder:text-secondary/75 block min-w-0 grow text-base text-dark placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300" placeholder="Search Name" size="10">
            </div>
            <div class="group has-[input:focus-within]:bg-dark has-[input:focus-within]:text-secondary hover:bg-dark hover:text-secondary">
                <i class="fa-solid fa-magnifying-glass text-[16px]"></i>
                <input name="employee_name" value="{{ request('employee_name') }}" class="group-hover:placeholder:text-secondary group-hover:text-secondary focus:outline-none focus:text-secondary focus:placeholder:text-secondary/75 block min-w-0 grow text-base text-dark placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300" placeholder="Search Employee" size="13">
            </div>
            <div class="group has-[input:focus-within]:bg-dark has-[input:focus-within]:text-secondary hover:bg-dark hover:text-secondary">
                <i class="fa-solid fa-magnifying-glass text-[16px]"></i>
                <input name="company" value="{{ request('company') }}" class="group-hover:placeholder:text-secondary group-hover:text-secondary focus:outline-none focus:text-secondary focus:placeholder:text-secondary/75 block min-w-0 grow text-base text-dark placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300" placeholder="Search Company" size="13">
            </div>
            <div class="relative group has-[input:focus-within]:bg-dark has-[input:focus-within]:text-secondary hover:bg-dark hover:text-secondary">
                <icon class="fa-solid fa-calendar text-[16px]"></icon>
                <input name="date" id="inputdate"  value="{{ format_date(request('date')) }}" class="group-hover:placeholder:text-secondary group-hover:text-secondary focus:outline-none focus:text-secondary focus:placeholder:text-secondary/75 block min-w-0 grow text-base text-dark placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300" placeholder="Date" size="7">
                <div id="datepicker" class="absolute h-[6px] w-full top-full left-0"></div>
            </div>
            <div class="relative group has-[input:focus-within]:bg-dark has-[input:focus-within]:text-secondary hover:bg-dark hover:text-secondary">
                <icon class="fa-solid fa-calendar text-[16px]"></icon>
                <input name="range" id="inputrange"  value="{{ request('range') }}" class="group-hover:placeholder:text-secondary group-hover:text-secondary focus:outline-none focus:text-secondary focus:placeholder:text-secondary/75 block min-w-0 grow text-base text-dark placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300" placeholder="Range Date" size="10">
                <div id="rangepicker" class="absolute h-[6px] w-full top-full left-0"></div>
            </div>
            <button type="submit">Search</button>

            <button onclick="info()" class="flex items-center w-min font-bold bg-secondary text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 hover:bg-transparent hover:text-secondary" ><i class="fa-solid fa-circle-plus font-[16px] mr-[5px]"></i>Add</button>
            
            <div class="group flex flex-col relative gap-[5px]">
                <a class="flex items-center font-bold bg-secondary text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 hover:bg-dark hover:text-secondary" href=""><icon class="fa-solid fa-file-arrow-down text-[16px]"></icon>Export<icon class="fa-solid fa-angle-down text-[16px]"></icon></a>
                <div class="invisible opacity-0 group-hover:visible group-hover:opacity-100 absolute w-full top-0 pt-[40px] flex flex-col text-dark text-[16px] transition-all duration-300 shadow-lg/30 *:flex *:items-center *:transition-all *:duration-300 *:px-[10px] *:py-[5px] *:bg-secondary *:items-center *:border-2 *:border-secondary *:hover:text-secondary *:hover:bg-dark *:first:rounded-t-lg *:first:border-b-0 *:last:rounded-b-lg *:last:border-t-0">
                    <a href="{{ route('visit_history.export_excel') }}" class=""><icon class="fa-solid fa-file-excel text-[16px] mr-[5px]"></icon>Excel</a>
                    <a href="{{ route('visit_history.export_pdf') }}" class=""><icon class="fa-solid fa-file-pdf text-[16px] mr-[5px]"></icon>PDF</a>
                </div>
            </div>
        </form>
    </div>
    <div id="table" class="mt-[10px] flex flex-col items-center gap-[10px]">
        
    </div>
    <div id="modal_form" class="hidden absolute bg-dark/25 h-full w-full top-0 left-0 z-4 flex items-center justify-center">
    </div>
@endsection

@push('scripts')
    <script>
        const toggle_modal = (id) => {
            $('#add_modal-'+id).toggleClass('hidden');
        }

        let $table = $('#table'),
            $form_search = $('#form_search'),
            $modal = $('#modal_form')

        let selected_page = 1, _token = '{{ csrf_token() }}', base_url = '{{ route("visit_history.index") }}', params_url = '{{ $params ?? '' }}'

        let init = function() { 
            $modal.html('');
            search_data(selected_page);
            $modal.addClass('hidden');
        }

        let search_data = function(page = 1) {
            let data = get_form_data($form_search)
            data.paginate = 10
            data.page = selected_page = get_selected_page(page, selected_page)
            console.log(data)
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

        let delete_data = (id) => {
            $.post(base_url + "/" + id, {_token, _method: "delete"}, () => {
                init()
            }).fail((xhr)=>$table.html(xhr.responseText))
        }

        $form_search.submit((e) => {
            e.preventDefault();
            search_data();
        });

        init();

        $(document).ready(function () {
            flatpickr("#inputdate", {
                dateFormat: "d-m-Y",
                position: "auto center",
                allowInput: true,
                maxDate: "today",
                positionElement: document.querySelector("#datepicker"),
                nextArrow: '<icon class="fa-solid fa-angle-right size-[18px]"></icon>',
                prevArrow: '<icon class="fa-solid fa-angle-left size-[18px]"></icon>',
            });
            flatpickr("#inputrange", {
                mode: "range",
                dateFormat: "d-m-Y",
                position: "auto center",
                allowInput: true,
                maxDate: "today",
                positionElement: document.querySelector("#rangepicker"),
                nextArrow: '<icon class="fa-solid fa-angle-right size-[18px]"></icon>',
                prevArrow: '<icon class="fa-solid fa-angle-left size-[18px]"></icon>',
            });
            flatpickr("#timepicker", {
                enableTime: true,
                allowInput: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
            });
        });
    </script>
@endpush