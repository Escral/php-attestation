<?php
function plural_form($number, $after)
{
    $cases = array(2, 0, 1, 1, 1, 2);
    return $number . ' ' . $after[($number % 100 > 4 && $number % 100 < 20) ? 2 : $cases[min($number % 10, 5)]];
}
