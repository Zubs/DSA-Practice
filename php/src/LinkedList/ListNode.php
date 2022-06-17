<?php

namespace Zubs\Dsa\LinkedList;

/**
 * Structure of a unidirectional listNode
 */
class ListNode
{
    public string | null $data = null;
    public ListNode | null $next = null;

    /**
     * @param string|null $data
     */
    public function __construct(?string $data)
    {
        $this->data = $data;
    }
}
