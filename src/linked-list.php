<?php

/**
 * Structure of a listNode
 */
class ListNode
{
    public $data = null;
    public $next = null;

    /**
     * @param string|null $data
     */
    public function __construct(string $data = null)
    {
        $this->data = $data;
    }
}

/**
 * LinkedList Implementation
 */
class LinkedList
{
    private $first_node = null;
    private int $total_nodes = 0;

    /**
     * Add item to list
     * @param string|null $data String data to be added to list
     * @return bool true when the function completes
     */
    public function insert(string $data = null): bool
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

    /**
     * Add item to the beginning of the list (first node)
     * @param string|null $data String data to be added to list
     * @return bool true when the function completes
     */
    public function insertAtFirst(string $data = null): bool
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

    /**
     * Add item before some other node
     * @param string|null $data String data to be added to list
     * @param string|null $target String data to be searched for
     * @return bool true when the function completes
     */
    public function insertBefore(string $data = null, string $target = null): bool
    {
        $new_node = new ListNode($data);

        if (is_null($this->first_node)) return false;
        else {
            $previous = null;
            $current_node = $this->first_node;

            while (!is_null($current_node)) {
                if ($current_node->data === $target) {
                    if (is_null($previous)) {
                        $this->insertAtFirst($data);
                    } else {
                        $new_node->next = $current_node;
                        $previous->next = $new_node;

                        $this->total_nodes += 1;
                    }

                    break;
                }

                $previous = $current_node;
                $current_node = $current_node->next;
            }
        }

        return false;
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
     * Search for item in list
     * @param string|null $data String data to be searched
     * @return bool Returns whether the data exists in the list
     */
    public function search(string $data = null): bool
    {
        // Return false if list is empty. As I cannot search empty list.
        if (!$this->total_nodes) return false;
        else {
            $current_node = $this->first_node;

            while (!is_null($current_node)) {
                if ($current_node->data === $data) return true;
                else {
                    $current_node = $current_node->next;
                }
            }
        }

        return false;
    }

    /**
     * Diplays the nodes in the list
     */
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

$books = new LinkedList();
$books->insert('How to make money in days');
$books->insert('Why I love love');
$books->insert("Testing a third time: Zubair's secret");
$books->insertAtFirst("Hoping I make it first: Life too tuff");
$books->insertBefore("How to get away with murder", "Why I love love");
$books->insertAfter("I like this subject", "How to get away with murder");
$books->display();

echo $books->search("Why I love love") . PHP_EOL; // Returns true
