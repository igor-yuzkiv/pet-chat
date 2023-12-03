<?php

namespace App\Containers\Conversation\Filters;

use App\Abstractions\Filter\Filter;
use Illuminate\Database\Eloquent\Builder;

/**
 *
 */
class UserConversationsFilter extends Filter
{
    /**
     * @param Builder $query
     * @return Builder
     */
    public function apply(Builder $query): Builder
    {
        $userId = $this->parameterBag->get(0);
        if (!$userId) {
            throw new \InvalidArgumentException('User id is required');
        }

        return $query->whereHas('members', function (Builder $query) use ($userId) {
            $query->where('user_id', $userId);
        });
    }
}
