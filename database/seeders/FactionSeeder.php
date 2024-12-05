<?php

namespace Database\Seeders;

use App\Models\Faction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faction::factory()->create([
            'name' => 'NPA',
            'universe_id' => 1
        ]);
        Faction::factory()->create([
            'name' => 'Empire',
            'universe_id' => 2
        ]);
        Faction::factory()->create([
            'name' => 'Rebel Alliance',
            'universe_id' => 2
        ]);
    }
}
