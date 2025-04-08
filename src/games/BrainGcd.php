<?php

namespace BrainGames\BrainGcd;

use function BrainGames\AddLogic\checkAnswer;
use function BrainGames\AddLogic\checkCorrect;
use function BrainGames\Cli\greetingUser;
use function cli\prompt;
use function cli\line;

function getGcdDigitsAndAnswer(): array
{
    $digit1 = rand(0, 100);
    $digit2 = rand(0, 100);
    $result = [];
    $result[] = "{$digit1} {$digit2}";

    while ($digit2 !== 0) {
        $temp = $digit2;
        $digit2 = $digit1 % $digit2;
        $digit1 = $temp;
    }

    $result[] = $digit1;
    return $result;
}

function runBrainGcd(): void
{
    $name = greetingUser();
    line('Find the greatest common divisor of given numbers.');
    $correctAnswers = true;

    for ($i = 0; $i < 3; $i++) {
        [$digits, $result] = getGcdDigitsAndAnswer();
        line("Question: {$digits}");
        $answer = prompt("Your answer");

        if (checkAnswer($answer, $result) !== true) {
            $correctAnswers = false;
            break;
        }
    }

    checkCorrect($correctAnswers, $name);
}
