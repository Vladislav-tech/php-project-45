<?php

// phpcs:ignoreFile
namespace BrainGames\IsEven;

// Add autoload file to use all available functions
require_once __DIR__ . '/../vendor/autoload.php';


// Function to act with cli
use function BrainGames\Cli\greeting;
use function cli\line;
use function cli\prompt;

use function BrainGames\Engine\isCorrectAnswer;


function startEvenGame(): void

{
    $name = greeting();

    line('Answer "yes" if the number is even, otherwise answer "no".');

    $counter = 0;

    for ($i = 0; $i < 3; $i += 1) {
        // random int number [1, 100]
        $randNum = rand(1, 100);

        // define correct answer
        $correctAnswer = $randNum % 2 === 0 ? "yes" : "no";

        $question = "Question: {$randNum}\n";


        if (isCorrectAnswer($question, $correctAnswer, $name)) {
            $counter += 1;
        }   else {
            break;
        }
    }

    if ($counter === 3) {
        line("Congrulations %s!\n", $name);
    }
}
