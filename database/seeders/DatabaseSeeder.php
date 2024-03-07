<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Film;
use App\Models\Categorie;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\Film::factory(10)->create();
        Categorie::factory()
            ->has(Film::factory()->count(4))
            ->count(6)
            ->create();
    }
}
