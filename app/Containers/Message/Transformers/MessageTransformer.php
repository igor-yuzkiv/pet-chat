<?php

namespace App\Containers\Message\Transformers;

use App\Containers\Message\Models\Message;
use App\Utils\TransformersUtil;
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
            'date'       => $message->created_at->format('d. M. Y'),
            'time'       => TransformersUtil::dateTimeFormatted($message->created_at, 'h:i'),
            'updated_at' => $message->updated_at,
        ];
    }
}
