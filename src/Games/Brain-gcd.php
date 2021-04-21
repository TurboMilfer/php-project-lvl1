<?php

namespace Brain\Games\BrainGcd;

  use function cli\line;
  use function cli\prompt;

function gcd( int $x, int $y): int
{
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
}

function doGcd(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("Find the greatest common divisor of given numbers.");
    for ($i = 0, $winCount = 1; $i < 3; $i++, $winCount++) {
        $randomOne = rand(1, 100);
        $randomTwo = rand(1, 100);
        $result = gcd($randomOne, $randomTwo);
        line("Question: {$randomOne} {$randomTwo}");
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
