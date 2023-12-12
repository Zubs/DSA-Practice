<?php

use PHPUnit\Framework\TestCase;
use Zubs\Dsa\Trie\Trie;

final class TrieTest extends TestCase
{
    function testSearchReturnsFalseWhenKeyDoesNotExist()
    {
        $trie = new Trie();
        $this->assertFalse($trie->search('hello'));
    }

    function testSearchReturnsTrueWhenKeyExists()
    {
        $trie = new Trie();
        $trie->insert('hello');
        $this->assertTrue($trie->search('hello'));
    }

    function testInsertAddsKey()
    {
        $trie = new Trie();
        $trie->insert('hello');

        $this->assertTrue($trie->search('hello'));
    }

    function testCollectAllWords()
    {
        $trie = new Trie();
        $trie->insert('hello');
        $trie->insert('world');
        $trie->insert('hell');
        $trie->insert('help');
        $trie->insert('helping');
        $words = $trie->collectAllWords();
        $this->assertEquals(['hello', 'world', 'hell', 'help', 'helping'], $words);
    }
}
