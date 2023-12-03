<?php

namespace Database\Seeders;

use App\Containers\Conversation\Models\Conversation;
use App\Containers\Conversation\Models\ConversationMember;
use App\Containers\Conversation\Models\Message;
use App\Containers\User\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(10)->create();
        Conversation::factory()
            ->count(10)
            ->create()
            ->each(function (Conversation $conversation) {
                $users = User::inRandomOrder()->limit(2)->get();
                $isHost = true;
                foreach ($users as $user) {
                    ConversationMember::factory()->create([
                        "conversation_id" => $conversation->id,
                        "user_id"         => $user->id,
                        "is_host"         => $isHost,
                    ]);

                    Message::factory()->count(10)->create([
                        "conversation_id" => $conversation->id,
                        "from_id"         => $user->id,
                    ]);

                    $isHost = false;
                }
            });
    }
}
