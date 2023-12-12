<?php

use PHPUnit\Framework\TestCase;
use Zubs\Dsa\Trie\Trie;
use function SebastianBergmann\ObjectGraph\object_graph_dump;

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
        $image_name = 'images/' . __FUNCTION__ . '.png';
        object_graph_dump($image_name, $trie);
//        $words = $trie->collectAllWords();
//        $this->assertEquals(['hello', 'world', 'hell', 'help', 'helping'], $words);
    }
}
