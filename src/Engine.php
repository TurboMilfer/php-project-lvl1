<?php

namespace Brain\Games\GameEngine;

  use function cli\line;
  use function cli\prompt;

function engine($objective, $question, $result)
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($objective);
    for ($i = 0, $winCount = 1; $i < 3; $i++, $winCount++) {
        line($question);
        $userResult = prompt("Your answer");
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
}
