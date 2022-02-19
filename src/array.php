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

// To discard the previous indices
$array2 = SplFixedArray::fromArray($dynamicArray, false);

// To save memory, after the conversion, unset the former array
unset($dynamicArray);

// TODO: Beautify this later
//$start_memory = memory_get_usage();
//for ($i = 0; $i < 10; $i++) {
//    echo $i;
//}
//$end_memory = memory_get_usage();
//
//echo $end_memory - $start_memory . "bytes";