<?php

namespace App\Containers\Conversation\Models;

use App\Containers\User\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 *
 */
class Conversation extends Model
{
    use HasUuids;

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
}
