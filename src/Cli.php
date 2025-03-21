<?php

namespace BrainGames\Cli;
echo "1";
use function cli\line;
use function cli\prompt;

function greeting_user()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}