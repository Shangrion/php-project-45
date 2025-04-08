<?php

namespace BrainGames\AddLogic;

use function cli\line;

##ОБЩИЕ ФУНКЦИИ

// Проверка корректности ответа
function checkAnswer(string|int $answer, string|int $correct): bool
{
    if ($answer != $correct) {
        line("'{$answer}' is wrong answer ;(. Correct answer was '{$correct}'.");
        return false;
    } else {
        line("Correct!");
        return true;
    }
}

// Подведение итогов
function checkCorrect(bool $correctAnswers, string $name): void
{
    if ($correctAnswers === true) {
        line("Congratulations, {$name}!");
    } else {
        line("Let's try again, {$name}!");
    }
}
