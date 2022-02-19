<?php

$graph = [];
$nodes = range('A', 'E');

foreach ($nodes as $x_node) {
    foreach ($nodes as $y_node) {
        $graph[$x_node][$y_node] = 0;
    }
}
