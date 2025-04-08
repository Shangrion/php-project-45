<?php

namespace BrainGames\BrainEven;

use function BrainGames\AddLogic\checkAnswer;
use function BrainGames\AddLogic\checkCorrect;
use function BrainGames\Cli\greetingUser;
use function cli\prompt;
use function cli\line;

function runBrainEven()
{
    $name = greetingUser();
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $correctAnswers = 0;

    for ($i = 0; $i < 3; $i++) {
        $digit = rand(1, 100);
        $result = ($digit % 2 === 0) ? "yes" : "no";
        line("Question: {$digit}");
        $answer = prompt("Your answer");

        if (checkAnswer($answer, $result) === true) {
            $correctAnswers++;
        } else {
            break;
        }
    }

    checkCorrect($correctAnswers, 3, $name);
}
