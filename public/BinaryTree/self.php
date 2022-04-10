<?php

use Zubs\Dsa\BinaryTree\BinaryNode;
use Zubs\Dsa\BinaryTree\BinaryTree;

include_once __DIR__ . '/../functions.php';

showHeader("Binary Tree");
$children = new BinaryTree();
$children->insert(12);
$children->insert(14);
$children->insert(18);
$children->insert(7);
$children->insert(13);

//echo $children->retrieve(new BinaryNode(21)) ? "True" : "False";

var_dump($children);