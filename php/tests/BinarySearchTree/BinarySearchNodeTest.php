<?php

use PHPUnit\Framework\TestCase;
use Zubs\Dsa\BinarySearchTree\BinarySearchNode;

final class BinarySearchNodeTest extends TestCase
{
    function testShouldSetDataToConstructorValueAndLeftAndRightToNull()
    {
        $newNode = new BinarySearchNode(5);

        $this->assertSame($newNode->data, 5);
        $this->assertNull($newNode->left);
        $this->assertNull($newNode->right);
    }

    function testShouldSetLeftToNullWhenOnlyRightIsSet()
    {
        $newNode = new BinarySearchNode(5);
        $rightNode = new BinarySearchNode(4);

        $this->assertTrue($newNode->addChildren(null, $rightNode));
        $this->assertSame($newNode->data, 5);
        $this->assertNull($newNode->left);
        $this->assertSame($newNode->right, $rightNode);
        $this->assertSame($rightNode->data, 4);
        $this->assertNull($rightNode->left);
        $this->assertNull($rightNode->right);
    }

    function testShouldSetRightToNullWhenOnlyLeftIsSet()
    {
        $newNode = new BinarySearchNode(5);
        $leftNode = new BinarySearchNode(4);

        $this->assertTrue($newNode->addChildren($leftNode, null));
        $this->assertSame($newNode->data, 5);
        $this->assertSame($newNode->left, $leftNode);
        $this->assertNull($newNode->right);
        $this->assertSame($leftNode->data, 4);
        $this->assertNull($leftNode->left);
        $this->assertNull($leftNode->right);
    }
}
