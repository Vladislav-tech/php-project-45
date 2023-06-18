<?php

namespace BrainGames\Cli;

// Add autoload file to use all available functions
require_once __DIR__ . '/../vendor/autoload.php';

// Function to act with cli
use function cli\line;
use function cli\prompt;


/**
 * Function to greet user
 * @return string name of user
 */
function greeting(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    return $name;
}
