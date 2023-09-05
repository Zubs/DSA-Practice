<?php

use Zubs\Dsa\HashTable\HashTable;

$table = new HashTable();
$table->set('zubs', 'zubair idris aweda');
$table->set('ghost', 'esenyi solomon');

var_dump($table);

var_dump($table->get('zubs'));

$table->remove('ghost');

var_dump($table);

var_dump($table->get('ghost'));
