<?php

use PHPUnit\Framework\TestCase;
use Zubs\Dsa\LinkedList\CircularLinkedList;

class CircularLinkedListTest extends TestCase
{
    public function testInsert()
    {
        $list = new CircularLinkedList();
        $this->assertTrue($list->insert('data1'));
        $this->assertTrue($list->insert('data2'));
    }

    public function testInsertEmptyData()
    {
        $list = new CircularLinkedList();
        $this->assertTrue($list->insert(''));
    }

    public function testInsertFirst()
    {
        $list = new CircularLinkedList();
        $this->assertTrue($list->insertFirst('data1'));
        $this->assertTrue($list->insertFirst('data2'));
    }

    public function testInsertFirstEmptyData()
    {
        $list = new CircularLinkedList();
        $this->assertTrue($list->insertFirst(''));
    }

    public function testInsertBefore()
    {
        $list = new CircularLinkedList();
        $list->insert('data1');
        $this->assertFalse($list->insertBefore('data0', 'data3'));
        $this->assertTrue($list->insertBefore('data0', 'data1'));
    }

    public function testInsertBeforeNonExistentTarget()
    {
        $list = new CircularLinkedList();
        $list->insert('data1');
        $this->assertFalse($list->insertBefore('data0', 'nonexistent'));
    }

    public function testInsertAfter()
    {
        $list = new CircularLinkedList();
        $list->insert('data1');
        $this->assertFalse($list->insertAfter('data2', 'data3'));
        $this->assertTrue($list->insertAfter('data2', 'data1'));
    }

    public function testInsertAfterNonExistentTarget()
    {
        $list = new CircularLinkedList();
        $list->insert('data1');
        $this->assertFalse($list->insertAfter('data2', 'nonexistent'));
    }

    public function testDelete()
    {
        $list = new CircularLinkedList();
        $list->insert('data1');
        $this->assertFalse($list->delete('data2'));
        $this->assertTrue($list->delete('data1'));
    }

    public function testDeleteNonExistentData()
    {
        $list = new CircularLinkedList();
        $list->insert('data1');
        $this->assertFalse($list->delete('nonexistent'));
    }

    public function testDeleteFirst()
    {
        $list = new CircularLinkedList();
        $this->assertFalse($list->deleteFirst());
        $list->insert('data1');
        $this->assertTrue($list->deleteFirst());
    }

    public function testDeleteLast()
    {
        $list = new CircularLinkedList();
        $this->assertFalse($list->deleteLast());
        $list->insert('data1');
        $this->assertTrue($list->deleteLast());
    }

    public function testSearch()
    {
        $list = new CircularLinkedList();
        $this->assertFalse($list->search('data1'));
        $list->insert('data1');
        $this->assertInstanceOf(ListNode::class, $list->search('data1'));
    }

    public function testSearchNonExistentData()
    {
        $list = new CircularLinkedList();
        $list->insert('data1');
        $this->assertFalse($list->search('nonexistent'));
    }

    public function testGetNthNode()
    {
        $list = new CircularLinkedList();
        $this->assertFalse($list->getNthNode(1));
        $list->insert('data1');
        $this->assertInstanceOf(ListNode::class, $list->getNthNode(1));
    }

    public function testGetNthNodeOutOfBounds()
    {
        $list = new CircularLinkedList();
        $list->insert('data1');
        $this->assertFalse($list->getNthNode(2));
    }

    public function testReverse()
    {
        $list = new CircularLinkedList();
        $this->assertFalse($list->reverse());
        $list->insert('data1');
        $this->assertTrue($list->reverse());
    }

    public function testReverseEmptyList()
    {
        $list = new CircularLinkedList();
        $this->assertFalse($list->reverse());
    }
}
