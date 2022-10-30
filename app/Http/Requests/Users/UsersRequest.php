<?php

namespace App\Http\Requests\Users;

use App\Http\Requests\ParentRequest;
use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends ParentRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $user = $this->user;
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,'.$user,
            'password' => 'required|min:8|confirmed',
            'role' => 'required|exists:roles,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required',

            'email.required' => 'The email field is required',
            'email.email' => 'The email field must be an email',
            'email.unique' => 'The email is already used',

            'password.required' => 'The password field is required',
            'password.min' => 'The password must at least be 8 chars',
            'password.confirmed' => 'The password confirmation did not match',

            'role.required' => 'The role field is required',
            'role.exists' => 'The role you selected is invalid',



        ];
    }
}
