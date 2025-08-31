<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SavePaperTeacherRequest extends FormRequest {
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
            'resource_id' => ['required', Rule::exists('resources', 'id')],
            'teacher_id' => ['required', Rule::exists('teachers', 'id')],
            'name' => ['required', 'max:255'],
            'publication_year' => ['required', 'integer'],
            'doi' => ['nullable', 'max:100'],
            'isbn' => ['nullable', 'max:20'],
            'issn' => ['nullable', 'max:20'],
            'pages' => ['nullable', 'max:50'],
            'url' => ['nullable', 'url'],
            'reference' => ['nullable'],
        ];
    }
}
