<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SaveStudentAdvisorRequest extends FormRequest {
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
            'student_id' => ['required', Rule::exists('students', 'id')],
            'director_id' => ['required', Rule::exists('teachers', 'id')],
            'codirector_id' => ['required', Rule::exists('teachers', 'id')],
            'tutor_id' => ['nullable', Rule::exists('teachers', 'id')],
        ];
    }
}
