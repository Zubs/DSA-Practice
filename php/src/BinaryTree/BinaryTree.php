<?php

namespace Zubs\Dsa\BinaryTree;

class BinaryTree
{
    public BinaryNode | null $root = null;

    public function insert(int $data): bool
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

    public function retrieve($node): bool
    {
        if ($this->isEmpty()) return false;

        $current_node = $this->root;

        if ($node->data === $current_node->data) return true;
        else {
            return $this->retrieveNode($node, $current_node);
        }
    }

    public function retrieveNode(BinaryNode $node, BinaryNode $current_node): bool
    {
        if ($node->data < $current_node->data) {
            if (is_null($current_node->left)) return false;

            if ($current_node->left->data === $node->data) return true;

            return $this->retrieveNode($node, $current_node->left);
        } else if ($node->data > $current_node->data) {
            if (is_null($current_node->right)) return false;

            if ($current_node->right->data === $node->data) return true;

            return $this->retrieveNode($node, $current_node->right);
        } else {
            return false;
        }
    }

    public function remove(BinaryNode $node)
    {
        if ($this->isEmpty()) return false;

        if (!$this->retrieve($node)) return false;

        if ($node->data === $this->root->data) {
            $current_node = $this->root->left;

            while (!is_null($current_node->right)) $current_node = $current_node->right;

            $current_node->left = $this->root->left;
            $current_node->right = $this->root->right;

            $this->root = $current_node;

            return true;
        }
    }
}
