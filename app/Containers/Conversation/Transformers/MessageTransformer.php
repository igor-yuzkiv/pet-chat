<?php

namespace App\Containers\Conversation\Transformers;

use App\Containers\Conversation\Models\Message;
use League\Fractal\TransformerAbstract;

/**
 *
 */
class MessageTransformer extends TransformerAbstract
{
    /**
     * @var array
     */
    protected array $defaultIncludes = [];

    /**
     * @var array
     */
    protected array $availableIncludes = [];

    /**
     * @param Message $message
     * @return array
     */
    public function transform(Message $message): array
    {
        return [
            'id'         => $message->id,
            'from_id'    => $message->from_id,
            'type'       => $message->type,
            'body'       => $message->body,
            'created_at' => $message->created_at,
            'updated_at' => $message->updated_at,
        ];
    }
}
