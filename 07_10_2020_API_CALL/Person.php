<?php

class Person
{
    private string $name;
    private string $surname;
    private string $personalCode;
    private string $address;


    public function __construct(string $name, string $surname, string $personalCode, string $address)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->personalCode = $personalCode;
        $this->address = $address;;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPersonalCode(): string
    {
        return $this->personalCode;
    }

}
