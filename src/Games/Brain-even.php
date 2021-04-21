<?php

namespace Brain\Games\BrainEven;

  use function cli\line;
  use function cli\prompt;

function isEven(): string
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
