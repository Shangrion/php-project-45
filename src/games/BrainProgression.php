<?php

namespace BrainGames\BrainProgression;

use function BrainGames\AddLogic\checkAnswer;
use function BrainGames\AddLogic\checkCorrect;
use function BrainGames\Cli\greetingUser;
use function cli\prompt;
use function cli\line;

function getProgressDigitsAndAnswer(): array
{
    $NumberStart = rand(0, 100);
    $step = rand(0, 5);
    $allNumbers = [];

    for ($i = 0; $i < 10; $i++) {
        $allNumbers[] = $NumberStart;
        $NumberStart += $step;
    }

    $key = array_rand($allNumbers);
    $missNumber = $allNumbers[$key];
    $allNumbers[$key] = "..";
    $listOfNumbers = "";

    foreach ($allNumbers as $digit) {
        $listOfNumbers .= $digit . " ";
    }

        $result = [$listOfNumbers, $missNumber];
        return $result;
}
function runBrainProgression(): void
{
    $name = greetingUser();
    line('What number is missing in the progression?');
    $correctAnswers = true;

    for ($i = 0; $i < 3; $i++) {
        [$number, $result] = getProgressDigitsAndAnswer();
        line("Question: {$number}");
        $answer = prompt("Your answer");

        if (checkAnswer($answer, $result) !== true) {
            $correctAnswers = false;
            break;
        }
    }

    checkCorrect($correctAnswers, $name);
}
