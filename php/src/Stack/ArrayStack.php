<?php

namespace Zubs\Dsa\Stack;

use OverflowException, UnderflowException;

/**
 * An implementation of the Stack data structure using PHP arrays.
 */
class ArrayStack extends Base
{
    /**
     * @param int $limit
     */
    public function __construct(int $limit)
    {
        $this->limit = $limit;
    }

    public function push(string $data): bool
    {
        if (count($this->stack) < $this->limit) {
            array_push($this->stack, $data);

            return true;
        } else throw new OverflowException('Stack is full');
    }

    public function pop(): string
    {
        if ($this->isEmpty()) throw new UnderflowException('Stack is empty');
        else return array_pop($this->stack);
    }

    public function top(): string
    {
        return end($this->stack);
    }

    public function isEmpty(): bool
    {
        return empty($this->stack);
    }
}
