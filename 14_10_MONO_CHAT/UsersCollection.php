<?php

class UsersCollection extends Database
{
    protected string $path;
    private array $people;


    public function getPeople(): array
    {
        return $this->people;
    }

    protected function load(): void
    {
        $file = fopen($this->path, 'r');

        while (($person = fgetcsv($file)) !== false) {
            $this->people[] = new User($person[0], $person[1]);
        }

        fclose($file);
    }

    public function checkID(string $id): ?User
    {
        foreach ($this->people as $person) {
            if ($person->getID() == $id) {
                return $person;
            }
        }

        return null;
    }


    public function findByName(string $id): string
    {
        foreach ($this->people as $person) {
            if ($person->getID() == $id) {
                return $person->getName();
            }
        }
    }


}