<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SaveStudentRequest extends FormRequest {
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
            'generation_id' => ['required', Rule::exists('generations', 'id')],
            'curp' => ['required', 'max:18', Rule::unique('students', 'curp')->where('generation_id', $this->generation_id)->ignore($this->student)],
            'name' => ['required', 'max:255'],
            'gender' => ['required'],
            'email' => ['required', 'max:255', 'email', Rule::unique('students', 'email')->where('generation_id', $this->generation_id)->ignore($this->student)],
            'phone' => ['nullable', 'max:10', Rule::unique('students', 'phone')->where('generation_id', $this->generation_id)->ignore($this->student)],
            'birthdate' => ['required', 'date'],
            'program_id' => ['required', Rule::exists('programs', 'id')],
            'origin_institution_id' => ['required', Rule::exists('origin_institutions', 'id')],
            'lies_id' => ['required', Rule::exists('lies', 'id')],
            'folio' => ['nullable', 'max:10'],
            'clur' => ['nullable', 'max:10'],
            'graduation_date' => ['nullable', 'date'],
            'status_id' => ['required', Rule::exists('statuses', 'id')],
            'rfid' => ['nullable', 'max:240'],
        ];
    }
}
