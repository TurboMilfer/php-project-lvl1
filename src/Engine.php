<?php

namespace Brain\Games\GameEngine;

  use function cli\line;
  use function cli\prompt;

function game(): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("Answer 'yes' if number even otherwise answer 'no'.");
    for ($i = 0, $winCount = 1; $i < 3; $i++, $winCount++) {
        $result = "";
        $randomInt = random_int(0, 999);
        if ($randomInt % 2 === 0) {
            $result = "yes";
        } else {
            $result = "no";
        }
        line("Question: How much is the fish?");
        $userResult = prompt("Your answer");
        if ($userResult === $result) {
            line("Correct!");
        } else {
            line("'{$userResult}' is wrong answer ;(. Correct answer was '{$result}'.");
            break;
        }
        if ($winCount === 3) {
            line("Congratulations, {$name}!");
        }
    }
}
