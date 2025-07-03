<form id="form_info" class="bg-secondary flex flex-col gap-[10px] p-[10px] rounded-[10px] text-dark w-fit min-w-1/2 gap-[30px] mx-auto *:font-bold">
    @csrf
    <div class="text-center text-[20px] font-bold">{{ !empty($employee) ? 'Edit' : 'Create'}} Employee</div>
    <div class="flex flex-col gap-[10px] *:*:gap-[20px] *:*:*:last:w-3/4 *:*:*:first:w-1/4 *:*:*:first:text-bold *:*:*:first:text-[16px] divide-y-2 border-b-2 border-dark *:flex *:flex-col *:items-end *:pb-[10px] *:gap-[5px]">
        <div>
            <div class="w-full flex justify-between items-center">
                <label for="name">Name:</label>
                <input value="{{ $employee->name ?? '' }}" name="name" class="py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
            </div>
            <div id="name_error" class="error-msg font-medium hidden text-primary w-3/4 pl-[20px]"></div>
        </div>
        <div>
            <div class="w-full flex justify-between items-center">
                <label for="division">Division:</label>
                <div class="w-full py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
                    <select name="division" class="select-division-light">
                        <option value=""></option>
                        @for ($i = 1; $i <= 6; $i++)
                        @if (($employee->division ?? '') == "division-".$i)
                        <option value="division-{{ $i }}" selected="selected">Division {{ $i }}</option>
                        @else
                        <option value="division-{{ $i }}">Division {{ $i }}</option>
                        @endif
                        @endfor
                    </select>
                </div>
            </div>
            <div id="division_error" class="error-msg font-medium hidden text-primary w-3/4 pl-[20px]"></div>
        </div>
        <div>
            <div class="w-full flex justify-between items-center">
                <label for="position">Position:</label>
                <div class="w-full py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
                    <select name="position" class="select-position-light">
                        <option value=""></option>
                        @for ($i = 1; $i <= 6; $i++)
                            @if (($employee->position ?? '') == "position-".$i)
                                <option value="position-{{ $i }}" selected="selected">Position {{ $i }}</option>
                            @else
                                <option value="position-{{ $i }}">Position {{ $i }}</option>
                            @endif
                        @endfor
                    </select>
                </div>
            </div>
            <div id="position_error" class="error-msg font-medium hidden text-primary w-3/4 pl-[20px]"></div>
        </div>
        @if (!empty($employee))
            <div class="flex justify-center w-full">
                <a href="{{ $employee->photo ? Storage::url($employee->photo) : asset('user-tie-solid.svg') }}" target="_blank" class="!w-full flex justify-center"><img src="{{ $employee->photo ? Storage::url($employee->photo) : asset('user-tie-solid.svg') }}" class="h-[150px]"></a>
            </div>
        @endif
        <div>
            <div class="w-full flex justify-between items-center">
                <label for="photo">Photo:</label>
                <input type="file" accept="image/*" name="photo_profile" class="file:border-r-2 file:border-dark file:pr-[5px] py-[2px] px-[6px] rounded-[6px] bg-light text-dark border-2 border-dark focus-visible:outline-primary placeholder:text-dark placeholder:text-base placeholder:transition-all placeholder:duration-300 transition-all duration-300">
            </div>
            <div id="photo_profile_error" class="error-msg font-medium hidden text-primary w-3/4 pl-[20px]"></div>
        </div>
    </div>
    <div class="flex justify-between items-center">
        <a onclick="close_modal()" class="flex items-center border-2 border-dark rounded-[6px] font-bold hover:bg-secondary hover:text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] transition-all duration-300 bg-dark text-secondary w-min" href="javascript:void(0)"><icon class="fa-solid fa-arrow-left-long size-[16px]"></icon>Back</a>
        <button type="submit" class="cursor-pointer flex items-center border-2 border-dark rounded-[8px] font-bold hover:bg-secondary hover:text-dark rounded-[6px] px-[16px] py-[6px] gap-[5px] transition-all duration-300 bg-dark text-secondary w-min"><icon class="fa-solid fa-check size-[16px]"></icon>Submit</button>
    </div>
</form>

<script>
    close_modal = function() {
        $('#modal_form').addClass('hidden')
        $('#modal_form').html('');
    }

    id = '{{ $employee->id ?? ''}}'
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
        $('.select-division-light').select2({
            placeholder: "Select Division",
            theme: 'tailwindcss-2',
            width: '100%',
            allowClear: true,
            scrollAfterSelect: true,
            dropdownPosition: 'below'
        })
        $('.select-position-light').select2({
            placeholder: "Select Position",
            theme: 'tailwindcss-2',
            width: '100%',
            allowClear: true,
            scrollAfterSelect: true,
            dropdownPosition: 'below'
        })
    })
</script>