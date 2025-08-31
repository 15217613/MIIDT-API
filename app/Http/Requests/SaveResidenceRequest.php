<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SaveResidenceRequest extends FormRequest {
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
            'institution' => ['required', 'max:255'],
            'area' => ['required', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'country_id' => ['required', Rule::exists('countries', 'id')],
            'stay_request' => ['nullable'],
            'acceptance_letter' => ['nullable'],
            'work_schedule' => ['nullable'],
        ];
    }
}
