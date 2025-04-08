<?php

namespace BrainGames\BrainPrime;

use function BrainGames\AddLogic\checkAnswer;
use function BrainGames\AddLogic\checkCorrect;
use function BrainGames\Cli\greetingUser;
use function cli\prompt;
use function cli\line;

function getDigitChekPrime()
{
        $answer = "yes";
        $digit = rand(0, 100);
    if ($digit < 2) {
        $answer = "no";
    } else {
        for ($i = 2; $i <= sqrt($digit); $i++) {
            if ($digit % $i == 0) {
                $answer = "no";
            }
        }
    }
        $result = [$digit, $answer];
        return $result;
}

function runBrainPrime()
{
    $name = greetingUser();
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    $correctAnswers = 0;

    for ($i = 0; $i < 3; $i++) {
        [$digits, $result] = getDigitChekPrime();
        line("Question: {$digits}");
        $answer = prompt("Your answer");

        if (checkAnswer($answer, $result) === true) {
            $correctAnswers++;
        } else {
            break;
        }
    }
    
    checkCorrect($correctAnswers, 3, $name);
}
