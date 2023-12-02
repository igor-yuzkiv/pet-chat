<?php

namespace App\Containers\Conversation\Models;

use App\Containers\User\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 */
class ConversationMember extends Model
{
    use HasUuids;

    /**
     * @var string
     */
    protected $table = 'conversation_members';

    /**
     * @var string
     */
    protected $keyType = 'string';

    /**
     * @var string[]
     */
    protected $fillable = [
        'conversation_id',
        'user_id',
        'is_host',
    ];

    /**
     * @var string[]
     */
    public $casts = [
        'is_host' => 'boolean',
    ];

    /**
     * @return BelongsTo
     */
    public function conversation(): BelongsTo
    {
        return $this->belongsTo(Conversation::class, 'conversation_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
