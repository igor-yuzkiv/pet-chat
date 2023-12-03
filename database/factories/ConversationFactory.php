<?php

namespace Database\Factories;

use App\Containers\Conversation\Models\Conversation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 *
 */
class ConversationFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Conversation::class;

    /**
     * @return array|mixed[]
     */
    public function definition(): array
    {
        return [
            'id'         => fake()->uuid(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
