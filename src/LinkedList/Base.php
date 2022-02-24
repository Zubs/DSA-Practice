<?php

namespace Zubs\Dsa\LinkedList;

use Iterator;

abstract class Base implements Iterator
{
    private $_CURRENT_NODE = null;
    private $_CURRENT_POSITION = 0;

    protected ListNode | null $first_node = null;
    protected int $total_nodes = 0;

    /**
     * Add item to list
     * @param string $data String data to be added to list
     * @return bool true when the function completes
     */
    abstract public function insert (string $data): bool;

    /**
     * Add item to the beginning of the list (first node)
     * @param string $data String data to be added to list
     * @return bool true when the function completes
     */
    abstract public function insertFirst (string $data): bool;

    /**
     * Add item before some other node
     * @param string $data String data to be added to list
     * @param string $target String data to be searched for
     * @return bool true when the function completes
     */
    abstract public function insertBefore (string $data, string $target): bool;

    /**
     * Diplays the nodes in the list
     */
    abstract public function display (): void;

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
