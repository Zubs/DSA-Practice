<?php

use PHPUnit\Framework\TestCase;
use Zubs\Dsa\BinarySearchTree\BinarySearchNode;
use Zubs\Dsa\BinarySearchTree\BinarySearchTree;

final class BinarySearchTreeTest extends TestCase
{
    function testInsertShouldReturnTrueWhenNoRootNode()
    {
        $tree = new BinarySearchTree();

        $this->assertTrue($tree->insert(5));
    }

    function testIsEmptyShouldReturnTrueWhenRootIsNull()
    {
        $tree = new BinarySearchTree();

        $this->assertTrue($tree->isEmpty());
    }

    function testIsEmptyShouldReturnFalseWhenRootIsNotNull()
    {
        $tree = new BinarySearchTree();
        $tree->insert(5);

        $this->assertFalse($tree->isEmpty());
    }

    function testInsertShouldReturnFalseWhenTwoNodesAreEqual()
    {
        $tree = new BinarySearchTree();
        $tree->insert(5);

        $this->assertFalse($tree->insert(5));
    }

    function testInsertShouldReturnTrueWhenLowerValue()
    {
        $tree = new BinarySearchTree();
        $tree->insert(5);
        $this->assertTrue($tree->insert(3));
    }

    function testInsertShouldReturnTrueWhenHigherValue()
    {
        $tree = new BinarySearchTree();
        $tree->insert(5);
        $this->assertTrue($tree->insert(7));
    }

    function testSearchShouldReturnFalseWhenNoRootNode()
    {
        $tree = new BinarySearchTree();

        $this->assertFalse($tree->search(new BinarySearchNode(5)));
    }

    function testSearchShouldReturnTrueWhenNodeIsFound()
    {
        $tree = new BinarySearchTree();
        $tree->insert(5);

        $this->assertTrue($tree->search(new BinarySearchNode(5)));
        $this->assertTrue($tree->search(5));
    }

    function testSearchShouldReturnFalseWhenNodeIsNotFound()
    {
        $tree = new BinarySearchTree();
        $tree->insert(5);

        $this->assertFalse($tree->search(new BinarySearchNode(6)));
        $this->assertFalse($tree->search(6));
    }

    function testRemoveShouldReturnFalseWhenNoRootNode()
    {
        $tree = new BinarySearchTree();

        $this->assertFalse($tree->remove(new BinarySearchNode(5)));
        $this->assertFalse($tree->remove(5));
    }

    function testRemoveShouldReturnFalseWhenNodeIsNotInTree()
    {
        $tree = new BinarySearchTree();
        $tree->insert(4);

        $this->assertFalse($tree->remove(new BinarySearchNode(5)));
        $this->assertFalse($tree->remove(5));
    }

    function testRemoveShouldRemoveRootNodeAndReturnTrueIfNoChildrenNodes()
    {
        $tree = new BinarySearchTree();
        $tree->insert(3);

        $this->assertTrue($tree->remove(3));
        $this->assertFalse($tree->remove(new BinarySearchNode(3)));
        $this->assertFalse($tree->search(3));
        $this->assertFalse($tree->search(new BinarySearchNode(3)));
    }

    function testRemoveShouldRemoveRootNodeAndReturnTrueIfTheresChildrenNodes()
    {
        $tree = new BinarySearchTree();
        $tree->insert(3);
        $tree->insert(5);

        $this->assertTrue($tree->remove(3));
        $this->assertFalse($tree->remove(new BinarySearchNode(3)));
        $this->assertFalse($tree->search(3));
        $this->assertFalse($tree->search(new BinarySearchNode(5)));
    }

    function testRemoveShouldNotRemoveRootNodeAndReturnFalseIfTheresChildrenNodesAndRemoveChildrenIsFalse()
    {
        $tree = new BinarySearchTree();
        $tree->insert(3);
        $tree->insert(5);

        $this->assertFalse($tree->remove(3, false));
        $this->assertFalse($tree->remove(new BinarySearchNode(3), false));
        $this->assertTrue($tree->search(3));
        $this->assertTrue($tree->search(new BinarySearchNode(5)));
    }

    function testRemoveShouldRemoveNodeAndReturnTrue()
    {
        $tree = new BinarySearchTree();
        $tree->insert(3);
        $tree->insert(15);
        $tree->insert(2);
        $tree->insert(8);
        $tree->insert(6);

        $this->assertTrue($tree->remove(15));
        $this->assertFalse($tree->remove(new BinarySearchNode(15)));
        $this->assertFalse($tree->search(8));
        $this->assertFalse($tree->search(6));
        $this->assertTrue($tree->search(new BinarySearchNode(2)));
    }
}
