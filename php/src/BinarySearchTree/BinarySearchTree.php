<?php

namespace Zubs\Dsa\BinarySearchTree;

class BinarySearchTree
{
    private BinarySearchNode | null $root = null;

    /**
     * Add a new node to the tree
     * @param int $data Number to add to the tree
     * @return bool True or False expressing success
     */
    public function insert(int $data): bool
    {
        $node = new BinarySearchNode($data);

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
     * @param BinarySearchNode $new_node New node to be added to the tree
     * @param BinarySearchNode $current_node The parent of the new node
     * @return bool True or False expressing success
     */
    private function insertNode(BinarySearchNode $new_node, BinarySearchNode $current_node): bool
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
     * @param BinarySearchNode|int $node Node to search for
     * @return bool True when node is found, False when otherwise
     */
    public function search(BinarySearchNode | int $node): bool
    {
        if ($this->isEmpty()) return false;

        if (gettype($node) !== "object") {
            $node = new BinarySearchNode($node);
        }

        $current_node = $this->root;

        if ($node->data === $current_node->data) return true;
        else {
            return $this->retrieveNode($node, $current_node);
        }
    }

    /**
     * @param BinarySearchNode $node
     * @param BinarySearchNode $current_node
     * @return bool True or False to represent success
     */
    private function retrieveNode(BinarySearchNode $node, BinarySearchNode $current_node): bool
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
     * @param BinarySearchNode|int $node Node or value to remove from the tree
     * @return bool True or False to represent status
     */
    public function remove(BinarySearchNode | int $node): bool
    {
        if ($this->isEmpty()) return false;

        if (!$this->search($node)) return false;

        if (gettype($node) !== "object") {
            $node = new BinarySearchNode($node);
        }

        if ($node->data === $this->root->data) {
            return $this->removeRoot();
        }

        $previous_node = null;
        $relationship = null;
        $current_node = $this->root;

        while (!is_null($current_node)) {
            if ($node->data > $current_node->data) {
                $previous_node = $current_node;
                $relationship = 'right';
                $current_node = $current_node->right;
            } else if ($node->data < $current_node->data) {
                $previous_node = $current_node;
                $relationship = 'left';
                $current_node = $current_node->left;
            } else {
                // If the node to be deleted has no children
                if (is_null($current_node->left) && is_null($current_node->right)) {
                    if ($relationship === 'left') {
                        $previous_node->left = null;

                        return true;
                    } else {
                        $previous_node->right = null;

                        return true;
                    }
                // If the current node has only a right node
                } else if (!is_null($current_node->right) && is_null($current_node->left)) {
                    if ($relationship === 'left') {
                        $previous_node->left = $current_node->right;

                        return true;
                    } else {
                        $previous_node->right = $current_node->right;

                        return true;
                    }
                // If the current node has only a left node
                } else if (is_null($current_node->right) && !is_null($current_node->left)) {
                    if ($relationship === 'left') {
                        $previous_node->left = $current_node->left;

                        return true;
                    } else {
                        $previous_node->right = $current_node->left;

                        return true;
                    }
                // If the current node has both left and right nodes
                } else {
                    $successor = $this->getSuccessor($current_node);
                    $former_left = $current_node->left;
                    $former_right = $current_node->right;

                    if ($relationship === 'left') {
                        $previous_node->left = $successor;
                    } else {
                        $previous_node->right = $successor;
                    }

                    if ($former_right->data !== $successor->data) {
                        $successor->right = $former_right;
                    }

                    if ($former_left->data !== $successor->data) {
                        $successor->left = $former_left;
                    }
                }
            }
        }

        return true;
    }

    private function removeRoot(): true
    {
        $root = $this->root;

        // If the root has no children
        if (is_null($root->left) && is_null($root->right)) {
            $this->root = null;

            return true;
            // If the root has only a right node
        } else if (is_null($root->left) && !is_null($root->right)) {
            $this->root = $root->right;

            return true;
            // If the root has only a left node
        } else if (is_null($root->right) && !is_null($root->left)) {
            $this->root = $root->left;

            return true;
            // If the root has both left and right nodes
        } else {
            $successor = $this->getSuccessor($root);

            $former_left = $root->left;
            $former_right = $root->right;

            $this->root = $successor;
            $this->root->left = $former_left;
            $this->root->right = $former_right;

            return true;
        }
    }

    private function getSuccessor(BinarySearchNode $current_node): ?BinarySearchNode
    {
        $successor_parent = $current_node;
        $successor = $current_node->right;

        while (!is_null($successor->left)) {
            $successor_parent = $successor;
            $successor = $successor->left;
        }

        $successor_parent->left = null;

        if (!is_null($successor->right)) {
            $successor_parent->left = $successor->right;
        }

        return $successor;
    }

    public function print(BinarySearchNode $node = null): void
    {
        if (is_null($node)) {
            $node = $this->root;
        }

        if (!is_null($node->left)) {
            $this->print($node->left);
        }

        echo $node->data . "\n";

        if (!is_null($node->right)) {
            $this->print($node->right);
        }
    }
}
