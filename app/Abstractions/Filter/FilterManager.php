<?php

namespace App\Abstractions\Filter;

/**
 *
 */
final class FilterManager
{
    /**
     * @param string $schema
     * @param array $filterOptions
     * @return Filter
     */
    public static function resolver(string $schema, array $filterOptions): Filter
    {
        $alias = preg_replace('/\((.*?)\)/', '', $schema);
        if (!in_array($alias, array_keys($filterOptions))) {
            throw new \InvalidArgumentException("Filter {$alias} not found");
        }
        $paramsBag = self::getParamsBag($schema);

        /**@var Filter $filterInstance */
        $filterInstance = new $filterOptions[$alias]();
        $filterInstance->setParameterBag($paramsBag);

        return $filterInstance;
    }

    /**
     * @param string $schema
     * @return ParameterBag
     */
    public static function getParamsBag(string $schema): ParameterBag
    {
        preg_match('/\((.*?)\)/', $schema, $matches);
        if (!isset($matches[1])) {
            return new ParameterBag();
        }

        $attributes = [];
        foreach (explode(',', $matches[1]) as $attribute) {
            [$name, $value] = array_pad(explode(':', $attribute), 2, '');

            $name = trim($name) ?: null;
            $value = trim($value) ?: null;

            if (!$name && !$value) {
                continue;
            }

            if (!$value) {
                $attributes[] = $name;
                continue;
            }

            $attributes[$name] = trim($value) ?: null;
        }
        return new ParameterBag($attributes);
    }

}
