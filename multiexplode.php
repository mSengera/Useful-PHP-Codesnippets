<?php
/*
 * Extends PHP explode() to multiexplode() with multiple explode characters
 */
private function multiexplode ($delimiters,$string) {
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}
