<?php
function fountainActivation($a) {
    // Write your code here
    $n = array_shift($a);
    $b = $a;

    array_walk($b, function (&$item, $key) use ($n) {
        $max = max(($key + 1) - $item, 1);
        $min = min(($key + 1) + $item, $n);

        $item = $min - $max;
    });

    if (in_array($n - 1 , $b)) return 1;

    $count = 1;
    $max = max($b);
    $key = array_search($max, $b);
    $keyValue = $a[$key];

    if ($keyValue >= $key) {
        $bb = array_slice($b, $key + $keyValue + 1);

        $count += fountainActivation(array_merge([count($bb)], $bb));
    } else if ($keyValue <= $key) {
        $bb = array_slice($b, 0, $key - $keyValue);

        $count += fountainActivation(array_merge([count($bb)], $bb));
    } else {
        $bb1 = array_slice($b, $key + $keyValue + 1);
        $count += fountainActivation(array_merge([count($bb1)], $bb1));

        $bb2 = array_slice($b, 0, $key - $keyValue);
        $count += fountainActivation(array_merge([count($bb2)], $bb2));
    }

    return $count;
}
