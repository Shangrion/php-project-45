# BRAIN GAMES

### Hexlet tests and linter status:
[![Actions Status](https://github.com/Shangrion/php-project-45/actions/workflows/hexlet-check.yml/badge.svg)](https://github.com/Shangrion/php-project-45/actions)
[![Maintainability](https://qlty.sh/badges/0cd7d688-f0ea-4e9c-87b4-e93d044d08d4/maintainability.svg)](https://qlty.sh/gh/Shangrion/projects/php-project-45)

## Порядок установки

* С помощью терминала зайдите в дирректорию, куда вы хотите распаковать Brain Games и введите в нём `git clone git@github\.com:Shangrion/php-project-45.git`.
Либо для нативной (визуальный интерфейс) установки воспользуйтесь распаковкой через зип файл. Ссылка на zip -> https://github.com/Shangrion/php-project-45/archive/refs/heads/main.zip
* Далее, уже только с помощью терминала войдя в директорию (папку) с проектом введите `make install`
* После этого вы уже можете начать играть.
* При помощи команды `make brain-help` ознакомьтесь с доступными командами для запуска игр.

## Правила для игр

* В каждой игре для победы вы должны правильно ответить 3 раза. То как нужно правильно отвечать, будет сообщаться вам в начале каждой игры. Если ответите не верно, раунд проигран, но вы можете попробовать снова ;). Неправильный ввод (пробел, заглавная буква и тд.) будет расцениваться как неверный ответ. Пример того как играется каждая игра вы сможете посмотреть с помощью записей аскинем находящихся в самом конце README который вы сейчас читаете.

## Описание игр

* Игра "Проверка на чётность" `make brain-even`. Вам будет показывться случайное число. Вы должны ответить yes, если число чётное, или no — если нечётное.
* Игра "НОД" `make brain-gcd`. Вам будет показываться два случайных числа. Вы должны ввести наибольший общий делитель этих чисел.
* Игра "Простое ли число?" `make brain-prime`. Вам будет показываться случайное число. Вы должны ответить yes, если число простое, или no — если оно им не является.
* Игра "Арифметическая прогрессия" `make brain-progression`. Вам будет показан ряд чисел, одно из которых пропущенно. Вы должны определив прогрессию написать пропущенное число.
* Игра "Калькулятор" `make brain-calc`. Вам будет показываться случаянное математическое выражение, на сложение, вычитание или умножение которое вам нужно вычислить. В ответ записываете число в цифровом формате(оно может быть отрицательным).

## Системные требования

* PHP 8.0+
* Расширения PHP: 'mbstring', 'json'
* Зависимости: 'Установленный Composer', 'Пакет cli-prompt'
* ОС: 'Linux / macOS / Windows (с WSL или Git Bash для Windows)'
* Память: 'Минимум 128 MB RAM (для работы PHP)'
* Терминал: 'Поддержка UTF-8 (для корректного вывода символов)'

### Asciinema Brain-Even
https://asciinema.org/a/dQcuJLwzZJP0I2Yn1rn8z9Aq1
### Asciinema Brain-Calc
https://asciinema.org/a/cSfgS5OREKouO6cGagLXaSmD3
### Asciinema Brain-Gcd
https://asciinema.org/a/bgtwCEhrhYPfUUt7q8DKUM7n1
### Asciinema Brain-Progression
https://asciinema.org/a/NlkCJNGuW5VbXhleH9G7FlS9Z
### Asciinema Brain-Prime
https://asciinema.org/a/kmhx0gXKlh0yeUbEXBBRaLegZ