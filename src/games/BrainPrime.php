<?php

namespace BrainGames\BrainPrime;

use function BrainGames\AddLogic\startGame;

function getDigit(): int
{
    $digit = rand(0, 100);
    return $digit;
}
function chekPrime(int $digit): bool
{
    $userAnswer = true;

    if ($digit < 2) {
        $userAnswer = false;
    } else {
        for ($i = 2; $i <= sqrt($digit); $i++) {
            if ($digit % $i == 0) {
                $userAnswer = false;
            }
        }
    }
        return $userAnswer;
}

function getPrimeExpressionWithResult(): array
{
    $randomDigit = getDigit();
    $correctAnswer = (chekPrime($randomDigit)) ? "yes" : "no";
    return [$randomDigit, $correctAnswer];
}

function runBrainPrime(): void
{
    $gameRuls = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    startGame($gameRuls, fn(): array => getPrimeExpressionWithResult());
}
