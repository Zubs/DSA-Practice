<?php

namespace Zubs\Dsa\Stack;

abstract class Base
{
    protected int $limit;
    protected array $stack = [];

    /**
     * Add new item to the end of stack
     * @param string $data String data to be added to stack
     * @return bool true when the function completes
     */
    abstract public function push (string $data): bool;

    /**
     * Remove last item in array
     * @return string String data removed from array
     */
    abstract public function pop(): string;

    /**
     * Get the last item in the stack
     * @return string String data at the end of the stack
     */
    abstract public function top(): string;

    /**
     * Check if the stack is empty
     * @return bool true when the stack is empty
     */
    abstract public function isEmpty(): bool;
}
