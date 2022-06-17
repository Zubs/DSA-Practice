<?php

$even_set = [2, 4, 6, 8];

$odd_set = [3, 5, 5, 7];

$prime_set = [2, 3, 5, 7];

$union_set = array_merge($even_set, $odd_set);
$intersection_set = array_intersect($odd_set, $prime_set);
$compliment_set = array_diff($even_set, $prime_set);

// Adding a bit more speed
$even_set2 = [];
$even_set2[2] = true;
$even_set2[4] = true;
$even_set2[6] = true;
$even_set2[8] = true;

$odd_set2 = [];
$odd_set2[3] = true;
$odd_set2[5] = true;
$odd_set2[7] = true;
$odd_set2[9] = true;

$prime_set2 = [];
$prime_set2[2] = true;
$prime_set2[3] = true;
$prime_set2[5] = true;
$prime_set2[7] = true;

$union_set2 = $even_set2 + $odd_set2;
$intersection_set2 = array_intersect_key($odd_set2, $prime_set2);
$compliment_set2 = array_diff_key($even_set2, $prime_set2);
