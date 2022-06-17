<?php

namespace Zubs\Dsa\BinaryTree;

class BinaryNode
{
    public int $data;
    public BinaryNode | null $left = null;
    public BinaryNode | null $right = null;

    /**
     * @param int $data
     */
    public function __construct(int $data)
    {
        $this->data = $data;
    }

    public function addChildren(BinaryNode | null $left, BinaryNode | null $right): bool
    {
        $this->left = $left;
        $this->right = $right;

        return true;
    }
}
