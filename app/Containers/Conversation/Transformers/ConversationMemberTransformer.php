<?php

namespace App\Containers\Conversation\Transformers;

use App\Containers\User\Models\User;
use App\Containers\User\Transformers\UserTransformer;


class ConversationMemberTransformer extends UserTransformer
{
    /**
     * @param User $user
     * @return array
     */
    public function transform(User $user): array
    {
        return [
            ...parent::transform($user),
            'is_host' => $user->pivot->is_host,
        ];
    }
}
