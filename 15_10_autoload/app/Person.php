<?php

use Ramsey\Uuid\Uuid;

class Person
{
    private string $name;
    private string $id;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->id = Uuid::uuid4();
    }

    public function getID(): string
    {
        return $this->id;
    }

}