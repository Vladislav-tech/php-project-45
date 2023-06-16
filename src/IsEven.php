<?php

// phpcs:ignoreFile
namespace BrainGames\IsEven;

// Add autoload file to use all available functions
require_once __DIR__ . '/../vendor/autoload.php';


// Function to act with cli

use function BrainGames\Cli\greeting;
use function cli\line;
use function cli\prompt;


function startEvenGame()

{
    $name = greeting();

    line('Answer "yes" if the number is even, otherwise answer "no".');

    for ($i = 0; $i < 3; $i += 1) {
        $randNum = rand(1, 100);
        $correctAnswer = $randNum % 2 === 0 ? "yes" : "no";

        line("Question: %s\n", $randNum);

        $answer = prompt("Your answer ");

        if ($answer === $correctAnswer) {
            line("Correct!\n");
            continue;
        } else {
            line("'%s' is wrong answer ; (. Correct answer was '%s'\n", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);

            return;
        }
    }

    line("Congrulations %s!\n", $name);
}
