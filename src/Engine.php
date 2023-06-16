<?php

namespace BrainGames\Engine;

// Add autoload file to use all available functions
require_once __DIR__ . '/../vendor/autoload.php';

// Function to act with cli
use function cli\line;
use function cli\prompt;

/**
 * This predicatt function uses in the game logic.
 * Return boolean value
 *
 * @param  string $question Current question to user.
 * @param  int|string $correctAnswer Correct answer.
 * @param  string $name User name.
 * @return bool true|false
 */
function isCorrectAnswer(string $question, int|string $correctAnswer, string $name): bool
{
    line($question);

    $answer = strtolower(prompt("Your answer"));

    if ($answer == $correctAnswer) {
        line("Correct \n");
    } else {
        line("'%s' is wrong answer ; (. Correct answer was '%s'\n", $answer, $correctAnswer);
        line("Let's try again, %s!", $name);

        return false;
    }

    return true;
}
