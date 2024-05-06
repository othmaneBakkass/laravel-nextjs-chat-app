<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'dev',
            'email' => 'dev@example.com',
            'password' => bcrypt('password'),
            'is_admin' => true
        ]);

        User::factory()->create([
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        User::factory(10)->create();
    }
}
