<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SavePostgraduateTeacherRequest extends FormRequest {
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
            'teacher_id' => ['required', Rule::unique('postgraduate_teachers', 'teacher_id')->ignore($this->postgraduateTeacher), Rule::exists('teachers', 'id')],
            'postgraduate_id' => ['required', Rule::unique('postgraduate_teachers', 'postgraduate_id')->ignore($this->postgraduateTeacher), Rule::exists('postgraduates', 'id')],
            'teacher_status_id' => ['required', Rule::exists('teacher_statuses', 'id')],
        ];
    }
}
