<?php

class PhoneNumberCollection
{
    private string $path;
    private array $persons;

    public function __construct(string $path)
    {
        $this->path = $path;
        $this->loadNumbers();
    }

    public function getPeople(): array
    {
        return $this->persons;
    }

    public function loadNumbers(): void
    {
        $file = fopen($this->path, 'r');

        while(($number = (fgetcsv($file))) !== false){
            $this->persons[] = new Person(
                $number[0],
                $number[1],
                $number[2]
            );
        }
    }

    public function findNumber(int $number): ?Person
    {
        foreach($this->persons as $person){
            if($person->getNumber() == $number){
                return $person;
            }
        }
        return null;
    }


}