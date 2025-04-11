<?php

namespace BrainGames\BrainProgression;

use function BrainGames\AddLogic\startGame;

function getProgressionExpressionWithResult(): array
{
    {
        $numberStart = rand(0, 100);
        $step = rand(0, 5);
        $allNumbers = [];
    
        for ($i = 0; $i < 10; $i++) {
            $allNumbers[] = $numberStart;
            $numberStart += $step;
        }
    
        $key = array_rand($allNumbers);
        $missNumber = $allNumbers[$key];
        $allNumbers[$key] = "..";
        $listOfNumbers = "";
    
        foreach ($allNumbers as $digit) {
            $listOfNumbers .= $digit . " ";
        }
    
            return [$listOfNumbers, $missNumber];
    }
}

function runBrainProgression(): void
{
    $gameRuls = 'What number is missing in the progression?';
    startGame($gameRuls, fn(): array => getProgressionExpressionWithResult());
}
