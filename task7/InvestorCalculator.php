<?php

class InvestorCalculator
{
    private int $balance;
    private int $ages;
    private int $percents;

    public function __construct(int $balance, int $ages, int $percents)
    {
        $this->balance = $balance;
        $this->ages = $ages;
        $this->percents = $percents;
    }

    public function getBalance(): string
    {
        self::calculate();
        return 'After ' . $this->ages . ' you will have ' . $this->balance;
    }

    private function calculate(): void
    {
        for($i=1;$i<=$this->ages;$i++){
            $interest = $this->balance * ($this->percents / 100);
            $this->balance += $interest;
        }
    }

}