<?php

namespace BrainGames\Calc;

// Add autoload file to use all available functions
require_once __DIR__ . '/../vendor/autoload.php';

// Function to act with cli
use function BrainGames\Cli\greeting;
use function cli\line;
use function cli\prompt;

use function BrainGames\Engine\isCorrectAnswer;

function sum(int $a, int $b): int {
    return $a + $b;
}

function mul(int $a, int $b): int
{
    return $a * $b;
}

function sub(int $a, int $b): int
{
    return $a - $b;
}


function calc(): void
{
    $name = greeting();

    line("Hello %s!\n", $name);
    line("What is the result of the expression?\n");

    $operations = ["+", "-", "*"];

    $counter = 0;


    for ($i = 0; $i < 3; $i += 1) {
        $choosedOperation = $operations[rand(0, 2)];
        $firstOperand = rand(-30, 30);
        $secondOperand = rand(-30, 30);

        $correctAnswer = match($choosedOperation) {
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
        line("Congrulations %s!\n", $name);
    }

}
