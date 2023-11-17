<?php

namespace Zubs\Dsa\BinaryMaxHeap;

class BinaryMaxHeap
{
    private array $data = [];

    /**
     * Insert a value into the heap
     * @param int $value The value to insert into the heap
     * @return bool True if the value was inserted successfully
     */
    public function insert(int $value): bool
    {
        $this->data[] = $value;

        $new_node_index = count($this->data) - 1;

        while ($new_node_index > 0) {
            $parent_index = $this->parent_index($new_node_index);

            if ($this->data[$new_node_index] <= $this->data[$parent_index]) {
                break;
            }

            $this->swap($new_node_index, $parent_index);

            $new_node_index = $parent_index;
        }

        return true;
    }

    /***
     * Find the index of the parent node of a given child node
     * @param int $child_index The index of the child node
     * @return int The index of the parent node
     */
    private function parent_index(int $child_index): int
    {
        return floor(($child_index - 1) / 2);
    }

    /**
     * Switch the position of two nodes in the heap.
     * It is used for trickle up and trickle down
     * @param int $first_index
     * @param int $second_index
     * @return void
     */
    private function swap(int $first_index, int $second_index): void
    {
        $temp = $this->data[$first_index];
        $this->data[$first_index] = $this->data[$second_index];
        $this->data[$second_index] = $temp;
    }

    public function delete(): bool
    {
        $this->data[0] = $this->last_node();

        array_pop($this->data);

        $parent_index = 0;

        while ($this->has_greater_child($parent_index)) {
            $larger_child_index = $this->larger_child_index($parent_index);

            $this->swap($parent_index, $larger_child_index);

            $parent_index = $larger_child_index;
        }

        return true;
    }

    /**
     * Get the last node in the heap
     * @return int The last node in the heap
     */
    private function last_node(): int
    {
        return $this->data[count($this->data) - 1];
    }

    /**
     * Check if a given parent node has a greater child node
     * @param int $parent_index The index of the parent node
     * @return bool True if the parent node has a greater child node
     */
    private function has_greater_child(int $parent_index): bool
    {
        $left_child_index = $this->left_child_index($parent_index);
        $right_child_index = $this->right_child_index($parent_index);

        if ((
            isset($this->data[$left_child_index]) &&
            $this->data[$left_child_index] > $this->data[$parent_index]
        ) || (
            isset($this->data[$right_child_index]) &&
            $this->data[$right_child_index] > $this->data[$parent_index]
        )) return true;

        return false;
    }

    /**
     * Get the index of the left child of a given parent node
     * @param int $parent_index The index of the parent node
     * @return int The index of the left child node
     */
    private function left_child_index(int $parent_index): int
    {
        return (2 * $parent_index) + 1;
    }

    /**
     * Get the index of the right child of a given parent node
     * @param int $parent_index The index of the parent node
     * @return int The index of the right child node
     */
    private function right_child_index(int $parent_index): int
    {
        return (2 * $parent_index) + 2;
    }

    private function larger_child_index(int $parent_index): int
    {
        $left_child_index = $this->left_child_index($parent_index);
        $right_child_index = $this->right_child_index($parent_index);

        return max(
            isset($this->data[$left_child_index]) ? $left_child_index : null,
            isset($this->data[$right_child_index]) ? $right_child_index : null
        );
    }
}
