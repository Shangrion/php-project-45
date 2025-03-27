<?php

#обозначение пространства-имён
namespace BrainGames\Cli;

#подключение cli(мини-фреймворк)
use function cli\line;
use function cli\prompt;

#функция приветствует юзера и возвращает его имя
function greeting_user()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}
