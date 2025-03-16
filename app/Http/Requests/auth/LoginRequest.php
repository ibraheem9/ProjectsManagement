<?php

namespace App\Http\Requests\auth;


use App\Http\Requests\BaseRequest;

class LoginRequest extends BaseRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'email' => 'required|string|email:rfc|max:200',
            'password' => 'required|max:50',
        ];
    }
}
