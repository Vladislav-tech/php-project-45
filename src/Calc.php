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

        // line("Question: %d %s %d", $firstOperand, $choosedOperation, $secondOperand);
        $question = "Question {$firstOperand} {$choosedOperation} {$secondOperand}";

        // $answer = (int)prompt("Your answer ");

        // if ($answer === $correctAnswer) {
        //     line("Correct!\n");
        //     continue;
        // }   else {
        //     line("'%d' is wrong answer ; (. Correct answer was '%d'\n", $answer, $correctAnswer);
        //     line("Let's try again, %s!", $name);

        //     return;
        // }
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
