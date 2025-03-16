<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributesSeeder extends Seeder
{

    public function run(): void
    {
        $attributes = [
            ['name' => 'department', 'type' => 'text'],
            ['name' => 'start_date', 'type' => 'date'],
            ['name' => 'end_date', 'type' => 'date'],
            ['name' => 'budget', 'type' => 'number'],
        ];

        foreach ($attributes as $attribute) {
            Attribute::create($attribute);
        }
    }
}
