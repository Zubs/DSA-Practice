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

    function testRemoveShouldRemoveRootNodeAndReturnTrueIfOnlyRightChildNode()
    {
        $tree = new BinarySearchTree();
        $tree->insert(3);
        $tree->insert(5);

        $this->assertTrue($tree->remove(3));
        $this->assertFalse($tree->remove(new BinarySearchNode(3)));
        $this->assertFalse($tree->search(3));
        $this->assertFalse($tree->search(new BinarySearchNode(3)));
        $this->assertTrue($tree->search(5));
        $this->assertTrue($tree->search(new BinarySearchNode(5)));
    }

    function testRemoveShouldRemoveRootNodeAndReturnTrueIfOnlyLeftChildNode()
    {
        $tree = new BinarySearchTree();
        $tree->insert(3);
        $tree->insert(1);

        $this->assertTrue($tree->remove(3));
        $this->assertFalse($tree->remove(new BinarySearchNode(3)));
        $this->assertFalse($tree->search(3));
        $this->assertFalse($tree->search(new BinarySearchNode(3)));
        $this->assertTrue($tree->search(1));
        $this->assertTrue($tree->search(new BinarySearchNode(1)));
    }

    function testRemoveShouldRemoveRootNodeAndReturnTrueIfChildrenNodeWithSuccessorThatHasRightNoNode()
    {
        $tree = new BinarySearchTree();
        $tree->insert(50);
        $tree->insert(25);
        $tree->insert(75);
        $tree->insert(11);
        $tree->insert(33);
        $tree->insert(61);
        $tree->insert(89);
        $tree->insert(30);
        $tree->insert(40);
        $tree->insert(52);
        $tree->insert(82);
        $tree->insert(95);

        $this->assertTrue($tree->remove(50));
        $this->assertFalse($tree->remove(new BinarySearchNode(50)));
        $this->assertFalse($tree->search(50));
        $this->assertFalse($tree->search(new BinarySearchNode(50)));
        $this->assertTrue($tree->search(75));
        $this->assertTrue($tree->search(new BinarySearchNode(75)));
        $this->assertTrue($tree->search(25));
        $this->assertTrue($tree->search(new BinarySearchNode(25)));
        $this->assertTrue($tree->search(52));
        $this->assertTrue($tree->search(new BinarySearchNode(52)));
    }

    function testRemoveShouldRemoveRootNodeAndReturnTrueIfChildrenNodeWithSuccessorThatHasRightNode()
    {
        $tree = new BinarySearchTree();
        $tree->insert(50);
        $tree->insert(25);
        $tree->insert(75);
        $tree->insert(11);
        $tree->insert(33);
        $tree->insert(61);
        $tree->insert(89);
        $tree->insert(30);
        $tree->insert(40);
        $tree->insert(52);
        $tree->insert(82);
        $tree->insert(95);
        $tree->insert(55);

        $this->assertTrue($tree->remove(50));
        $this->assertFalse($tree->remove(new BinarySearchNode(50)));
        $this->assertFalse($tree->search(50));
        $this->assertFalse($tree->search(new BinarySearchNode(50)));
        $this->assertTrue($tree->search(75));
        $this->assertTrue($tree->search(new BinarySearchNode(75)));
        $this->assertTrue($tree->search(25));
        $this->assertTrue($tree->search(new BinarySearchNode(25)));
        $this->assertTrue($tree->search(52));
        $this->assertTrue($tree->search(new BinarySearchNode(52)));
    }

    function testRemoveShouldRemoveNodeIfTheresNoChildrenNodes()
    {
        $tree = new BinarySearchTree();
        $tree->insert(3);
        $tree->insert(5);

        $this->assertTrue($tree->remove(5));
        $this->assertFalse($tree->remove(new BinarySearchNode(5)));
        $this->assertFalse($tree->search(5));
        $this->assertFalse($tree->search(new BinarySearchNode(5)));
    }

    function testRemoveShouldRemoveNodeIfTheresARightChildNode()
    {
        $tree = new BinarySearchTree();
        $tree->insert(3);
        $tree->insert(5);
        $tree->insert(6);
        $tree->insert(2);

        $this->assertTrue($tree->remove(5));
        $this->assertFalse($tree->remove(new BinarySearchNode(5)));
        $this->assertFalse($tree->search(5));
        $this->assertFalse($tree->search(new BinarySearchNode(5)));
        $this->assertTrue($tree->search(6));
        $this->assertTrue($tree->search(new BinarySearchNode(6)));
    }

    function testRemoveShouldRemoveNodeIfTheresALeftChildNode()
    {
        $tree = new BinarySearchTree();
        $tree->insert(3);
        $tree->insert(5);
        $tree->insert(2);
        $tree->insert(1);

        $this->assertTrue($tree->remove(2));
        $this->assertFalse($tree->remove(new BinarySearchNode(2)));
        $this->assertFalse($tree->search(2));
        $this->assertFalse($tree->search(new BinarySearchNode(2)));
        $this->assertTrue($tree->search(1));
        $this->assertTrue($tree->search(new BinarySearchNode(1)));
    }
}
