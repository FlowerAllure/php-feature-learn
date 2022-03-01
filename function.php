<?php
function echo_print(string|int|float $str) {
    echo $str;
    echo PHP_EOL;
}

function echo_export(mixed $str) {
    var_export($str);
    echo PHP_EOL;
}
