<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttributeRequest;
use App\Models\Attribute;
use App\Models\AttributeValue;

class AttributeController extends Controller
{
    public function index()
    {
        $attributes = Attribute::all();
        return sendResponse($attributes, 'Attributes retrieved successfully');
    }

    public function store(AttributeRequest $request)
    {
        $attribute = Attribute::create($request->validated());

        return sendResponse($attribute, 'Attribute created successfully');
    }

    public function show(Attribute $attribute)
    {
        return sendResponse($attribute, 'Attribute details retrieved');
    }

    public function update(AttributeRequest $request, Attribute $attribute)
    {
        $attribute->update($request->validated());

        return sendResponse($attribute, 'Attribute updated successfully');
    }

    public function destroy(Attribute $attribute)
    {
        AttributeValue::where('attribute_id', $attribute->id)->delete();

        $attribute->delete();
        return sendResponse(null, 'Attribute deleted successfully');
    }
}
