<?php

namespace App\Containers\Conversation\Models;

use App\Containers\User\Models\User;
use Database\Factories\ConversationFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 *
 */
class Conversation extends Model
{
    use HasUuids, HasFactory;

    /**
     * @var string
     */
    protected $table = 'conversations';

    /**
     * @var string
     */
    protected $keyType = 'string';

    /**
     * @return HasMany
     */
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class, 'conversation_id', 'id');
    }

    /**
     * @return HasManyThrough
     */
    public function members(): HasManyThrough
    {
        return $this->hasManyThrough(
            User::class,
            ConversationMember::class,
            'conversation_id',
            'id',
            'id',
            'user_id'
        );
    }

    /**
     * @return Factory
     */
    public static function newFactory(): Factory
    {
        return ConversationFactory::new();
    }
}
