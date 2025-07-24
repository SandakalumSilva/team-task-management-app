<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'role_name' => ['required','max:25','string','unique:roles,role_name'],
        ];
    }

    public function messages()
    {
        return [
            'role_name.required' => 'Role name is required',
            'role_name.string' => 'Role name must be a string',
            'role_name.max' => 'Role name must be less than 25 characters',
            'role_name.unique' => 'Role name already exists',
        ];
    }
}
