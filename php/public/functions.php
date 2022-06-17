<?php

/**
 * Creates header
 * @param string|null $title Text to be displayed
 */
function showHeader (string $title = null): void {
    $ans =  "========== ";

    if (is_null($title)) $ans .= "TEST";
    else $ans .= strtoupper($title);

    echo $ans . " ==========" . PHP_EOL;
}
