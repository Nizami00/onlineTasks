<?php

include 'index.html';
require_once 'types/TypesInterface.php';
foreach (glob('types/*.php') as $filename) {
    require_once $filename;
}

require_once 'results/ResultInterface.php';
foreach (glob('results/*.php') as $filename) {
    require_once $filename;
}

require_once 'ComputerChoice.php';
require_once 'Results.php';

$computer = new ComputerChoice();
$computerName = $computer->numberToName($computer->setNumber());
$computerChoice = ucfirst($computerName);
$computerChoice = new $computerChoice;

$types = ['rock', 'paper', 'spock', 'lizard', 'scissors', 'paper'];
$result = '';

$playerChoice = $_POST["choice"];

if (isset($_POST['choice'])) {
    foreach ($types as $choice) {
        if ($choice == $playerChoice) {
            $playerChoice = ucfirst($playerChoice);
            $instance = new $playerChoice;
            $result = $instance->wins($computerChoice);
            $result = $result->result();
        }
    }
} else {
    echo file_get_contents('index.html');
}

echo Results::resultsDisplay($result, $playerChoice, $computerName);





