<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'task_name'  => 'required|regex:/[A-Za-z]/'
        ];
    }
    public function messages()
    {
        return [
            'task_name.regex'     => 'Task Name Should\'n Be A Number OR Character'
        ];
    }
}
