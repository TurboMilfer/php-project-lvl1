<?php

namespace Brain\Games\GameEngine;

  use function cli\line;
  use function cli\prompt;

function greeting()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function check($name, $userResult, $result, $winCount)
{
    if (is_numeric($userResult) && intval($userResult) === $result) {
        line("Correct!");
    } elseif ($userResult === $result) {
        line("Correct!");
    } else {
        line("'{$userResult}' is wrong answer ;(. Correct answer was '{$result}'.");
        line("Let's try again, {$name}!");
        exit;
    }
    if ($winCount === 3) {
        line("Congratulations, {$name}!");
    }
}
