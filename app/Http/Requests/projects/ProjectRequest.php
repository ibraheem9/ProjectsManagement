<?php
namespace App\Http\Requests\projects;
use App\Http\Requests\BaseRequest;


class ProjectRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true; // Allow request
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:200|min:3',
            'status' => 'required|string|max:200|min:3',
            'attributes' => 'sometimes|array',
            'attributes.*.id' => 'required|exists:attributes,id',
            'attributes.*.value' => 'required|string',
            'users' => 'sometimes|array',
            'users.*' => 'exists:users,id'
        ];
    }
}
