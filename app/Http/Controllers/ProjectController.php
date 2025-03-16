<?php

namespace App\Http\Controllers;

use App\Http\Requests\projects\ProjectRequest;
use App\Models\Project;
use App\Models\AttributeValue;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::with('attributes.attribute');

        if ($request->has('filters')) {
            foreach ($request->input('filters') as $attributeKey => $filter) {
                if (is_array($filter) && isset($filter['operator']) && isset($filter['value'])) {
                    $operator = $filter['operator'];
                    $value = $filter['value'];

                    if (in_array($operator, ['=', '>', '<', 'LIKE'])) {
                        if (is_numeric($attributeKey)) {
                            $query->whereHas('attributes', function ($q) use ($attributeKey, $operator, $value) {
                                $q->where('attribute_id', $attributeKey)
                                    ->where('value', $operator, $value);
                            });
                        } else {
                            $query->whereHas('attributes.attribute', function ($q) use ($attributeKey, $operator, $value) {
                                $q->where('name', $attributeKey)
                                    ->whereHas('values', function ($subQ) use ($operator, $value) {
                                        $subQ->where('value', $operator, $operator === 'LIKE' ? "%$value%" : $value);
                                    });
                            });
                        }
                    }
                    else
                    {
                        return sendResponse(null, "Invalid operator. Supported operators are: =, >, <, LIKE.",false,422);

                    }
                }
            }
        }

        $projects = $query->get();
        return sendResponse($projects, 'Projects retrieved successfully');
    }


    public function store(ProjectRequest $request)
    {
        $project = Project::create($request->only(['name', 'status']));

        if ($request->has('attributes')) {
            foreach ($request->get('attributes') as $attribute) {
                AttributeValue::create([
                    'attribute_id' => $attribute['id'],
                    'entity_id' => $project->id,
                    'value' => $attribute['value']
                ]);
            }
        }

        return sendResponse($project->load('attributes.attribute'), 'Project created successfully');
    }

    public function show(Project $project)
    {
        return sendResponse($project->load('attributes.attribute'), 'Project details retrieved');
    }

    public function update(ProjectRequest $request, Project $project)
    {
        $project->update($request->only(['name', 'status']));

        if ($request->has('attributes')) {
            foreach ($request->get('attributes') as $attribute) {
                AttributeValue::updateOrCreate(
                    ['attribute_id' => $attribute['id'], 'entity_id' => $project->id],
                    ['value' => $attribute['value']]
                );
            }
        }

        return sendResponse($project->load('attributes.attribute'), 'Project updated successfully');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return sendResponse(null, 'Project deleted successfully');
    }
}
