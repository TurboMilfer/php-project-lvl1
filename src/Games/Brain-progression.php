<?php

namespace Brain\Games\BrainProgression;

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
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
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
        if (is_numeric($userResult) && intval($userResult) === $result) {
            line("Correct!");
        } else {
            line("'{$userResult}' is wrong answer ;(. Correct answer was '{$result}'.");
            line("Let's try again, {$name}!");
            break;
        }
        if ($winCount === 3) {
            line("Congratulations, {$name}!");
        }
    }
}
