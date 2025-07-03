<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'division' => ['required', Rule::in(['division-1', 'division-2', 'division-3', 'division-4', 'division-5', 'division-6']),],
            'position' => ['required', Rule::in(['position-1', 'position-2', 'position-3', 'position-4', 'position-5', 'position-6']),],
        ];
    }
}
