<?php

class Person
{
    private string $name;
    private string $surname;
    private int $phoneNumber;

    public function __construct(string $name, string $surname, int $phoneNumber)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->phoneNumber = $phoneNumber;
    }
    public function getName(): int
    {
        return $this->name;
    }
    public function getSurname(): int
    {
        return $this->surname;
    }

    public function getNumber(): int
    {
        return $this->phoneNumber;
    }

}