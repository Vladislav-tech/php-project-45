<?php

namespace BrainGames\Gcd;

// Add autoload file to use all available functions
require_once __DIR__ . '/../../vendor/autoload.php';

// Function to act with cli
use function BrainGames\Cli\greeting;
use function cli\line;
use function cli\prompt;

use function BrainGames\Engine\isCorrectAnswer;

/**
 * Find the greatest common divisor between two numbers using Euclidean algorithm recursively.
 *
 * @param  int $a First number.
 * @param  int $b Second number.
 * @return int Returns the greatest common divisor.
 */
function gcd(int $a, int $b): int
{
    return $b === 0 ? $a : gcd($b, ($a % $b));
}

function gcdGame(): void
{
    $name = greeting();

    line("Hello %s!", $name);
    line("What is the result of the expression?");

    $counter = 0;

    for ($i = 0; $i < 3; $i += 1) {
        $first = rand(1, 100);
        $second = rand(1, 100);

        $correctAnswer = gcd($first, $second);

        $question = "Question: {$first} {$second}";

        if (isCorrectAnswer($question, $correctAnswer, $name)) {
            $counter += 1;
        } else {
            break;
        }
    }

    if ($counter === 3) {
        line("Congrulations %s!", $name);
    }
}
