<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SaveCountryRequest extends FormRequest {
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
            'name' => ['required', 'max:50', Rule::unique('countries', 'name')->ignore($this->country)],
            'iso_name' => ['required', 'max:50', Rule::unique('countries', 'iso_name')->ignore($this->country)],
            'alfa2' => ['required', 'max:2', Rule::unique('countries', 'alfa2')->ignore($this->country)],
            'alfa3' => ['required', 'max:3', Rule::unique('countries', 'alfa3')->ignore($this->country)],
            'numeric' => ['required', Rule::unique('countries', 'numeric')->ignore($this->country)],
        ];
    }
}
