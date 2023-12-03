<?php

namespace App\Containers\Conversation\Models;

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
    use HasFactory, HasUuids;

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
