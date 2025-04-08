<?php

namespace BrainGames\AddLogic;

use function cli\line;

##ОБЩИЕ ФУНКЦИИ

// Проверка корректности ответа
function checkAnswer(string|int $answer, string|int $correct)
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
function checkCorrect(string|int $correctAnswers, string|int $totalQuestions, string|int $name)
{
    if ($correctAnswers === $totalQuestions) {
        line("Congratulations, {$name}!");
    } else {
        line("Let's try again, {$name}!");
    }
}
