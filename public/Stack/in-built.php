<?php

include_once __DIR__ . '/../functions.php';

showHeader('SPL Stack');
$books = new SplStack();
$books->push('I love PHP');

echo $books->top() . PHP_EOL;
