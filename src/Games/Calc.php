<?php

namespace BrainGames\Calc;

// Add autoload file to use all available functions
require_once __DIR__ . '/../../vendor/autoload.php';

// Function to act with cli
use function BrainGames\Cli\greeting;
use function cli\line;
use function cli\prompt;

use function BrainGames\Engine\isCorrectAnswer;

/**
 * Get sum of two numbers.
 * @param int|float $a First number.
 * @param int|float $b Second number.
 * @return int|float Sum of two numbers.
 */
function sum(int|float $a, int|float $b): int|float
{
    return $a + $b;
}

/**
 * Get multiplication of two numbers.
 * @param int|float $a First number.
 * @param int|float $b Second number.
 * @return int|float Product of two numbers.
 */
function mul(int|float $a, int|float $b): int|float
{
    return $a * $b;
}

/**
 * Get substraction of two numbers.
 * @param int|float $a First number.
 * @param int|float $b Second number.
 * @return int|float Substraction of two numbers.
 */
function sub(int|float $a, int|float $b): int|float
{
    return $a - $b;
}


function calc(): void
{
    $name = greeting();

    line("Hello %s!\n", $name);
    line("What is the result of the expression?");

    $operations = ["+", "-", "*"];

    $counter = 0;


    for ($i = 0; $i < 3; $i += 1) {
        $choosedOperation = $operations[rand(0, 2)];
        $firstOperand = rand(-30, 30);
        $secondOperand = rand(-30, 30);

        $correctAnswer = match ($choosedOperation) {
            "+" => sum($firstOperand, $secondOperand),
            "-" => sub($firstOperand, $secondOperand),
            "*" => mul($firstOperand, $secondOperand),
        };

        $question = "Question {$firstOperand} {$choosedOperation} {$secondOperand}";

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
