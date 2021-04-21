<?php

namespace Brain\Games\GameEngine;

  /*php-cli-tools libraries*/
  use function cli\line;
  use function cli\prompt;

/*name your function*/
function even(): void
{
    /*greeting*/
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    /*Game rules*/
    line("Answer 'yes' if number even otherwise answer 'no'.");
    /*down below - these are conditions, on wich game will go on*/
    /*$i - iteration counter*/
    /*$winCount - positive result counter*/
    /*$i < 3 - continue game while there is less than X rounds played*/
    for ($i = 0, $winCount = 1; $i < 3; $i++, $winCount++) {
        //YOUR CODE GOES HERE
        /*$result contains some kind of information, wich will be compared with user answer*/
        $result = "";
        $randomInt = random_int(0, 999);
        if ($randomInt % 2 === 0) {
            $result = "yes";
        } else {
            $result = "no";
        }
        /*output, which displays question for user*/
        line("Question: How much is the fish?");
        /*$userResult - getting the user answer*/
        $userResult = prompt("Your answer");
        /*compare user answer & result, if comparison is
        positive - "Correct!" line displayed and game goes on.
        If user answer contains unforseen values - correction
        line will be displayed and game will be stoped*/
        if ($userResult === $result) {
            line("Correct!");
        } else {
            line("'{$userResult}' is wrong answer ;(. Correct answer was '{$result}'.");
            break;
        }
        /*when $winCount reaches it's cap - "Congratulations" line
        will be displayed, game will be ended*/
        if ($winCount === 3) {
            line("Congratulations, {$name}!");
        }
    }
}
