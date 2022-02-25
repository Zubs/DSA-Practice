<?php

namespace Zubs\Dsa\LinkedList;

class DoublyLinkedList extends Base
{
    public function insert(string $data): bool
    {
        $new_node = new DoublyListNode($data);

        if (is_null($this->first_node)) $this->first_node = $new_node;
        else {
            $current_node = $this->first_node;
            $previous_node = $current_node->prev;

            while (!is_null($current_node->next)) {
                $previous_node = $current_node;
                $current_node = $current_node->next;
            }

            $current_node->next = $new_node;
            $new_node->prev = $current_node;
            $this->last_node = $new_node;
        }

        $this->total_nodes += 1;
        return true;
    }

    public function insertFirst(string $data): bool
    {
        $new_node = new DoublyListNode($data);

        if (is_null($this->first_node)) $this->first_node = $new_node;
        else {
            $current_first_node = $this->first_node;
            $new_node->next = $current_first_node;
            $current_first_node->prev = $new_node;
            $this->first_node = $new_node;
        }

        $this->total_nodes += 1;
        return true;
    }

    public function insertBefore(string $data, string $target): bool
    {
        // TODO: Implement insertBefore() method.
    }

    public function insertAfter(string $data, string $target): bool
    {
        // TODO: Implement insertAfter() method.
    }

    public function delete(string $data): bool
    {
        // TODO: Implement delete() method.
    }

    public function deleteFirst(): bool
    {
        // TODO: Implement deleteFirst() method.
    }

    public function deleteLast(): bool
    {
        // TODO: Implement deleteLast() method.
    }

    public function search(string $data): ListNode|bool
    {
        // TODO: Implement search() method.
    }

    public function getNthNode(int $index): ListNode|bool
    {
        // TODO: Implement getNthNode() method.
    }

    public function reverse(): bool
    {
        // TODO: Implement reverse() method.
    }

    public function display(): void
    {
        echo sprintf("There are %s items in the list", $this->total_nodes) . PHP_EOL;

        $current_node = $this->first_node;
        while (!is_null($current_node)) {
            echo $current_node->data . PHP_EOL;
            $current_node = $current_node->next;
        }
    }
}
