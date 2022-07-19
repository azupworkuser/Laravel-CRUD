<?php

namespace App\Http\Requests\Api;

use Dingo\Api\Http\FormRequest;

class ProfileUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
            'name' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email address is required',
            'email.email' => 'Invalid email address',
            'email.unique' => 'Email address already exists',
            'name' => 'Name is required'
        ];
    }
}
