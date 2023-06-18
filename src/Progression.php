<?php

// phpcs:ignoreFile
namespace BrainGames\Progression;

// Add autoload file to use all available functions
require_once __DIR__ . '/../vendor/autoload.php';

// Function to act with cli
use function BrainGames\Cli\greeting;
use function cli\line;
use function cli\prompt;

use function BrainGames\Engine\isCorrectAnswer;

function createArray(int $length, int $start, int $dif): array
{
  $arr = [];

  for ($i = 0; $i < $length; $i += 1) {
    if ($i === 0) {
      $arr[0] = $start;
    } else {
      $arr[$i] = $arr[$i - 1] + $dif;
    }
  }

  return $arr;
}

function hideItem(array &$arr, int $item): void
{
  for ($i = 0; $i < count($arr); $i += 1) {
    if ($arr[$i] === $item) {
      $arr[$i] = "..";
    }
  }
}

function progression(): void
{
  $name = greeting();

  line("Hello %s!\n", $name);
  line("What number is missing in the progression?\n");

  $counter = 0;

  for ($i = 0; $i < 3; $i += 1) {
    $sequence = createArray(10, rand(0, 10), rand(0, 4));
    $correctAnswer = $missedItem = $sequence[rand(0, 9)];



    hideItem($sequence, $missedItem);
    $str = implode(" ", $sequence);
    $question = "Question: {$str}";


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
