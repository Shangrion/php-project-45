<?php

#Обозначение пространстова-имён
namespace BrainGames\AddLogic;

//ФУНКЦИИ ДЛЯ ИГР

#Функция для получения строки примера и его результата в массиве для brain-calc
function get_instance_and_result()
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
#Функция для brain-gcd
function gcd_digits_and_answer() 
{   
    $digit1 = rand(0,100);
    $digit2 = rand(0,100);
    $result = [];
    $result[] = "{$digit1} {$digit2}";
    while ($digit2 !== 0) {
        $temp = $digit2;
        $digit2 = $digit1 % $digit2;
        $digit1 = $temp;
    }
    $result[] = $digit1;
    return $result;
}

//ОБЩИЕ ФУНКЦИИ

#Проверка корректности ответа
function check_answer($answer, $correct)
{
    if ($answer != $correct) {
        echo  "'{$answer}' is wrong answer ;(. Correct answer was '{$correct}'." . "\n";
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