<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroWeaponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hero = Hero::find(2);
        $hero->weapon()->attach(1);

        $hero = Hero::find(3);
        $hero->weapon()->attach(2);

        $hero = Hero::find(4);
        $hero->weapon()->attach(1);
        $hero->weapon()->attach(2);
    }
}
