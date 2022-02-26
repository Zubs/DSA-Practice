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
        $new_node = new DoublyListNode($data);

        if (is_null($this->first_node)) return false;
        else {
            $previous_node = null;
            $current_node = $this->first_node;

            while (!is_null($current_node)) {
                if ($current_node->data === $target) {
                    if (is_null($previous_node)) $this->insertFirst($data);
                    else {
                        $new_node->next = $current_node;
                        $current_node->prev = $new_node;
                        $previous_node->next = $new_node;
                        $new_node->prev = $previous_node;

                        $this->total_nodes += 1;
                    }

                    break;
                }

                $previous_node = $current_node;
                $current_node = $current_node->next;
            }

            return true;
        }
    }

    public function insertAfter(string $data, string $target): bool
    {
        $new_node = new DoublyListNode($data);

        if (is_null($this->first_node)) return false;
        else {
            $current_node = $this->first_node;
            $next_node = $current_node->next;

            while (!is_null($current_node)) {
                if ($current_node->data === $target) {
                    $new_node->next = $next_node;
                    $new_node->prev = $current_node;
                    $current_node->next = $new_node;

                    if (!is_null($next_node)) $next_node->prev = $new_node;

                    $this->total_nodes += 1;
                    break;
                }

                $current_node = $current_node->next;
                $next_node = $current_node->next;
            }

            return true;
        }
    }

    public function delete(string $data): bool
    {
        if (is_null($this->first_node)) return false;
        else {
            $current_node = $this->first_node;
            $previous_node = $current_node->prev;
            $next_node = $current_node->next;

            while (!is_null($current_node)) {
                if ($current_node->data === $data) {
                    if (is_null($previous_node)) {
                        $this->deleteFirst();
                        break;
                    }

                    if (is_null($next_node)) {
                        $this->deleteLast();
                        break;
                    }

                    $previous_node->next = $next_node;
                    $next_node->prev = $previous_node;
                    $this->total_nodes -= 1;
                    break;
                } else {
                    $previous_node = $current_node;
                    $current_node = $next_node;
                    $next_node = $current_node->next;
                }
            }

            return true;
        }
    }

    public function deleteFirst(): bool
    {
        if (is_null($this->first_node)) return false;
        else {
            if (!is_null($this->first_node->next)) {
                $this->first_node = $this->first_node->next;
                $this->first_node->prev = null;
            } else $this->first_node = null;

            $this->total_nodes -= 1;
            return true;
        }
    }

    public function search(string $data): DoublyListNode | bool
    {
        if (!$this->total_nodes) return false;
        else {
            $current_node = $this->first_node;

            while (!is_null($current_node)) {
                if ($current_node->data === $data) return $current_node;
                else {
                    $current_node = $current_node->next;
                }
            }

            return false;
        }
    }

    public function getNthNode(int $index): DoublyListNode | bool
    {
        if (is_null($this->first_node)) return false;
        else {
            $count = 1;
            $current_node = $this->first_node;

            while (!is_null($current_node)) {
                if ($count === $index) return $current_node;
                else {
                    $count += 1;
                    $current_node = $current_node->next;
                }
            }

            return false;
        }
    }

    public function reverse(): bool
    {
        if (
            !$this->total_nodes ||
            is_null($this->first_node) ||
            is_null($this->first_node->next)
        ) return false;
        else {
            $current_node = $this->first_node;
            $reversed_list = new self();

            while (!is_null($current_node->next)) {
                $reversed_list->insertFirst($current_node->data);
                $current_node = $current_node->next;
            }
            $reversed_list->insertFirst($current_node->data);

            $this->first_node = $reversed_list->first_node;
            return true;
        }
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
