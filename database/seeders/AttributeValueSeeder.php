<?php
namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Project;
use Illuminate\Database\Seeder;

class AttributeValueSeeder extends Seeder
{
    public function run(): void
    {
        // Retrieve projects
        $projectA = Project::where('name', 'ProjectA')->first();
        $projectB = Project::where('name', 'ProjectB')->first();

        // Retrieve the attributes
        $departmentAttribute = Attribute::where('name', 'department')->first();
        $startDateAttribute = Attribute::where('name', 'start_date')->first();
        $endDateAttribute = Attribute::where('name', 'end_date')->first();
        $budgetAttribute = Attribute::where('name', 'budget')->first();

        // Set attribute values for Project A
        AttributeValue::create([
            'attribute_id' => $departmentAttribute->id,
            'entity_id' => $projectA->id,
            'value' => 'IT',
        ]);

        AttributeValue::create([
            'attribute_id' => $startDateAttribute->id,
            'entity_id' => $projectA->id,
            'value' => '2025-01-01',
        ]);

        AttributeValue::create([
            'attribute_id' => $endDateAttribute->id,
            'entity_id' => $projectA->id,
            'value' => '2025-12-31',
        ]);

        AttributeValue::create([
            'attribute_id' => $budgetAttribute->id,
            'entity_id' => $projectA->id,
            'value' => '100000',
        ]);

        // Set attribute values for Project B
        AttributeValue::create([
            'attribute_id' => $departmentAttribute->id,
            'entity_id' => $projectB->id,
            'value' => 'Marketing',
        ]);

        AttributeValue::create([
            'attribute_id' => $startDateAttribute->id,
            'entity_id' => $projectB->id,
            'value' => '2025-03-01',
        ]);

        AttributeValue::create([
            'attribute_id' => $endDateAttribute->id,
            'entity_id' => $projectB->id,
            'value' => '2025-11-30',
        ]);

        AttributeValue::create([
            'attribute_id' => $budgetAttribute->id,
            'entity_id' => $projectB->id,
            'value' => '50000',
        ]);
    }
}
