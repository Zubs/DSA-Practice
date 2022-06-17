<?php

include_once __DIR__ . '/../functions.php';

showHeader('SPL DoublyLinkedList');
$books = new SplDoublyLinkedList();
$books->push('First Book');
$books->push('Second book');

var_dump($books);
