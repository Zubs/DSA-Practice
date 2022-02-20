<?php

namespace Zubs\Dsa\LinkedList;

use Iterator;

class Base implements Iterator
{
    protected $_CURRENT_NODE = null;
    protected $_CURRENT_POSITION = 0;

    public function current(): string
    {
        return $this->_CURRENT_NODE->data;
    }

    public function next(): void
    {
        $this->_CURRENT_POSITION += 1;
        $this->_CURRENT_NODE = $this->_CURRENT_NODE->next;
    }

    public function key(): int
    {
        return $this->_CURRENT_POSITION;
    }

    public function rewind(): void
    {
        $this->_CURRENT_POSITION = 0;
        $this->_CURRENT_NODE = $this->first_node;
    }

    public function valid(): bool
    {
        return !is_null($this->_CURRENT_NODE);
    }
}
