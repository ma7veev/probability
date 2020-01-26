<?php

function probability($ydays = 365, $pcnt = 2, $drange = 7)
{
    $occur = $ydays/$drange;
    $cnt = 1;
    while (true) {
        $cnt ++;
        $unprob = countChance($occur, $cnt) / pow($occur, ($cnt - 1));

        $prob = 1 - $unprob;

        if ($prob >= 0.5) {
            break;
        }
    }
    echo "$cnt - The minimal number of people for matching 50% birthday probability\n";
    return $cnt;
}

function countChance($occur, $cnt)
{
    $val = 1;
    $ioccur = $occur;
    for ($i = 1; $i < $cnt; $i ++) {
        $ioccur --;
        $val *= $ioccur;
    }

    return $val;
}

$args = array_slice($argv, 1);


//php test.php 365 2 7
return probability(...$args);