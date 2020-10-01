<?php

class MakeNumbers
{
    private int $min;
    private int $max;


    public function __construct(int $min = 1, int $max = 1000)
    {
        $this->min = $min;
        $this->max = $max;
    }

    public function getNumber(): int
    {
        return rand($this->min, $this->max);
    }

    public function getNumbers(array $numbers): string
    {
        return implode(' ', array_filter($numbers));
    }

    public function getAverage(array $numbers): float
    {
        return array_sum($numbers) / count(array_filter($numbers));
    }



}