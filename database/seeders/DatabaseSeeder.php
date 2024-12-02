<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TakeClassesHhaTableSeeder::class,
            TakeClassesTableSeeder::class, // Add this line
            TakeClassesMedTableSeeder::class, // Add this line
            TakeClassesBlsCprTableSeeder::class, // Add this line
            AuthCodeSeeder::class, // Add this line

        ]);
    }
}
