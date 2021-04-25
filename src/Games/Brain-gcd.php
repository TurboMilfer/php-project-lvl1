<?php

namespace Brain\Games\BrainGcd;

use Brain\Games\GameEngine;

use function cli\line;
use function cli\prompt;

function gcd(int $x, int $y): int
{
    $gcd = 0;
    if ($x > $y) {
        $temp = $x;
        $x = $y;
        $y = $temp;
    }
    for ($i = 1; $i < ($x + 1); $i++) {
        if ($x % $i === 0 and $y % $i === 0) {
            $gcd = $i;
        }
    }
    return $gcd;
}

function game(): void
{
    $name = GameEngine\greeting();
    line("Find the greatest common divisor of given numbers.");
    for ($i = 0, $winCount = 1; $i < 3; $i++, $winCount++) {
        $randomOne = rand(1, 100);
        $randomTwo = rand(1, 100);
        $result = gcd($randomOne, $randomTwo);
        line("Question: {$randomOne} {$randomTwo}");
        $userResult = prompt("Your answer");
        GameEngine\check($name, $userResult, $result, $winCount);
    }
}
