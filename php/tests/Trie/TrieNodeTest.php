<?php

use PHPUnit\Framework\TestCase;
use Zubs\Dsa\Trie\TrieNode;

final class TrieNodeTest extends TestCase
{
    function testHasChildReturnsFalseWhenNoChildExists()
    {
        $trieNode = new TrieNode();
        $this->assertFalse($trieNode->hasChild('h'));
        $this->assertFalse($trieNode->hasChild('e'));
        $this->assertFalse($trieNode->hasChild('l'));
        $this->assertFalse($trieNode->hasChild('o'));
    }

    function testHasChildReturnsTrueWhenChildExists()
    {
        $trieNode = new TrieNode();
        $trieNode->addChild('h');
        $this->assertTrue($trieNode->hasChild('h'));
    }

    function testGetChildReturnsNullWhenNoChildExists()
    {
        $trieNode = new TrieNode();
        $this->assertNull($trieNode->getChild('h'));
        $this->assertNull($trieNode->getChild('e'));
        $this->assertNull($trieNode->getChild('l'));
        $this->assertNull($trieNode->getChild('o'));
    }

    function testGetChildReturnsChildWhenChildExists()
    {
        $trieNode = new TrieNode();
        $trieNode->addChild('h');
        $this->assertNotNull($trieNode->getChild('h'));
    }

    function testAddChildAddsChild()
    {
        $trieNode = new TrieNode();
        $trieNode->addChild('h');
        $this->assertTrue($trieNode->hasChild('h'));
    }
}
