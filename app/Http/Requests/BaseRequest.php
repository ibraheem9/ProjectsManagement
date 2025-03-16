<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest{

    public function  __construct()
    {
    }

    public function authorize(){
        return true;
    }

   
    public function rules()
    {

    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {


        $errors = $validator->errors();

        $response = new \Illuminate\Http\JsonResponse(
            [
                'data' => compact('errors'),
                'msg' => "validation errors" ,
                'status' => false,
                'code' => 200,
            ],
            422);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}
