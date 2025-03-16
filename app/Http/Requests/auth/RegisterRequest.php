<?php

namespace App\Http\Requests\auth;
use App\Http\Requests\BaseRequest;


class RegisterRequest extends BaseRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:50|min:3',
            'last_name' => 'required|string|max:50|min:3',
            'email' => 'required|string|email:rfc|unique:users,email|max:200',
            'password' => 'required|string|min:8',
        ];
    }
}
