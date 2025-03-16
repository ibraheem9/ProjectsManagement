<?php

namespace App\Http\Requests\timesheets;

use Illuminate\Foundation\Http\FormRequest;

class TimesheetRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'task_name' => 'required|string|max:255',
            'date' => 'required|date',
            'hours' => 'required|numeric|min:0',
            'user_id' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id',
        ];
    }

    public function messages()
    {
        return [
            'task_name.required' => 'The task name is required.',
            'date.required' => 'The date is required.',
            'hours.required' => 'The hours are required.',
            'user_id.required' => 'The user is required.',
            'project_id.required' => 'The project is required.',
        ];
    }
}
