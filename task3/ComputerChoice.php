<?php

class ComputerChoice
{
    private int $number;

    public function __construct()
    {
        $this->number = rand(0, 4);
    }


    public function setNumber(): int
    {
        return $number = rand(0, 4);
    }

    public function numberToName($number): string
    {
        switch ($number) {
            case 0:
                return 'rock';
            case 1:
                return 'spock';
            case 2:
                return 'paper';
            case 3:
                return 'lizard';
            case 4:
                return 'scissors';
            default:
                return 'Something went wrong!';
        }
    }


}