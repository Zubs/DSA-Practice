<?php

use Zubs\Dsa\Stack\ArrayStack;

include_once __DIR__ . '/../functions.php';

showHeader('ArrayStack');
$books = new ArrayStack(10);
$books->push('How to make money in days');

var_dump($books->pop());
var_dump($books);
