<?php
// phpcs:ignoreFile
namespace BrainGames\Cli;

// Add autoload file to use all available functions
require_once __DIR__ . '/../vendor/autoload.php';

// Function to act with cli
use function cli\line;
use function cli\prompt;


/**
 * Function to greet user
 */
function greeting(): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
