<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SavePostgraduateRequest extends FormRequest {
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
            'name' => ['required', 'max:255', Rule::unique('postgraduates', 'name')->ignore($this->postgraduate)],
            'acronym' => ['required', 'max:5', Rule::unique('postgraduates', 'acronym')->ignore($this->postgraduate)],
            'duration' => ['required'],
            'cost' => ['nullable', 'decimal:2'],
        ];
    }
}
