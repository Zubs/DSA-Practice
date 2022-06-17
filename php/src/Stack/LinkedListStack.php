<?php

namespace Zubs\Dsa\Stack;

use OverflowException, UnderflowException;
use Zubs\Dsa\LinkedList\LinearLinkedList;

/**
 * An implementation of the Stack data structure using LinearLinkedList
 */
class LinkedListStack extends Base
{
    public function __construct()
    {
        $this->stack = new LinearLinkedList();
    }

    public function push(string $data): bool
    {
        return $this->stack->insert($data);
    }

    public function pop(): string
    {
        if ($this->isEmpty()) throw new UnderflowException('Stack is empty');
        else {
            $last_item = $this->top();
            $this->stack->deleteLast();

            return $last_item;
        }
    }

    public function top(): string
    {
        return $this->stack->getNthNode($this->stack->getSize())->data;
    }

    public function isEmpty(): bool
    {
        return $this->stack->getSize() === 0;
    }
}
