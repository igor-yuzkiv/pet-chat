<?php

namespace App\Containers\Conversation\Models;

use App\Abstractions\Filter\HasFilter;
use App\Containers\Conversation\Enums\ConversationTypeEnum;
use App\Containers\Message\Models\Message;
use App\Containers\User\Models\User;
use Database\Factories\ConversationFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 */
class Conversation extends Model
{
    use HasUuids, HasFactory, HasFilter;

    /**
     * @var string
     */
    protected $table = 'conversations';

    /**
     * @var string
     */
    protected $keyType = 'string';

    /**
     * @var string[]
     */
    protected $fillable = [
        'type',
        'logo_url',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'type' => ConversationTypeEnum::class,
    ];

    /**
     * @var array|string[]
     */
    protected array $filters = [];

    /**
     * @return HasMany
     */
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class, 'conversation_id', 'id');
    }


    /**
     * @return BelongsToMany
     */
    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'conversation_members', 'conversation_id', 'user_id')
            ->withPivot('id', 'is_host');
    }

    /**
     * @return Factory
     */
    public static function newFactory(): Factory
    {
        return ConversationFactory::new();
    }
}
