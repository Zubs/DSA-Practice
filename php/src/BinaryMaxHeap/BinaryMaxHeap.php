<?php

namespace Zubs\Dsa\BinaryMaxHeap;

class BinaryMaxHeap
{
    private array $data = [];

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

    private function root_node()
    {
        return $this->data[0];
    }

    private function last_node()
    {
        return $this->data[count($this->data) - 1];
    }

    private function left_child_index(int $parent_index): int
    {
        return (2 * $parent_index) + 1;
    }

    private function right_child_index(int $parent_index): int
    {
        return (2 * $parent_index) + 2;
    }
}
