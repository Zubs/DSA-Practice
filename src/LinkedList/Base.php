<?php

namespace Zubs\Dsa\LinkedList;

use Iterator;

abstract class Base implements Iterator
{
    private $_CURRENT_NODE = null;
    private $_CURRENT_POSITION = 0;

    protected DoublyListNode | ListNode | null $first_node = null;
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
     * Add item after some other node
     * @param string $data String data to be added to list
     * @param string $target String data to be searched for
     * @return bool true when function completes
     */
    abstract public function insertAfter(string $data, string $target): bool;

    /**
     * Deletes the given data
     * @param string $data String data to be deleted
     * @return bool true when function completes
     */
    abstract public function delete (string $data): bool;

    /**
     * Deletes the leading node
     * @return bool true when the function completes
     */
    abstract public function deleteFirst(): bool;

    /**
     * Deletes the final node
     * @return bool true when the function completes
     */
    abstract public function deleteLast(): bool;

    /**
     * Search for item in list
     * @param string $data String data to be searched
     * @return ListNode|bool Returns the node or false if it is not in the list
     */
    abstract public function search(string $data): ListNode | bool;

    /**
     * Get a node by its index in the list
     * @param int $index The nth position of the desired node
     * @return ListNode|bool The nth node
     */
    abstract public function getNthNode(int $index): ListNode | bool;

    /**
     * Reverses the list
     * @return bool true when the function completes
     */
    abstract public function reverse(): bool;

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
