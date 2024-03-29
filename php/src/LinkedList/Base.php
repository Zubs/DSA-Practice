<?php

namespace Zubs\Dsa\LinkedList;

use Iterator;

abstract class Base implements Iterator
{
    private DoublyListNode | ListNode | null $_CURRENT_NODE = null;
    private int $_CURRENT_POSITION = 0;

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
    public function deleteLast(): bool
    {
        if (is_null($this->first_node)) return false;
        else {
            $current_node = $this->first_node;
            $previous_node = null;

            while (!is_null($current_node->next)) {
                $previous_node = $current_node;
                $current_node = $current_node->next;
            }

            $previous_node->next = null;

            $this->total_nodes -= 1;
            return true;
        }
    }

    /**
     * Search for item in list
     * @param string $data String data to be searched
     * @return DoublyListNode|ListNode|bool Returns the node or false if it is not in the list
     */
    abstract public function search(string $data): DoublyListNode | ListNode | bool;

    /**
     * Get a node by its index in the list
     * @param int $index The nth position of the desired node
     * @return DoublyListNode|ListNode|bool The nth node
     */
    abstract public function getNthNode(int $index): DoublyListNode | ListNode | bool;

    /**
     * Reverses the list
     * @return bool true when the function completes
     */
    abstract public function reverse(): bool;

    /**
     * Diplays the nodes in the list
     */
    abstract public function display (): void;

    /**
     * Returns the number of nodes in the list
     * @return int Number of nodes in list
     */
    public function getSize (): int
    {
        return $this->total_nodes;
    }

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
