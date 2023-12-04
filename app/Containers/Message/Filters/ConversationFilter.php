<?php

namespace App\Containers\Message\Filters;

use App\Abstractions\Filter\Filter;
use Illuminate\Database\Eloquent\Builder;

/**
 *
 */
class ConversationFilter extends Filter
{
    /**
     * @param Builder $query
     * @return Builder
     */
    public function apply(Builder $query): Builder
    {
        return $query->where("conversation_id", $this->parameterBag->get(0));
    }
}
