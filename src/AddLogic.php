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

#Функция для brain-progression
function progress_digits_and_answer()
{
    $digit_start = rand(0,100);
    $digit_step = rand(0,5);
    $all_digits = [];
    for ($i = 0; $i < 10; $i++){
        $all_digits[] = $digit_start;
        $digit_start += $digit_step;
    }
    $key = array_rand($all_digits);
    $miss_digit = $all_digits[$key];
    $all_digits[$key] = "..";
    $str_digits = "";
    foreach ($all_digits as $digit) {
        $str_digits .= $digit . " ";
    }
    $result = [$str_digits, $miss_digit];
    return $result;
}

#Функция для brain-prime
function get_digit_chek_prime()
{
    $answer = "yes";
    $digit = rand(0,100);
    if ($digit < 2){
        $answer = "no";
    } else {
        for ($i = 2; $i <= sqrt($digit); $i++) {
            if ($digit % $i == 0) {
                $answer = "no";
            }
        }
    }
    $result = [$digit, $answer];
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
        echo "Let's try again, {$name}?\n";
    }
}