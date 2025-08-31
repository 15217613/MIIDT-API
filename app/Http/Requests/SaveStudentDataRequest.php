<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SaveStudentDataRequest extends FormRequest {
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
            'student_id' => [Rule::exists('students', 'id')],
            'impairment_id' => [Rule::exists('impairments', 'id')],
            'native_language_id' => [Rule::exists('native_languages', 'id')],
            'registration' => ['max:11'],
            'cvu' => ['nullable', 'max:11'],
            'orcid' => ['nullable', 'max:40'],
            'photo' => ['nullable'],
            'topic' => ['required'],
            'topic_url' => ['nullable'],
        ];
    }
}
