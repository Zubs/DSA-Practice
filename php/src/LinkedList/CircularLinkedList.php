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

        if (is_null($this->first_node)) {
            $this->first_node = $new_node;
            $this->last_node = $new_node;
            // $this->last_node->next = $this->first_node;
        } else {
            $current_first_node = $this->first_node;
            $this->first_node = $new_node;
            $this->first_node->next = $current_first_node;
            $this->last_node->next = $this->first_node;
        }

        $this->total_nodes += 1;

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

    public function delete (string $data): bool {
        if (is_null($this->first_node)) return false;
        else {
            $current_node = $this->first_node;
            $previous_node = $this->last_node;
            $next_node = $current_node->next;

            while (!is_null($current_node->next) && $current_node->next !== $this->first_node) {
                if ($current_node->data === $data) {
                    $previous_node->next = $next_node;
                    $this->total_nodes -= 1;
                    break;
                } else {
                    $previous_node = $current_node;
                    $current_node = $current_node->next;
                    $next_node = $current_node->next;
                }
            }

            if ($current_node === $this->last_node) {
                $previous_node->next = $this->first_node;
                 $this->total_nodes -= 1;
            }

            return true;
        }
    }

    public function deleteFirst(): bool {
        if (is_null($this->first_node)) return false;
        else {
            if (!is_null($this->first_node->next)) {
                $this->last_node->next = $this->first_node->next;
                $this->first_node = $this->first_node->next;
            } else $this->first_node = null;

            $this->total_nodes -= 1;
            return true;
        }
    }

    public function deleteLast(): bool {
        if (is_null($this->first_node)) return false;
        else {
            if (!is_null($this->last_node)) {
                $current_node = $this->first_node;
                $previous_node = null;

                while ($current_node !== $this->last_node) {
                    $previous_node = $current_node;
                    $current_node = $current_node->next;
                }

                $previous_node->next = $this->first_node;
                $this->total_nodes -= 1;
                return true;
            } else return $this->deleteFirst();
        }
    }

    public function search(string $data): ListNode | bool {
        if (!$this->total_nodes) return false;
        else {
            $current_node = $this->first_node;

            while (!is_null($current_node) && $current_node->next !== $this->first_node) {
                if ($current_node->data === $data) return $current_node;
                else $current_node = $current_node->next;
            }

            if ($current_node->data === $data) return $current_node;

            return false;
        }
    }

    public function getNthNode(int $index): ListNode | bool {
        if (is_null($this->first_node)) return false;
        else {
            $count = 1;
            $current_node = $this->first_node;

            while (!is_null($current_node) && $current_node->next !== $this->first_node) {
                if ($count === $index) return $current_node;
                else {
                    $count += 1;
                    $current_node = $current_node->next;
                }
            }

            if ($count === $index) return $current_node;

            return false;
        }
    }

    /**
     * This method is used to get the size of the circular linked list.
     *
     * @return int The total number of nodes in the list.
     */
    public function size(): int
    {
        return $this->total_nodes;
    }

    
    public function reverse(): bool
    {
        if (
            !$this->total_nodes ||
            is_null($this->first_node) ||
            is_null($this->last_node)
        ) return false;

        $current_node = $this->first_node;
        $reversed_list = new self();

        while (!is_null($current_node) && $current_node->next !== $this->first_node) {
            $reversed_list->insertFirst($current_node->data);
            $current_node = $current_node->next;
        }

        $reversed_list->insertFirst($current_node->data);

        $this->first_node = $reversed_list->first_node;
        $this->last_node = $reversed_list->last_node;

        return true;
    }

    /**
     * This method is used to display the circular linked list.
     *
     * @return void
     */
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
