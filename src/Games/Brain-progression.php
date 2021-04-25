<?php

namespace Brain\Games\BrainProgression;

use Brain\Games\GameEngine;

use function cli\line;
use function cli\prompt;

function progression(): array
{
    $randomStart = rand(0, 100);
    $randomStep = rand(1, 10);
    $randomLenght = rand(4, 14);
    $progrArray = [$randomStart];
    for ($i = 0; $i < $randomLenght; $i++) {
        $progrArray[] = $progrArray[$i] + $randomStep;
    }
    return $progrArray;
}

function game(): void
{
    $name = GameEngine\greeting();
    line("What number is missing in the progression?");
    for ($i = 0, $winCount = 1; $i < 3; $i++, $winCount++) {
        $progression = progression();
        $progressionLenght = count($progression) - 1;
        $randomArrayUnit = rand(0, $progressionLenght);
        $temp = $progression;
        $temp[$randomArrayUnit] = "..";
        $preparedArray = implode(' ', $temp);
        $result = $progression[$randomArrayUnit];
        line("Question: {$preparedArray}");
        $userResult = prompt("Your answer");
        GameEngine\check($name, $userResult, $result, $winCount);
    }
}
