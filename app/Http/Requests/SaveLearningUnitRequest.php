<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SaveLearningUnitRequest extends FormRequest {
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
            'lies_id' => ['required', Rule::exists('lies', 'id')],
            'key' => ['required', 'max:15', Rule::unique('learning_units', 'key')->ignore($this->learningUnit)],
            'name' => ['required', 'max:255'],
            'credits' => ['required', 'integer'],
            'total_hours' => ['required', 'integer'],
        ];
    }
}
