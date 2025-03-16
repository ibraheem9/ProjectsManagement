<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Call the relevant seeders
        $this->call([
            UserSeeder::class,
            ProjectSeeder::class,
            TimesheetSeeder::class,
            AttributesSeeder::class,
            AttributeValueSeeder::class,
        ]);
    }
}

