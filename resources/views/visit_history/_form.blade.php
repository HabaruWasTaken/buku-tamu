<form id="form_info" class="bg-secondary flex flex-col gap-[10px] p-[10px] rounded-[10px] text-dark w-fit min-w-1/2 gap-[30px] mx-auto *:font-bold" action="">
    @csrf
    <div class="text-center text-[20px] font-bold">Create New Visit History</div>
    <div class="flex flex-col gap-[10px] *:*:gap-[20px] *:*:*:last:w-3/4 *:*:*:first:w-1/4 *:*:*:first:text-bold *:*:*:first:text-[16px] divide-y-2 border-b-2 border-dark *:flex *:flex-col *:items-end *:pb-[10px] *:gap-[5px]">
        <div>
            <div class="w-full flex justify-between items-center">
                <label for="name">Name:</label>
                <input name="name" class="py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
            </div>
            <div id="name_error" class="error-msg font-medium hidden text-primary w-3/4 pl-[20px]"></div>
        </div>
        <div>
            <div class="w-full flex justify-between items-center">
                <label for="company">Company:</label>
                <input name="company" class="py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
            </div>
            <div id="company_error" class="error-msg font-medium hidden text-primary w-3/4 pl-[20px]"></div>
        </div>
        <div>
            <div class="w-full flex justify-between items-center">
                <label for="phone">Phone:</label>
                <input name="phone" class="py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
            </div>
            <div id="phone_error" class="error-msg font-medium hidden text-primary w-3/4 pl-[20px]"></div>
        </div>
        <div>
            <div class="w-full flex justify-between items-center">
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
            <div id="employee_id_error" class="error-msg font-medium hidden text-primary w-3/4 pl-[20px]"></div>
        </div>
        <div>
            <div class="w-full flex justify-between items-center">
                <label for="description">Description:</label>
                <input name="description" class="py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
            </div>
            <div id="description_error" class="error-msg font-medium hidden text-primary w-3/4 pl-[20px]"></div>
        </div>
    </div>
    <div class="flex justify-between items-center">
        <a onclick="close_modal()" class="flex items-center border-2 border-dark rounded-[6px] font-bold hover:bg-secondary hover:text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 bg-dark text-secondary w-min" href="javascript:void(0)"><icon class="fa-solid fa-arrow-left-long size-[16px]"></icon>Back</a>
        <button type="submit" class="cursor-pointer flex items-center border-2 border-dark rounded-[8px] font-bold hover:bg-secondary hover:text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] outline-secondary outline-2 transition-all duration-300 bg-dark text-secondary w-min"><icon class="fa-solid fa-check size-[16px]"></icon>Submit</button>
    </div>
</form>

<script>
    close_modal = function() {
        $('#modal_form').addClass('hidden')
        $('#modal_form').html('');
    }

    id = '{{ $visitHistory->id ?? ''}}'
    $form_info = $('#form_info')
    $form_info.submit((e) => {
        e.preventDefault()
        let url = base_url
        let data = new FormData($form_info.get(0))
        if (id !== '') url += '/' + id + '?_method=put'
        $.ajax({
            url,
            type: 'post',
            data,
            cache: false,
            processData: false,
            contentType: false,
            success: () => init(),
        }).fail((xhr) => {
            error_handle(xhr.responseText)
        })
    })

    $(document).ready(function() {
        $('.select-employee-light').select2({
            placeholder: "Select Employee",
            theme: 'tailwindcss-2',
            allowClear: true,
            scrollAfterSelect: true,
            width: '100%',
            dropdownPosition: 'below'
        });
    });
</script>