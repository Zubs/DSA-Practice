<?php

namespace Zubs\Dsa\LinkedList;

class CircularLinkedList extends Base
{
    public function insert(string $data): bool
    {
        $new_node = new ListNode($data);

        if (is_null($this->first_node)) $this->first_node = $new_node;
        else {
            $current_node = $this->first_node;

            if (!is_null($current_node->next)) {
                while ($current_node->next !== $this->first_node) $current_node = $current_node->next;
            }

            $current_node->next = $new_node;
            $new_node->next = $this->first_node;
        }

        $this->total_nodes += 1;
        return true;
    }

    public function display(): void
    {
        echo sprintf("There are %s items in the list", $this->total_nodes) . PHP_EOL;

        $current_node = $this->first_node;

        while (!is_null($current_node) && $current_node->next !== $this->first_node) {
            echo $current_node->data . PHP_EOL;
            $current_node = $current_node->next;
        }

        if ($current_node) echo $current_node->data . PHP_EOL;
    }
}
