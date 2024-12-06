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
            'description' => 'Best french politician',
            'created_by' => 1
        ]);
        Hero::factory()->create([
            'faction_id' => 2,
            'name' => 'Darth Vader',
            'gender' => 'Male',
            'race' => 'Human',
            'description' => 'Dark Lord of the Sith',
            'created_by' => 1
        ]);
        Hero::factory()->create([
            'faction_id' => 3,
            'name' => 'Han Solo',
            'gender' => 'Male',
            'race' => 'Human',
            'description' => 'Thief',
            'created_by' => 1
        ]);
        Hero::factory()->create([
            'faction_id' => 3,
            'name' => 'Luke Skywalker',
            'gender' => 'Male',
            'race' => 'Human',
            'description' => 'He will not be the last Jedi',
            'created_by' => 1
        ]);
        Hero::factory()->create([
            'faction_id' => 3,
            'name' => 'R2D2',
            'gender' => '',
            'race' => 'Droid',
            'description' => 'Bip ? Boup !',
            'created_by' => 1
        ]);
    }
}
