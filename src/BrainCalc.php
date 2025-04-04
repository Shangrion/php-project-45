<?php

namespace BrainGames\BrainCalc;

use function BrainGames\AddLogic\checkAnswer;
use function BrainGames\AddLogic\checkCorrect;
use function BrainGames\Cli\greetingUser;
use function cli\prompt;

function getInstanceAndResult()
{
    $instensResult = [];
    $digit1 = random_int(0, 100);
    $digit2 = random_int(0, 100);
    $operators = ['*', '-', '+'];
    $operator = $operators[array_rand($operators)];
    $instens = "{$digit1} {$operator} {$digit2}";
    $instensResult[] = $instens;
    $result = eval("return $digit1 $operator $digit2;");
    $instensResult[] = $result;
    return $instensResult;
}

function brainCalc()
{
    $name = greetingUser();
    echo 'What is the result of the expression?' . "\n";
    $correctAnswers = 0;

    for ($i = 0; $i < 3; $i++) {
        [$instance, $result] = getInstanceAndResult();
        echo "Question: {$instance}" . "\n";
        $answer = prompt("Your answer");

        if (checkAnswer($answer, $result) === true) {
            $correctAnswers++;
        } else {
            break;
        }
    }
    checkCorrect($correctAnswers, 3, $name);
}
