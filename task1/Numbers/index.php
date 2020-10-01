<?php
require_once 'StorageInterface.php';
require_once 'MakeNumbers.php';
require_once 'NumberStorage.php';


$numberStorage = new NumberStorage('random_numbers.txt');
$makeNumbers = new MakeNumbers();



while(true) {
    $randNum = $makeNumbers->getNumber();
    $numberStorage->add($randNum);
    $numberStorage->save();

    echo 'Numbers are: ' . $makeNumbers->getNumbers($numberStorage->load()) . PHP_EOL;
    echo 'Average will be ' . round($makeNumbers->getAverage($numberStorage->load()), 2) . PHP_EOL;
    sleep(1);
}
