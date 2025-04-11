<?php

namespace BrainGames\BrainCalc;

use function BrainGames\AddLogic\startGame;

function getCalcExpressionWithResult(): array
{
    $expressionWithResult = [];
    $digit1 = random_int(0, 100);
    $digit2 = random_int(0, 100);
    $operators = ['*', '-', '+'];
    $operator = $operators[array_rand($operators)];
    $expression = "{$digit1} {$operator} {$digit2}";

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

    return [$expression, $result];
}

function runBrainCalc(): void
{
    $gameRuls = 'What is the result of the expression?';
    startGame($gameRuls, fn(): array => getCalcExpressionWithResult());
}