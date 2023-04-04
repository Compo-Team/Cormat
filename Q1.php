<?php

function sayHello(array $words, int $reverseIndex): void
{
    $words[$reverseIndex] = strrev($words[$reverseIndex]);
    $final = '';
    for($i = 0; $i < count($words); $i++)
    {
        if($i == count($words) - 1)
        {
            $final .= $words[$i];
            break;
        }
        $final .= $words[$i] . " ";
    }
    $final .= "\n";
    echo $final;
}
