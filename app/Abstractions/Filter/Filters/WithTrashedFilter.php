<?php

namespace App\Abstractions\Filter\Filters;

use App\Abstractions\Filter\Filter;
use Illuminate\Database\Eloquent\Builder;

/**
 *
 */
class WithTrashedFilter extends Filter
{
    /**
     * @param Builder $query
     * @return Builder
     */
    public function apply(Builder $query): Builder
    {

        $query = $query->withTrashed();

        if ($this->parameterBag->boolean('only')) {
            $query = $query->where("deleted_at", "!=", null);
        }

        return  $query;
    }
}
