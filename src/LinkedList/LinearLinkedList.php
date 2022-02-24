<?php

namespace Zubs\Dsa\LinkedList;

/**
 * LinkedList Implementation
 */
class LinearLinkedList extends Base
{
    public function insert(string $data): bool
    {
        // Create new listNode
        $new_node = new ListNode($data);

        if (is_null($this->first_node)) {
            // If no node is in list, set newNode as first item
            $this->first_node = $new_node;
        } else {
            // Get first node
            $current_node = $this->first_node;

            // Loop to get last node
            while (!is_null($current_node->next)) {
                $current_node = $current_node->next;
            }

            // Set new node as next for the last node
            $current_node->next = $new_node;
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

            // Replace first node
            $this->first_node = $new_node;

            // Set its next as the former first node, the other links remain in place
            $this->first_node->next = $current_first_node;
        }

        $this->total_nodes += 1;

        return true;
    }

    public function insertBefore(string $data, string $target ): bool
    {
        $new_node = new ListNode($data);

        if (is_null($this->first_node)) return false;
        else {
            $previous_node = null;
            $current_node = $this->first_node;

            while (!is_null($current_node)) {
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

            return true;
        }
    }

    /**
     * Add item after some other node
     * @param string|null $data String data to be added to list
     * @param string|null $target String data to be searched for
     * @return bool true when function completes
     */
    public function insertAfter(string $data = null, string $target = null): bool
    {
        $new_node = new ListNode($data);

        if (is_null($this->first_node)) return false;
        else {
            $current_node = $this->first_node;
            $next_node = $current_node->next;

            while (!is_null($current_node)) {
                if ($current_node->data === $target) {
                    $new_node->next = $next_node;
                    $current_node->next = $new_node;

                    $this->total_nodes += 1;
                    break;
                }

                $current_node = $current_node->next;
                $next_node = $current_node->next;
            }
        }

        return true;
    }

    /**
     * Deletes the given data
     * @param string|null $data String data to be deleted
     * @return bool true when function completes
     */
    public function delete(string $data = null): bool
    {
        if (is_null($this->first_node)) return false;
        else {
            $current_node = $this->first_node;
            $previous_node = null;
            $next_node = $current_node->next;

            while (!is_null($current_node->data)) {
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
                    $this->total_nodes -= 1;
                    break;
                } else {
                    $previous_node = $current_node;
                    $current_node = $current_node->next;
                    $next_node = $current_node->next;
                }
            }

            return true;
        }
    }

    /**
     * Deletes the leading node
     * @return bool true when the function completes
     */
    public function deleteFirst(): bool
    {
        if (is_null($this->first_node)) return false;
        else {
            if (!is_null($this->first_node->next)) $this->first_node = $this->first_node->next;
            else $this->first_node = null;

            $this->total_nodes -= 1;
            return true;
        }
    }

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
     * @param string|null $data String data to be searched
     * @return ListNode|bool Returns the node or false if it is not in the list
     */
    public function search(string $data = null): ListNode | bool
    {
        // Return false if list is empty. As I cannot search empty list.
        if (!$this->total_nodes) return false;
        else {
            $current_node = $this->first_node;

            while (!is_null($current_node)) {
                if ($current_node->data === $data) return $current_node;
                else {
                    $current_node = $current_node->next;
                }
            }
        }

        return false;
    }

    /**
     * Get a node by its index in the list
     * @param int $index The nth position of the desired node
     * @return ListNode|bool The nth node
     */
    public function getNthNode(int $index = 1): ListNode | bool
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
        }
    }

    /**
     * Reverses the list
     * @return bool true when the function completes
     */
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
