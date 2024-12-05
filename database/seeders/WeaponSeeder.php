<?php

namespace Database\Seeders;

use App\Models\Weapon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeaponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Weapon::factory()->create([
            'name' => 'LightSaber',
            'type' => 'Sword'
        ]);
        Weapon::factory()->create([
            'name' => 'Blaster',
            'type' => 'Gun'
        ]);
    }
}
