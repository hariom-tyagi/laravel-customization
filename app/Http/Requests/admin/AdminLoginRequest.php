<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest {

    public function authorize() {
        return TRUE;
    }

    public function rules() {
        return [
            'email' => 'required',
            'password' => 'required',
        ];
    }

    public function messages() {
        return [
            'email.required' => 'Please Enter Email',
            'password.required' => 'Please Enter Password',
        ];
    }

}
