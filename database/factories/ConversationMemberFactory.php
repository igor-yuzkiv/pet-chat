<?php

namespace Database\Factories;

use App\Containers\Conversation\Models\Conversation;
use App\Containers\Conversation\Models\ConversationMember;
use App\Containers\User\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 *
 */
class ConversationMemberFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = ConversationMember::class;

    /**
     * @return array|mixed[]
     */
    public function definition(): array
    {
        return [
            'id'                => fake()->uuid(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'conversation_id' => Conversation::factory(),
            'user_id'         => User::factory(),
        ];
    }
}
