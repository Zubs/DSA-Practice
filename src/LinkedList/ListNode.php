<?php

namespace Zubs\Dsa\LinkedList;

/**
 * Structure of a listNode
 */
class ListNode
{
    public $data = null;
    public $next = null;

    /**
     * @param string|null $data
     */
    public function __construct(string $data = null)
    {
        $this->data = $data;
    }
}
