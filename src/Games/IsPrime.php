<?php

namespace BrainGames\IsPrime;

// Add autoload file to use all available functions
require_once __DIR__ . '/../../vendor/autoload.php';

// Function to act with cli
use function BrainGames\Cli\greeting;
use function cli\line;
use function BrainGames\Engine\isCorrectAnswer;

/**
 * Checks if a number is prime or not.
 * @param int $n Number to check.
 * @return bool True if prime, false otherwise.
 */
function isPrime(int $n): bool
{
    if ($n <= 1) {
        return false; // 0, 1, and negative numbers are not prime
    }

    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) {
            return false; // if the number is divisible by any number between 2 and sqrt(n), it's not prime
        }
    }

    return true; // the number is prime
}

function startIsPrimeGame(): void
{
    $name = greeting();

    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    $counter = 0;

    for ($i = 0; $i < 3; $i += 1) {
        $randNum = rand(1, 100);

        $correctAnswer = isPrime($randNum) ? "yes" : "no";

        $question = "Question {$randNum}";

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
