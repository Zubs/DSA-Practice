<?php

namespace Zubs\Dsa\LinkedList;

class CircularLinkedList extends Base
{
    private ListNode | null $last_node = null;

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
            $this->last_node = $new_node;
        }

        $this->total_nodes += 1;
        return true;
    }

    public function insertFirst(string $data): bool
    {
        $new_node = new ListNode($data);

        if (is_null($this->first_node)) $this->first_node = $new_node;
        else {
            $current_first_node = $this->first_node;
            $this->first_node = $new_node;
            $this->first_node->next = $current_first_node;
            $this->last_node->next = $this->first_node;
        }

        return true;
    }

    public function insertBefore (string $data, string $target): bool
    {
        $new_node = new ListNode($data);

        if (is_null($this->first_node)) return false;
        else {
            $previous_node = null;
            $current_node = $this->first_node;

            while (!is_null($current_node->next) && $current_node->next !== $this->first_node) {
                if ($current_node->data === $target) {
                    if (is_null($previous_node)) {
                        $this->insertFirst($data);
                    } else {
                        $new_node->next = $current_node;
                        $previous_node->next = $new_node;

                        $this->total_nodes += 1;
                    }

                    break;
                }
                
                $previous_node = $current_node;
                $current_node = $current_node->next;
            }

            if ($current_node->next === $this->first_node) {
                $new_node->next = $current_node;
                $previous_node->next = $new_node;

                $this->total_nodes += 1;
            }

            return true;
        }
    }

    public function insertAfter(string $data, string $target): bool {
        $new_node = new ListNode($data);

        if (is_null($this->first_node)) return false;
        else {
            $current_node = $this->first_node;
            $next_node = $current_node->next;

            while (!is_null($current_node->next) && $current_node->next !== $this->first_node) {
                if ($current_node->data === $target) {
                    $new_node->next = $next_node;
                    $current_node->next = $new_node;

                    $this->total_nodes += 1;
                    break;
                }

                $current_node = $current_node->next;
                $next_node = $current_node->next;
            }

            if ($current_node->next === $this->first_node) {
                $current_last_node = $this->last_node;

                $new_node->next = $this->first_node;
                $current_last_node->next = $new_node;
                $this->last_node = $new_node;

                $this->total_nodes += 1;
            }

            return true;
        }
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
