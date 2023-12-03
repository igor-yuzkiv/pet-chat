<?php

namespace Database\Factories;

use App\Containers\Conversation\Enums\MessageTypeEnum;
use App\Containers\Conversation\Models\Conversation;
use App\Containers\Conversation\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 *
 */
class MessageFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Message::class;

    /**
     * @return array|mixed[]
     */
    public function definition(): array
    {
        return [
            'id'         => fake()->uuid(),
            'from_id'    => $this->faker->word(),
            'type'       => MessageTypeEnum::TEXT,
            'body'       => $this->faker->sentence(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'conversation_id' => Conversation::factory(),
        ];
    }
}
