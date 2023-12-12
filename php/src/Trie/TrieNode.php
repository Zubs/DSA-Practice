<?php

namespace Zubs\Dsa\Trie;

use Zubs\Dsa\HashTable\HashTable;

class TrieNode
{
    private HashTable $children;

    public function __construct()
    {
        $this->children = new HashTable();
    }

    /**
     * Check if a node has a child with the given character
     * @param string $char Character to check for existence
     * @return bool
     */
    public function hasChild(string $char): bool
    {
        return $this->children->getChildTree($char) !== null;
    }

    public function getChild(string $char): ?TrieNode
    {
        return $this->children->getChildTree($char);
    }

    public function addChild(mixed $char): void
    {
        $this->children->setChildTrie($char, new TrieNode());
    }
}
