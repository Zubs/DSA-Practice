<?php

namespace Zubs\Dsa\BinaryTree;

class BinaryTree
{
    private BinaryNode | null $root = null;

    /**
     * Add a new node to the tree
     * @param int $data Number to add to the tree
     * @return bool True or False expressing success
     */
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

    /**
     * Check if the tree has any node(s) in it
     * @return bool True when empty, False when not empty
     */
    public function isEmpty(): bool
    {
        return is_null($this->root);
    }

    /**
     * Adds a new node to the tree by attaching it to a parent
     * @param BinaryNode $new_node New node to be added to the tree
     * @param BinaryNode $current_node The parent of the new node
     * @return bool True or False expressing success
     */
    private function insertNode(BinaryNode $new_node, BinaryNode $current_node): bool
    {
        if ($new_node->data === $current_node->data) {
            return false;
        }

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
        }

        return true;
    }

    /**
     * Search for Node or value in tree
     * @param BinaryNode|int $node Node to search for
     * @return bool True when node is found, False when otherwise
     */
    public function search(BinaryNode | int $node): bool
    {
        if ($this->isEmpty()) return false;

        if (gettype($node) !== "object") {
            $node = new BinaryNode($node);
        }

        $current_node = $this->root;

        if ($node->data === $current_node->data) return true;
        else {
            return $this->retrieveNode($node, $current_node);
        }
    }

    /**
     * @param BinaryNode $node
     * @param BinaryNode $current_node
     * @return bool True or False to represent success
     */
    private function retrieveNode(BinaryNode $node, BinaryNode $current_node): bool
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

    /**
     * Remove a value or Node from the tree
     * @param BinaryNode|int $node Node or value to remove from the tree
     * @return bool True or False to represent status
     */
    public function remove(BinaryNode | int $node, bool $remove_children = true): bool
    {
        if ($this->isEmpty()) return false;

        if (!$this->search($node)) return false;

        if (gettype($node) !== "object") {
            $node = new BinaryNode($node);
        }

        if ($node->data === $this->root->data) {
            if ($remove_children) {
                $this->root = null;

                return true;
            }

            $root = $this->root;

            if (is_null($root->left) && is_null($root->right)) {
                $this->root = null;

                return true;
            }

            return false;
        }

        $previous_node = null;
        $relationship = null;
        $current_node = $this->root;

        while (!is_null($current_node)) {
            if ($node->data > $current_node->data) {
                $previous_node = $current_node;
                $relationship = 'right';
                $current_node = $current_node->right;
            }

            if ($node->data < $current_node->data) {
                $previous_node = $current_node;
                $relationship = 'left';
                $current_node = $current_node->left;
            }

            if ($remove_children) {
                if ($relationship === 'right') {
                    $previous_node->right = null;

                    return true;
                }

                if ($relationship === 'left') {
                    $previous_node->left = null;

                    return true;
                }
            }

            // Todo: Implement a way to keep the children
        }

        return true;
    }
}
