<?php

namespace Zubs\Dsa\BinaryTree;

class BinaryTree
{
    public BinaryNode | null $root = null;

    public function insert(string $data): bool
    {
        $node = new BinaryNode($data);

        if ($this->isEmpty()) {
            $this->root = $node;

            return true;
        } else {
            return $this->insertNode($node, $this->root);
        }
    }

    public function isEmpty(): bool
    {
        return is_null($this->root);
    }

    public function insertNode(BinaryNode $new_node, BinaryNode $current_node): bool
    {
        if ($new_node->data < $current_node->data) {
            if (is_null($current_node->left)) {
                return $current_node->addChildren($new_node, $current_node->right);
            } else {
                $current_node = $current_node->left;

                return $this->insertNode($new_node, $current_node);
            }
        } else if ($new_node->data > $current_node->data) {
            if (is_null($current_node->right)) {
                return $current_node->addChildren($current_node->left, $new_node);
            } else {
                $current_node = $current_node->right;

                return $this->insertNode($new_node, $current_node);
            }
        } else {
            return false;
        }
    }

    public function retrieve()
    {}
}
