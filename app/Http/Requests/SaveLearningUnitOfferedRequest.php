<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SaveLearningUnitOfferedRequest extends FormRequest {
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
            'teacher_id' => [
                'required',
                Rule::exists('teachers', 'id')
            ],
            'learning_unit_id' => [
                'required',
                Rule::exists('learning_units', 'id')
            ],
            'classroom_id' => [
                'required',
                Rule::exists('classrooms', 'id')
            ],
            'schedule_details' => [
                'required',
                'array',
                'min:1'
            ],
            'schedule_details.*.day' => [
                'required',
                'string',
                'in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday', // Días válidos
            ],
            'schedule_details.*.start_time' => [
                'required',
                'date_format:H:i', // Formato de hora 24 horas
            ],
            'schedule_details.*.end_time' => [
                'required',
                'date_format:H:i',
                'after:schedule_details.*.start_time', // Debe ser posterior a la hora de inicio
            ],
        ];
    }
}
