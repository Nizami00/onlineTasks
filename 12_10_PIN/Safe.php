<?php

class Safe
{
    private string $pin;
    private bool $locked = true;

    public function __construct(string $pin)
    {
        $this->pin = $pin;
    }

    public function getPin(): string
    {
        return $this->pin;
    }

    public function isLocked(bool $lock): void
    {
        $this->locked = $lock;
    }



}