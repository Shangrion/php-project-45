<?php

namespace BrainGames\BrainPrime;

use function BrainGames\AddLogic\checkAnswer;
use function BrainGames\AddLogic\checkCorrect;
use function BrainGames\Cli\greetingUser;
use function cli\prompt;
use function cli\line;

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

function runBrainPrime(): void
{
    $name = greetingUser();
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    $correctAnswers = true;

    for ($i = 0; $i < 3; $i++) {
        $randomDigit = getDigit();
        $correctAnswer = (chekPrime($randomDigit)) ? "yes" : "no";
        line("Question: {$randomDigit}");
        $userAnswer = prompt("Your userAnswer");

        if (checkAnswer($userAnswer, $correctAnswer) !== true) {
            $correctAnswers = false;
            break;
        }
    }

    checkCorrect($correctAnswers, $name);
}
