<?php

namespace App\Abstractions\Filter;

/**
 *
 */
class ParameterBag
{
    /**
     * @param array $params
     */
    public function __construct(private readonly array $params = [])
    {

    }

    /**
     * @param string|int $name
     * @param mixed|null $default
     * @return mixed
     */
    public function get(string|int $name, mixed $default = null): mixed
    {
        return $this->params[$name] ?? null;
    }

    /**
     * @return array
     */
    public function all(): array
    {
        return $this->params;
    }

    /**
     * @param string|int $name
     * @param bool $default
     * @return bool
     */
    public function boolean(string|int $name, bool $default = false): bool
    {
        return filter_var($this->get($name, $default), FILTER_VALIDATE_BOOLEAN);
    }
}
