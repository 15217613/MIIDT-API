<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SaveStudyPlanRequest extends FormRequest {
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
            'name' => ['required', 'max:50', Rule::unique('study_plans', 'name')->where('postgraduate_id', $this->postgraduate_id)->ignore($this->studyPlan)], // Validar con la columna `postgraduate_id`
            'postgraduate_id' => ['required', Rule::exists('postgraduates', 'id')]
        ];
    }
}
