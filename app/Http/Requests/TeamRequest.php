<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'team_name' => ['required','max:25','unique:teams,team_name'],
        ];
    }

    public function messages()
    {
        return [
            'team_name.required' => 'Team name is required',
            'team_name.max' => 'Team name must be less than 25 characters',
            'team_name.unique' => 'Team name already exists',
        ];
    }
}
