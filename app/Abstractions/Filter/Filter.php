<?php

namespace App\Abstractions\Filter;

use Illuminate\Database\Eloquent\Builder;

/**
 *
 */
abstract class Filter
{
    /**
     * @var ParameterBag|null
     */
    protected ?ParameterBag $parameterBag = null;

    /**
     * @param ParameterBag $parameterBag
     * @return void
     */
    public function setParameterBag(ParameterBag $parameterBag): void
    {
        $this->parameterBag = $parameterBag;
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public abstract function apply(Builder $query): Builder;
}
