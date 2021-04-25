<?php

namespace Brain\Games\BrainPrime;

use Brain\Games\GameEngine;

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

function game()
{
    $randomInt = rand(0, 100);
    $result = isPrime($randomInt);
    $objective = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $question = "Question: {$randomInt}";
    GameEngine\engine($objective, $question, $result);
}
