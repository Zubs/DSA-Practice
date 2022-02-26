<?php

include_once __DIR__ . '/../functions.php';

$books = new SplDoublyLinkedList();
$books->push('First Book');

var_dump($books);
