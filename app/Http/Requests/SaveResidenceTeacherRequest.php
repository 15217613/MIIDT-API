<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SaveResidenceTeacherRequest extends FormRequest {
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
            'institution' => ['required', 'max:255'],
            'country_id' => ['required', Rule::exists('countries', 'id')],
            'teacher_id' => ['required', Rule::exists('teachers', 'id')]
        ];
    }
}
