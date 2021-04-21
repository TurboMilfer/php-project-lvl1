<?php

namespace Brain\Games\BrainCalc;

  use function cli\line;
  use function cli\prompt;

function calc()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("What is the result of the expression?");
    for ($i = 0, $winCount = 1; $i < 3; $i++, $winCount++) {
        $randomOne = rand(0, 10);
        $randomTwo = rand(0, 10);
        $randomArrayUnit = rand(0, 2);
        $operatorArray = ['+', '-', '*'];
        $expression = "{$randomOne} {$operatorArray[$randomArrayUnit]} {$randomTwo}";
        line("Question: {$expression}");
        $result = 0;
        if ($operatorArray[$randomArrayUnit] === '+') {
            $result = $randomOne + $randomTwo;
        } elseif ($operatorArray[$randomArrayUnit] === '-') {
            $result = $randomOne - $randomTwo;
        } elseif ($operatorArray[$randomArrayUnit] === '*') {
            $result = $randomOne * $randomTwo;
        }
        $userResult = prompt("Your answer");
        if (is_numeric($userResult) && intval($userResult) === $result) {
            line("Correct!");
        } else {
            line("Let's try again, {$name}!");
            break;
        }
        if ($winCount === 3) {
            line("Congratulations, {$name}!");
        }
    }
}
