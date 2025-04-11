<?php

namespace BrainGames\BrainGcd;

use function BrainGames\AddLogic\startGame;

function getTwoRandomDigits(): array
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

function getGcdCorrectAnswer(array $digits): int
{
    while ($digits[1] !== 0) {
        $temp = $digits[1];
        $digits[1] = $digits[0] % $digits[1];
        $digits[0] = $temp;
    }

    return $digits[0];
}

function getGcdExpressionWithResult(): array
{
    $digits = getTwoRandomDigits();
    $expression = convertDigitsToString($digits);
    $correctAnswer = getGcdCorrectAnswer($digits);
    $expression[] = $correctAnswer;
    return [$expression, $correctAnswer];
}

function runBrainGcd(): void
{
    $gameRuls = 'Find the greatest common divisor of given numbers.';
    startGame($gameRuls, fn(): array => getGcdExpressionWithResult());
}
