<?php

namespace BrainGames\AddLogic;

##ОБЩИЕ ФУНКЦИИ

// Проверка корректности ответа
function checkAnswer(string|int $answer, string|int $correct)
{
    if ($answer != $correct) {
        echo  "'{$answer}' is wrong answer ;(. Correct answer was '{$correct}'." . "\n";
        return false;
    } else {
        echo "Correct!\n";
        return true;
    }
}

// Подведение итогов
function checkCorrect(string|int $correctAnswers, string|int $totalQuestions, string|int $name)
{
    if ($correctAnswers === $totalQuestions) {
        echo "Congratulations, {$name}!\n";
    } else {
        echo "Let's try again, {$name}!\n";
    }
}
