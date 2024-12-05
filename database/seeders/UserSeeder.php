<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'JeanClaude',
            'email' => 'jeanclaude@truc.fr',
            'password' => Hash::make('JeanClaude'),
        ]);

        User::factory(10)->create();
    }
}
