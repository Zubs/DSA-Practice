<?php

require_once __DIR__ . '/../vendor/autoload.php';

include_once __DIR__ . '/functions.php';

use Zubs\Dsa\LinkedList\LinearLinkedList;
use Zubs\Dsa\LinkedList\CircularLinkedList;

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

showHeader('Reversed list');
$books->reverse();
$books->display();

showHeader('Search');
var_dump($books->search("Why I love love"));

showHeader('See nth node');
var_dump($books->getNthNode(1));

showHeader('Test iterable');
foreach ($books as $book) {
    echo $book . PHP_EOL;
}

showHeader('CircularLinkedList');
$players = new CircularLinkedList();
$players->insert("Ronaldo");
$players->insert("Neymar");
$players->insert("Depay");
$players->insertFirst("Pogba");
$players->insertBefore('Martial', 'Depay');
$players->insertAfter('Greenwood', 'Depay');
$players->delete('Martial');
$players->deleteFirst();
$players->deleteLast();
$players->display();

showHeader('CircularLinkedList Node');
var_dump($players->search('Neymar'));
