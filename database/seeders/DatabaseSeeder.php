<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory()->create([
             'id' => config('app.default.entities.admin.id'),
             'name' => 'Admin',
             'email' => 'amdmin@example.com',
         ]);
    }
}
