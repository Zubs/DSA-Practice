<?php

$graph = [];
$nodes = range('A', 'E');

// Declare all relationships as false
foreach ($nodes as $x_node) {
    foreach ($nodes as $y_node) {
        $graph[$x_node][$y_node] = 0;
    }
}

// Update relationships based on `img_1`
$graph['A']['B'] = 1;
$graph['B']['A'] = 1;
$graph['A']['C'] = 1;
$graph['C']['A'] = 1;
$graph['A']['E'] = 1;
$graph['E']['A'] = 1;
$graph['B']['D'] = 1;
$graph['D']['B'] = 1;
$graph['B']['D'] = 1;
$graph['D']['B'] = 1;
