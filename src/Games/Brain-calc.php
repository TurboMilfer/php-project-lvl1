<?php

namespace Brain\Games\BrainCalc;

use Brain\Games\GameEngine;

use function cli\line;
use function cli\prompt;

function game(): void
{
    $name = GameEngine\greeting();
    line("What is the result of the expression?");
    for ($i = 0, $winCount = 1; $i < 3; $i++, $winCount++) {
        $randomOne = rand(0, 100);
        $randomTwo = rand(0, 100);
        $randomArrayUnit = rand(0, 2);
        $operatorArray = ['+', '-', '*'];
        $expression = "{$randomOne} {$operatorArray[$randomArrayUnit]} {$randomTwo}";
        line("Question: {$expression}");
        $result = 0;
        if ($operatorArray[$randomArrayUnit] === '+') {
            $result = $randomOne + $randomTwo;
        } elseif ($operatorArray[$randomArrayUnit] === '-') {
            $result = $randomOne - $randomTwo;
        } else {
            $result = $randomOne * $randomTwo;
        }
        $userResult = prompt("Your answer");
        GameEngine\check($name, $userResult, $result, $winCount);
    }
}
