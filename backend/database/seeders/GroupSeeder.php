<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groupsCount = 5;
        $test_user_id = 1;

        for ($i = 0; $i < $groupsCount; $i++) {
            $group = Group::factory()->create([
                'owner_id' => $test_user_id,
            ]);

            $users_id = User::inRandomOrder()->limit(rand(2, 5))->pluck('id')->toArray();
            $group->users()->attach(array_unique([$test_user_id, ...$users_id]));
        }
    }
}
