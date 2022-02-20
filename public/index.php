<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Zubs\Dsa\LinkedList\LinearLinkedList;

$books = new LinearLinkedList();
$books->insert('How to make money in days');
$books->insert('Why I love love');
$books->insert("Testing a third time: Zubair's secret");
$books->insertFirst("Hoping I make it first: Life too tuff");
$books->insertBefore("How to get away with murder", "Why I love love");
$books->insertAfter("I like this subject", "How to get away with murder");
$books->deleteFirst();
$books->deleteLast();
$books->delete("Why I love love");
$books->display();

echo $books->search("Why I love love") . PHP_EOL; // Returns true
