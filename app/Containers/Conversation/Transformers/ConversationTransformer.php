<?php

namespace App\Containers\Conversation\Transformers;

use App\Containers\Conversation\Models\Conversation;
use App\Utils\TransformersUtil;
use League\Fractal\Resource\Collection;
use League\Fractal\TransformerAbstract;

/**
 *
 */
class ConversationTransformer extends TransformerAbstract
{
    /**
     * @var array
     */
    protected array $defaultIncludes = [];

    /**
     * @var array|string[]
     */
    protected array $availableIncludes = ['members', 'messages'];

    /**
     * @param Conversation $conversation
     * @return array
     */
    public function transform(Conversation $conversation): array
    {
        return [
            'id'                   => $conversation->id,
            'type'                 => $conversation->type,
            'created_at'           => $conversation->created_at,
            'created_at_formatted' => TransformersUtil::dateTimeFormatted($conversation->created_at),
            'updated_at'           => $conversation->updated_at,
            'updated_at_formatted' => TransformersUtil::dateTimeFormatted($conversation->updated_at),
        ];
    }

    /**
     * @param Conversation $conversation
     * @return Collection
     */
    public function includeMembers(Conversation $conversation): Collection
    {
        return $this->collection($conversation->members, new ConversationMemberTransformer());
    }

    /**
     * @param Conversation $conversation
     * @return Collection
     */
    public function includeMessages(Conversation $conversation): Collection
    {
        return $this->collection($conversation->messages, new MessageTransformer);
    }
}
