<?php

class Storage
{
    private string $path;
    private array $users = [];

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function getUser(): string
    {
        if (isset($_POST['findPerson'])) {
            foreach ($this->users as $user) {
                if ($user->getPersonalCode() == $_POST['findPerson']) {
                    return $user->getName() . ' and with code ' . $user->getPersonalCode();
                }
            }
            return "Didn't find such person";
        }

        return '';
    }

    public function loadUsers(): void
    {
        $database = fopen($this->path, 'r');
        while ($user = fgetcsv($database)) {
            $this->users[] = new Person(
                $user[0],
                $user[1],
                $user[2],
                $user[3]
            );

        }
        fclose($database);
    }

    private function checkUser(): bool
    {
        $registered = false;
        if (isset($_POST['name'])) {
            foreach ($this->users as $user) {
                if ($user->getName() == $_POST['name']) {
                    $registered = true;
                    break;
                }
            }
        }
        return $registered;
    }

    public function setUser(): void
    {

        if (!self::checkUser() && isset($_POST['name'])) {
            $this->users[] = new Person(
                $_POST['name'],
                $_POST['surname'],
                $_POST['code'],
                $_POST['address']);
        }
    }

    public function saveUsers(): void
    {

        $database = fopen($this->path, 'w+');
        foreach ($this->users as $user) {
            if ($user) {
                fputcsv($database, (array)$user);
            }
        }

        fclose($database);

    }


}