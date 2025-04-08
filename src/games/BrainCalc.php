<?php

namespace BrainGames\BrainCalc;

use function BrainGames\AddLogic\checkAnswer;
use function BrainGames\AddLogic\checkCorrect;
use function BrainGames\Cli\greetingUser;
use function cli\prompt;
use function cli\line;

function getExpressionWithResult()
{
    $ExpressionWithResult = [];
    $digit1 = random_int(0, 100);
    $digit2 = random_int(0, 100);
    $operators = ['*', '-', '+'];
    $operator = $operators[array_rand($operators)];
    $Expression = "{$digit1} {$operator} {$digit2}";
    $ExpressionWithResult[] = $Expression;

    switch ($operator) {
        case '+':
            $result = $digit1 + $digit2;
            break;
        case '-':
            $result = $digit1 - $digit2;
            break;
        case '*':
            $result = $digit1 * $digit2;
            break;
    }
    
    $ExpressionWithResult[] = $result;
    return $ExpressionWithResult;
}

function runBrainCalc()
{
    $name = greetingUser();
    line('What is the result of the expression?');
    $correctAnswers = 0;

    for ($i = 0; $i < 3; $i++) {
        [$instance, $result] = getExpressionWithResult();
        line("Question: {$instance}");
        $answer = prompt("Your answer");

        if (checkAnswer($answer, $result) === true) {
            $correctAnswers++;
        } else {
            break;
        }
    }
    checkCorrect($correctAnswers, 3, $name);
}
