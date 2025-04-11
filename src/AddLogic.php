<?php

namespace BrainGames\AddLogic;

use function cli\line;
use function BrainGames\Cli\greetingUser;
use function cli\prompt;

##ОБЩИЕ ФУНКЦИИ

// Проверка корректности ответа
function checkAnswer(string|int $answer, string|int $correct): bool
{
    if ($answer !== $correct) {
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

//Запуск игры(Общение с игроком||обработка вопросов и ответов)
function startGame(string $gameRuls, callable $expressionWithResult): void
{
    $name = greetingUser();
    line("{$gameRuls}");

    $correctAnswers = true;
    $numberOfQuestions = 3;

    for ($i = 0; $i < $numberOfQuestions; $i++) {
        [$question, $result] = $expressionWithResult();
        line("Question: {$question}");
        $answer = prompt("Your answer");

        if (checkAnswer($answer, $result) !== true) {
            $correctAnswers = false;
            break;
        }
    }
    checkCorrect($correctAnswers, $name);
}
