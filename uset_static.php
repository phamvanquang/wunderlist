<?php
function foo()
{
    static $bar;
    $bar++;
    echo $bar;
    echo "Before unset: $bar, ";
    unset($bar);
    $bar = 23;
    echo "after unset: $bar\n";
}

foo();
foo();
foo();
?>