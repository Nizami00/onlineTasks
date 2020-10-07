<?php

class Results
{
    public static function resultsDisplay(
        string $result,
        string $playerChoice,
        string $computerChoice): string
    {
        $playerChoice = lcfirst($playerChoice);
        $htmlFile = file_get_contents('result.html');
        $htmlFile = str_replace('%result%', $result, $htmlFile);
        $htmlFile = str_replace('%player%', $playerChoice, $htmlFile);
        $htmlFile = str_replace('%computer%', $computerChoice, $htmlFile);
        return $htmlFile;
    }
}