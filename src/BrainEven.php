<?php

namespace BrainGames\BrainEven;

use function BrainGames\AddLogic\checkAnswer;
use function BrainGames\AddLogic\checkCorrect;
use function BrainGames\Cli\greetingUser;
use function cli\prompt;

function brainEven()
{
    $name = greetingUser();
    echo 'Answer "yes" if the number is even, otherwise answer "no".' . "\n";
    $correctAnswers = 0;

    for ($i = 0; $i < 3; $i++) {
        $digit = rand(1, 100);
        $result = ($digit % 2 === 0) ? "yes" : "no";
        echo "Question: {$digit}" . "\n";
        $answer = prompt("Your answer");

        if (checkAnswer($answer, $result) === true) {
            $correctAnswers++;
        } else {
            break;
        }
    }
    checkCorrect($correctAnswers, 3, $name);
}
