<?php

namespace App\Containers\Message\Models;

use App\Abstractions\Filter\HasFilter;
use App\Containers\Conversation\Models\Conversation;
use App\Containers\Message\Enums\MessageTypeEnum;
use App\Containers\Message\Filters\ConversationFilter;
use Database\Factories\MessageFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 */
class Message extends Model
{
    use HasFactory, HasUuids, HasFilter;

    /**
     * @var string
     */
    protected $table = "messages";

    /**
     * @var string
     */
    protected $keyType = "string";

    /**
     * @var string[]
     */
    protected $fillable = [
        "conversation_id",
        "from_id",
        "type",
        "body",
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'type' => MessageTypeEnum::class
    ];

    /**
     * @var array
     */
    public array $filters = [
        "conversation" => ConversationFilter::class
    ];

    /**
     * @return BelongsTo
     */
    public function conversation(): BelongsTo
    {
        return $this->belongsTo(Conversation::class, "conversation_id", "id");
    }

    /**
     * @return Factory
     */
    public static function newFactory(): Factory
    {
        return MessageFactory::new();
    }
}
