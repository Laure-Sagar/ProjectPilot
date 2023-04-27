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
            //  $request->validate{
                'task_name' => 'required|string|max:255',
                'task_description' => 'required|string',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
        // }
        ];
    }
}
