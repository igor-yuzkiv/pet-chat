<?php

namespace Database\Seeders;

use App\Containers\Conversation\Models\Conversation;
use App\Containers\Conversation\Models\ConversationMember;
use App\Containers\Message\Models\Message;
use App\Containers\User\Models\User;
use Illuminate\Database\Seeder;

/**
 *
 */
class SpecificUserSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        $userId = "9ac28199-6642-4d8d-a27b-95d780f86055";

        Conversation::factory()
            ->count(10)
            ->create()
            ->each(function (Conversation $conversation) use ($userId) {
                $secondUser = User::inRandomOrder()
                    ->where("id", "!=", $userId)
                    ->first();


                $isHost = true;
                foreach ([$userId, $secondUser] as $id) {
                    ConversationMember::factory()->create([
                        "conversation_id" => $conversation->id,
                        "user_id"         => $id,
                        "is_host"         => $isHost,
                    ]);

                    Message::factory()->count(10)->create([
                        "conversation_id" => $conversation->id,
                        "from_id"         => $id,
                    ]);

                    $isHost = false;
                }
            });
    }
}
