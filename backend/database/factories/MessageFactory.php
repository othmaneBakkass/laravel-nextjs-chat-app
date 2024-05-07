<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $test_user_id = 1;
        $users = User::query()->pluck('id');
        $sender_id = $this->faker->randomElement([null, $test_user_id]);
        $receiver_id = $this->faker->randomElement($users);
        $random_group_id = null;

        // if sender_id is null, the test_user will be the receiver of the message
        // else the test_user will act as the sender of the message
        if ($sender_id == null) {
            $sender_id = $this->faker->randomElement($users->where('id', '!=', $test_user_id)->toArray());
            $receiver_id = $test_user_id;
        }

        if ($this->faker->boolean(50)) {
            $groups = Group::query();
            $random_group_id = $this->faker->randomElement($groups->pluck('id')->toArray());
            $group = $groups->find($random_group_id);
            $sender_id = $this->faker->randomElement($group->users()->pluck('id')->toArray());
            // a message can be either sent to a group or an individual
            // that why in this case, the receiver_id is null 
            $receiver_id = null;
        }

        return [
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
            'group_id' => $random_group_id,
            'message' => $this->faker->realText(100),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now')

        ];
    }
}
