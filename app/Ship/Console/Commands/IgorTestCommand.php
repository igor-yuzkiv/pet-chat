<?php

namespace App\Ship\Console\Commands;

use App\Containers\Conversation\Enums\ConversationTypeEnum;
use App\Containers\Conversation\Models\Conversation;
use App\Containers\Conversation\Models\ConversationMember;
use App\Containers\Message\Models\Message;
use App\Containers\User\Models\User;
use Illuminate\Console\Command;

class IgorTestCommand extends Command
{
    protected $signature = 'igor:test';

    protected $description = 'Command description';

    public function handle(): void
    {
        $userId = "9ac28199-6642-4d8d-a27b-95d780f86055";
        $users = User::query()
            ->inRandomOrder()
            ->limit(4)
            ->where("id", "!=", $userId)
            ->get();


        $conversation = Conversation::create(['type' => ConversationTypeEnum::GROUP]);

        $host = ConversationMember::create([
            "conversation_id" => $conversation->id,
            "user_id"         => $userId,
            "is_host"         => true,
        ]);

        Message::factory()->count(5)->create([
            "conversation_id" => $conversation->id,
            "from_id"         => $userId,
        ]);

        foreach ($users as $user) {
            ConversationMember::create([
                "conversation_id" => $conversation->id,
                "user_id"         => $user->id,
                "is_host"         => false,
            ]);
            Message::factory()->count(5)->create([
                "conversation_id" => $conversation->id,
                "from_id"         => $user->id,
            ]);
        }
    }
}
