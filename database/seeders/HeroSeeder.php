<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hero::factory()->create([
            'faction_id' => 1,
            'name' => 'Philippe Poutou',
            'gender' => 'Male',
            'race' => 'Human',
            'description' => 'Best french politician'
        ]);
        Hero::factory()->create([
            'faction_id' => 2,
            'name' => 'Darth Vader',
            'gender' => 'Male',
            'race' => 'Human',
            'description' => 'Dark Lord of the Sith'
        ]);
        Hero::factory()->create([
            'faction_id' => 3,
            'name' => 'Han Solo',
            'gender' => 'Male',
            'race' => 'Human',
            'description' => 'Thief'
        ]);
    }
}
