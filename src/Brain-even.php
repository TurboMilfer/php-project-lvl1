<?php

namespace Brain\Games\BrainEven;

  use function cli\line;
  use function cli\prompt;

function isEven()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("Answer 'yes' if number even otherwise answer 'no'.");
    for ($i = 0, $winCount = 1; $i < 3; $i++, $winCount++) {
        $answer = "";
        $randomInt = random_int(0, 999);
        if ($randomInt % 2 === 0) {
            $answer = "yes";
        } else {
            $answer = "no";
        }
        line("Question: {$randomInt}");
        $userAnswer = prompt("Your answer");
        if ($userAnswer === $answer) {
            line("Correct!");
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$answer}'.");
            break;
        }
        if ($winCount === 3) {
            line("Congratulations, {$name}!");
        }
    }
}
