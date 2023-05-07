<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'task_name' => 'required','string|max:100|min:3',
            'task_description' => 'required|string',
            // 'start_date' => 'required|date',
            // 'end_date' => 'required|date|after:start_date',
            'duration' => 'required|numeric'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'task_name.required' => 'Task name is required',
            'task_name.string' => 'Task name must be a string',
            'task_name.max' => 'Task name is too long (max: 100 characters)',
            'task_name.min' => 'Task name is too short (min: 3 characters)',
            'task_name.unique' => 'Task name already exists',
            'task_description.required' => 'Task description is required',
            'task_description.string' => 'Task description must be a string',
            'start_date.required' => 'Start date is required',
            'start_date.date' => 'Start date must be a date',
            'end_date.required' => 'End date is required',
            'end_date.date' => 'End date must be a date',
            'end_date.after' => 'End date must be after start date',
        ];
    }
}
