<?php

use PHPUnit\Framework\TestCase;
use Zubs\Dsa\BinaryTree\BinaryNode;

final class BinaryNodeTest extends TestCase
{
    function testShouldSetDataToConstructorValueAndLeftAndRightToNull()
    {
        $newNode = new BinaryNode(5);

        $this->assertSame($newNode->data, 5);
        $this->assertNull($newNode->left);
        $this->assertNull($newNode->right);
    }

    function testShouldSetLeftToNullWhenOnlyRightIsSet()
    {
        $newNode = new BinaryNode(5);
        $rightNode = new BinaryNode(4);
        $newNode->addChildren(null, $rightNode);

        $this->assertSame($newNode->data, 5);
        $this->assertNull($newNode->left);
        $this->assertSame($newNode->right, $rightNode);
        $this->assertSame($rightNode->data, 4);
        $this->assertNull($rightNode->left);
        $this->assertNull($rightNode->right);
    }

    function testShouldSetRightToNullWhenOnlyLeftIsSet()
    {
        $newNode = new BinaryNode(5);
        $leftNode = new BinaryNode(4);
        $newNode->addChildren($leftNode, null);

        $this->assertSame($newNode->data, 5);
        $this->assertSame($newNode->left, $leftNode);
        $this->assertNull($newNode->right);
        $this->assertSame($leftNode->data, 4);
        $this->assertNull($leftNode->left);
        $this->assertNull($leftNode->right);
    }
}
