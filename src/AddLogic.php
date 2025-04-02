<?php

namespace BrainGames\AddLogic;

use function BrainGames\Cli\greetingUser;
use function cli\prompt;

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

##ФУНКЦИИ ДЛЯ БИНАРНИКОВ

//ПРОГРЕССИЯ
function brainProgression()
{
    function progressDigitsAndAnswer()
    {
    $digitStart = rand(0, 100);
    $digitStep = rand(0, 5);
    $allDigits = [];

    for ($i = 0; $i < 10; $i++) {
        $allDigits[] = $digitStart;
        $digitStart += $digitStep;
    }

    $key = array_rand($allDigits);
    $missDigit = $allDigits[$key];
    $allDigits[$key] = "..";
    $strDigits = "";

    foreach ($allDigits as $digit) {
        $strDigits .= $digit . " ";
    }

    $result = [$strDigits, $missDigit];
    return $result;
    }

    $name = greetingUser();
    echo 'What number is missing in the progression?' . "\n";
    $correctAnswers = 0;

    for ($i = 0; $i < 3; $i++) {
        [$digits, $result] = progressDigitsAndAnswer();
        echo "Question: {$digits}" . "\n";
        $answer = prompt("Your answer");

        if (checkAnswer($answer,$result) === true) {
            $correctAnswers++;
            } else {
                break;
            }
    }
    checkCorrect($correctAnswers, 3, $name);
}

//ПРОСТОЕ ЛИ ЧИСЛО
function brainPrime()
{
    function getDigitChekPrime()
    {
        $answer = "yes";
        $digit = rand(0, 100);
        if ($digit < 2) {
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

    $name = greetingUser();
    echo 'Answer "yes" if given number is prime. Otherwise answer "no".' . "\n";
    $correctAnswers = 0;

    for ($i = 0; $i < 3; $i++) {
        [$digits, $result] = getDigitChekPrime();
        echo "Question: {$digits}" . "\n";
        $answer = prompt("Your answer");

        if (checkAnswer($answer,$result) === true) {
            $correctAnswers++;
            } else {
                break;
            }
    }
    checkCorrect($correctAnswers, 3, $name);
}

//НОД
function brainGcd()
{
    function gcdDigitsAndAnswer()
    {
    $digit1 = rand(0, 100);
    $digit2 = rand(0, 100);
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

    $name = greetingUser();
    echo 'Find the greatest common divisor of given numbers.' . "\n";
    $correctAnswers = 0;

    for ($i = 0; $i < 3; $i++) {
        [$digits, $result] = gcdDigitsAndAnswer();
        echo "Question: {$digits}" . "\n";
        $answer = prompt("Your answer");

        if (checkAnswer($answer,$result) === true) {
            $correctAnswers++;
            } else {
                break;
            }
    }

    checkCorrect($correctAnswers, 3, $name);
}

//ЧЁТНОЕ ЧИСЛО
function brainEven()
{
    $name = greetingUser();
    echo 'Answer "yes" if the number is even, otherwise answer "no".' . "\n";
    $correctAnswers = 0;

    for ($i = 0; $i < 3; $i++) {
        $digit = rand(1, 100);
        $result = ($digit % 2 === 0) ? "yes" : "no";
        echo "Question: {$digit}" . "\n";
        $answer = prompt("Your answer");
        
        if (checkAnswer($answer,$result) === true) {
            $correctAnswers++;
            } else {
                break;
            }
    }
    checkCorrect($correctAnswers, 3, $name);
}

//КАЛЬКУЛЯТОР
function breinCalc()
{
    function getInstanceAndResult()
    {
        $instensResult = [];
        $digit1 = random_int(0, 100);
        $digit2 = random_int(0, 100);
        $operators = ['*', '-', '+'];
        $operator = $operators[array_rand($operators)];
        $instens = "{$digit1} {$operator} {$digit2}";
        $instensResult[] = $instens;
        $result = eval("return $digit1 $operator $digit2;");
        $instensResult[] = $result;
        return $instensResult;
    }

    $name = greetingUser();
    echo 'What is the result of the expression?' . "\n";
    $correctAnswers = 0;

    for ($i = 0; $i < 3; $i++) {
        [$instance, $result] = getInstanceAndResult();
        echo "Question: {$instance}" . "\n";
        $answer = prompt("Your answer");

        if (checkAnswer($answer,$result) === true) {
            $correctAnswers++;
            } else {
                break;
            }
    }
    checkCorrect($correctAnswers, 3, $name);
}
