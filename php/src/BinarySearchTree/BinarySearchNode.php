<?php

namespace Zubs\Dsa\BinarySearchTree;

class BinarySearchNode
{
    public int $data;
    public BinarySearchNode | null $left = null;
    public BinarySearchNode | null $right = null;

    /**
     * @param int $data
     */
    public function __construct(int $data)
    {
        $this->data = $data;
    }

    public function addChildren(BinarySearchNode | null $left, BinarySearchNode | null $right): bool
    {
        $this->left = $left;
        $this->right = $right;

        return true;
    }
}
