<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NutritionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nutritions')->insert([
            ['name' => 'calories', 'slug' => 'cal'],
            ['name' => 'carbons', 'slug' => 'carb'],
            ['name' => 'proteins', 'slug' => 'prot'],
            ['name' => 'fat', 'slug' => 'fat']
        ]);
    }
}
