<?php

namespace BrainGames\BrainEven;

use function BrainGames\AddLogic\startGame;

function getEvenExpressionWithResult(): array
{
    $expressionWithResult = [];
    $digit = rand(1, 100);
    $result = ($digit % 2 === 0) ? "yes" : "no";
    return [$digit, $result];

}

function runBrainEven(): void
{
    $gameRuls = 'Answer "yes" if the number is even, otherwise answer "no".';
    startGame($gameRuls, fn(): array => getEvenExpressionWithResult());
}
