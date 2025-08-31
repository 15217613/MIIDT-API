<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SaveLiesRequest extends FormRequest {
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
            'study_plan_id' => ['required', Rule::exists('study_plans', 'id')],
            'name' => ['required', 'max:50'],
            'acronym' => ['required', 'max:5'],
            'description' => ['nullable'],
        ];
    }
}
