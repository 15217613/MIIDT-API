<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SaveTeacherRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'employee_number' => ['nullable', 'max:255', Rule::unique('teachers', 'employee_number')->ignore($this->teacher)],
            'name' => ['required', 'max:255'],
            'phone' => ['nullable', 'max:10', Rule::unique('teachers', 'phone')->ignore($this->teacher)],
            'email' => ['nullable', 'max:255', Rule::unique('teachers', 'email')->ignore($this->teacher)],
        ];
    }
}
