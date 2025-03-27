<?php

#Обозначение пространстова-имён
namespace BrainGames\AddLogic;

#Функция для получения строки примера и его результата в массиве для brain-calc
function get_instance_and_result(): array
{
    $instens_result = [];
    $digit1 = random_int(0, 100);
    $digit2 = random_int(0, 100);
    $operators = ['*', '-', '+'];
    $operator = $operators[array_rand($operators)];
    $instens = "{$digit1} {$operator} {$digit2}";
    $instens_result[] = $instens;
    $result = eval("return $digit1 $operator $digit2;");
    $instens_result[] = $result;
    return $instens_result;
}

#Проверка корректности ответа
function check_answer($answer, $correct)
{
    if ($answer != $correct) {
        echo "Incorrect\n";
        return 0;
    } else {
        echo "Correct!\n";
        return 1;
    }
}

#Подведение итогов
function check_correct($correctAnswers, $totalQuestions, $name)
{
    if ($correctAnswers === $totalQuestions) {
        echo "Congratulations, {$name}!\n";
    } else {
        echo "Close! Maybe again, {$name}?\n";
    }
}

#подключение автозагрузки глобал || локал
function project_autoload()
{
    $autoloadPath1 = __DIR__ . '/../../../autoload.php';
    $autoloadPath2 = __DIR__ . '/../vendor/autoload.php';

    if (file_exists($autoloadPath1)) {
        require_once $autoloadPath1;
    } else {
        require_once $autoloadPath2;
    }
}
