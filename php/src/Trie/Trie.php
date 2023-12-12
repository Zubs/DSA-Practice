<?php

namespace Zubs\Dsa\Trie;

class Trie
{
    private TrieNode $root;

    public function __construct()
    {
        $this->root = new TrieNode();
    }

    /**
     * Check if a key exists in the trie
     * @param string $key Key to search for
     * @return bool
     */
    public function search(string $key): bool
    {
        $currentNode = $this->root;

        foreach (str_split($key) as $char) {
            if ($currentNode->hasChild($char)) {
                $currentNode = $currentNode->getChild($char);
            } else {
                return false;
            }
        }

        return true;
    }

    /**
     * Insert a key into the trie
     * @param string $key Key to insert. This could be a word
     * @return void
     */
    public function insert(string $key): void
    {
        $currentNode = $this->root;
        $chars = str_split($key);

        foreach ($chars as $char) {
            if (!$currentNode->hasChild($char)) {
                $currentNode->addChild($char);
            }

            $currentNode = $currentNode->getChild($char);
        }

        $currentNode->addChild('*');
    }

    public function collectAllWords($node = null, $word = '', $words = [])
    {
        $node = $node ?? $this->root;

        var_dump($node);
    }
}
