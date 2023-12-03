<?php

namespace App\Abstractions\Filter;

use Illuminate\Database\Eloquent\Builder;

/**
 *
 */
trait HasFilter
{
    /**
     * @param Builder $query
     * @param array|Filter $filters
     * @return Builder
     */
    public function scopeFilter(Builder $query, array|Filter $filters): Builder
    {
        if ($filters instanceof Filter) {
            return $filters->apply($query);
        }

        $modelFilters = $this->getModelFilters();

        foreach ($filters as $item) {
            if ($item instanceof Filter) {
                $query = $item->apply($query);
                continue;
            }

            if (is_string($item)) {
                FilterManager::resolver($item, $modelFilters)->apply($query);
                continue;
            }

            throw new \InvalidArgumentException('Invalid filter');
        }

        return $query;
    }

    protected function getModelFilters(): array
    {
        return $this->filters ?? [];
    }
}
