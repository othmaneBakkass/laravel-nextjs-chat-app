<?php

namespace Database\Seeders;


use App\Models\Conversation;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ConversationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Message::factory(100)->create();
        $msgs = Message::whereNull('group_id')->orderBy('created_at')->get();

        $conversations = $msgs
            ->groupBy(
                fn($msg) => collect([$msg->sender_id, $msg->receiver_id])->sort()->implode('_')
            )->map(
                fn($grouped_msgs) => [
                    'user_id_1' => $grouped_msgs->first()->sender_id,
                    'user_id_2' => $grouped_msgs->first()->receiver_id,
                    'last_message_id' => $grouped_msgs->last()->id,
                    'created_at' => new Carbon(),
                    'updated_at' => new Carbon()
                ]
            )->values();

        Conversation::insertOrIgnore($conversations->toArray());
    }
}
