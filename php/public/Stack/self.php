<?php

use Zubs\Dsa\Stack\ArrayStack;
use Zubs\Dsa\Stack\LinkedListStack;

include_once __DIR__ . '/../functions.php';

showHeader('ArrayStack');
$books = new ArrayStack(10);
$books->push('How to make money in days');
$books->push('Why I love love');

echo $books->pop() . PHP_EOL;

showHeader('LinkedListStack');
$players = new LinkedListStack();
$players->push('Ronaldo');
$players->push('Neymar');

echo $players->top() . PHP_EOL;
