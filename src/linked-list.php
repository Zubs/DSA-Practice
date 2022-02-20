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
$books->display();
