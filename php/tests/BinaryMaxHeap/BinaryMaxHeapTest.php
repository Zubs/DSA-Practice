<?php

use PHPUnit\Framework\TestCase;
use Zubs\Dsa\BinaryMaxHeap\BinaryMaxHeap;

final class BinaryMaxHeapTest extends TestCase
{
    function testInsertShouldReturnTrueOnInsert()
    {
        $heap = new BinaryMaxHeap();
        $this->assertTrue($heap->insert(40));
    }

    function testDeleteShouldReturnTrueOnDelete()
    {
        $heap = new BinaryMaxHeap();
        $heap->insert(40);
        $this->assertTrue($heap->delete());
    }
}
