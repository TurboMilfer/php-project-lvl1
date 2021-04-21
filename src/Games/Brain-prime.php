<?php

namespace Brain\Games\BrainPrime;

  use function cli\line;
  use function cli\prompt;

function isPrime(int $int): string
{
    if ($int === 1 || $int === 0) {
        return "no";
    }
    for ($i = 2; $i <= $int / 2; $i++) {
        if ($int % $i === 0) {
            return "no";
        }
    }
    return "yes";
}

function doPrime(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("Answer 'yes' if given number is prime. Otherwise answer 'no'.");
    for ($i = 0, $winCount = 1; $i < 3; $i++, $winCount++) {
        $randomInt = rand(0, 100);
        $result = isPrime($randomInt);
        line("Question: {$randomInt}");
        $userResult = prompt("Your answer");
        if ($userResult === $result) {
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
