<?php

namespace Brain\Games\BrainEven;

use Brain\Games\GameEngine;

use function cli\line;
use function cli\prompt;

function game(): void
{
    $name = GameEngine\greeting();
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
        GameEngine\check($name, $userResult, $result);
    }
}
