<?php

use PHPUnit\Framework\TestCase;
use Zubs\Dsa\BinaryTree\BinaryNode;
use Zubs\Dsa\BinaryTree\BinaryTree;

final class BinaryTreeTest extends TestCase
{
    function testInsertShouldReturnTrueWhenNoRootNode()
    {
        $tree = new BinaryTree();

        $this->assertTrue($tree->insert(5));
    }

    function testIsEmptyShouldReturnTrueWhenRootIsNull()
    {
        $tree = new BinaryTree();

        $this->assertTrue($tree->isEmpty());
    }

    function testIsEmptyShouldReturnFalseWhenRootIsNotNull()
    {
        $tree = new BinaryTree();
        $tree->insert(5);

        $this->assertFalse($tree->isEmpty());
    }

    function testInsertShouldReturnFalseWhenTwoNodesAreEqual()
    {
        $tree = new BinaryTree();
        $tree->insert(5);

        $this->assertFalse($tree->insert(5));
    }

    function testInsertShouldReturnTrueWhenLowerValue()
    {
        $tree = new BinaryTree();
        $tree->insert(5);
        $this->assertTrue($tree->insert(3));
    }

    function testInsertShouldReturnTrueWhenHigherValue()
    {
        $tree = new BinaryTree();
        $tree->insert(5);
        $this->assertTrue($tree->insert(7));
    }

    function testSearchShouldReturnFalseWhenNoRootNode()
    {
        $tree = new BinaryTree();

        $this->assertFalse($tree->search(new BinaryNode(5)));
    }

    function testSearchShouldReturnTrueWhenNodeIsFound()
    {
        $tree = new BinaryTree();
        $tree->insert(5);

        $this->assertTrue($tree->search(new BinaryNode(5)));
        $this->assertTrue($tree->search(5));
    }

    function testSearchShouldReturnFalseWhenNodeIsNotFound()
    {
        $tree = new BinaryTree();
        $tree->insert(5);

        $this->assertFalse($tree->search(new BinaryNode(6)));
        $this->assertFalse($tree->search(6));
    }

    function testRemoveShouldReturnFalseWhenNoRootNode()
    {
        $tree = new BinaryTree();

        $this->assertFalse($tree->remove(new BinaryNode(5)));
        $this->assertFalse($tree->remove(5));
    }

    function testRemoveShouldReturnFalseWhenNodeIsNotInTree()
    {
        $tree = new BinaryTree();
        $tree->insert(4);

        $this->assertFalse($tree->remove(new BinaryNode(5)));
        $this->assertFalse($tree->remove(5));
    }

    function testRemoveShouldRemoveRootNodeAndReturnTrueIfNoChildrenNodes()
    {
        $tree = new BinaryTree();
        $tree->insert(3);

        $this->assertTrue($tree->remove(3));
        $this->assertFalse($tree->remove(new BinaryNode(3)));
        $this->assertFalse($tree->search(3));
        $this->assertFalse($tree->search(new BinaryNode(3)));
    }

    function testRemoveShouldRemoveRootNodeAndReturnTrueIfTheresChildrenNodes()
    {
        $tree = new BinaryTree();
        $tree->insert(3);
        $tree->insert(5);

        $this->assertTrue($tree->remove(3));
        $this->assertFalse($tree->remove(new BinaryNode(3)));
        $this->assertFalse($tree->search(3));
        $this->assertFalse($tree->search(new BinaryNode(5)));
    }

    function testRemoveShouldNotRemoveRootNodeAndReturnFalseIfTheresChildrenNodesAndRemoveChildrenIsFalse()
    {
        $tree = new BinaryTree();
        $tree->insert(3);
        $tree->insert(5);

        $this->assertFalse($tree->remove(3, false));
        $this->assertFalse($tree->remove(new BinaryNode(3), false));
        $this->assertTrue($tree->search(3));
        $this->assertTrue($tree->search(new BinaryNode(5)));
    }

    function testRemoveShouldRemoveNodeAndReturnTrue()
    {
        $tree = new BinaryTree();
        $tree->insert(3);
        $tree->insert(15);
        $tree->insert(2);
        $tree->insert(8);
        $tree->insert(6);

        $this->assertTrue($tree->remove(15));
        $this->assertFalse($tree->remove(new BinaryNode(15)));
        $this->assertFalse($tree->search(8));
        $this->assertFalse($tree->search(6));
        $this->assertTrue($tree->search(new BinaryNode(2)));
    }
}
