<?php

namespace BrainGames\BrainGcd;

use function BrainGames\AddLogic\checkAnswer;
use function BrainGames\AddLogic\checkCorrect;
use function BrainGames\Cli\greetingUser;
use function cli\prompt;
use function cli\line;

function getTwoRandomDigits()
{
    $digit1 = rand(0, 100);
    $digit2 = rand(0, 100);
    $result = [];
    $result[] = $digit1;
    $result[] = $digit2;
    return $result;
}

function convertDigitsToString(array $digits): string
{
    return "{$digits[0]} {$digits[1]}";
}

function getCorrectAnswer(array $digits): int
{
    while ($digits[1] !== 0) {
        $temp = $digits[1];
        $digits[1] = $digits[0] % $digits[1];
        $digits[0] = $temp;
    }

    return $digits[0];
}

function runBrainGcd(): void
{
    $name = greetingUser();
    line('Find the greatest common divisor of given numbers.');
    $correctAnswers = true;

    for ($i = 0; $i < 3; $i++) {
        $digits = getTwoRandomDigits();
        $correctAnswer = getCorrectAnswer($digits);
        $givenNumbers = convertDigitsToString($digits);
        line("Question: {$givenNumbers}");
        $userAnswer = prompt("Your answer");

        if (checkAnswer($userAnswer, $correctAnswer) !== true) {
            $correctAnswers = false;
            break;
        }
    }

    checkCorrect($correctAnswers, $name);
}
