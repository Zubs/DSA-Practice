<?php

$array1 = new SplFixedArray(10);
for ($i = 0; $i < 10; $i++) {
    $array1[] = $i;
}

$dynamicArray = [
    0 => 'Man',
    1 => 'Woman',
    2 => 'Boys'
];
$array2 = SplFixedArray::fromArray($dynamicArray);
