<?php

class PeopleCollection
{
    private string $path;
    private array $people;

    public function __construct(string $path)
    {
        $this->path = $path;
        $this->load();
    }

    public function getPeople():array
    {
        return $this->people;
    }

    private function load(): void
    {
        $file = fopen($this->path, 'r');

        while(($person = fgetcsv($file)) !== false){
            $this->people[] = new Person($person[0], $person[1]);
        }

        fclose($file);
    }

    public function checkID(string $id): ?Person
    {
        foreach($this->people as $person){
            if ($person->getID() == $id){
                return $person;
            }
        }

        return null;
    }


}