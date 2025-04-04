<?php

namespace BrainGames\BrainProgression;

use function BrainGames\AddLogic\checkAnswer;
use function BrainGames\AddLogic\checkCorrect;
use function BrainGames\Cli\greetingUser;
use function cli\prompt;

function getProgressDigitsAndAnswer()
{
        $digitStart = rand(0, 100);
        $digitStep = rand(0, 5);
        $allDigits = [];

    for ($i = 0; $i < 10; $i++) {
        $allDigits[] = $digitStart;
        $digitStart += $digitStep;
    }

        $key = array_rand($allDigits);
        $missDigit = $allDigits[$key];
        $allDigits[$key] = "..";
        $strDigits = "";

    foreach ($allDigits as $digit) {
        $strDigits .= $digit . " ";
    }

        $result = [$strDigits, $missDigit];
        return $result;
}
function brainProgression()
{
    $name = greetingUser();
    echo 'What number is missing in the progression?' . "\n";
    $correctAnswers = 0;

    for ($i = 0; $i < 3; $i++) {
        [$digits, $result] = getProgressDigitsAndAnswer();
        echo "Question: {$digits}" . "\n";
        $answer = prompt("Your answer");

        if (checkAnswer($answer, $result) === true) {
            $correctAnswers++;
        } else {
            break;
        }
    }
    checkCorrect($correctAnswers, 3, $name);
}
