<?php

namespace Zubs\Dsa\LinkedList;

class DoublyListNode
{
    public string | null $data = null;
    public DoublyListNode | null $next = null;
    public DoublyListNode | null $prev = null;

    /**
     * @param string $data
     */
    public function __construct(string $data)
    {
        $this->data = $data;
    }
}
