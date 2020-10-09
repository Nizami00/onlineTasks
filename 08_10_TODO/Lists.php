<?php

class Lists
{
    private string $path;
    private array $todos;

    public function __construct(string $path)
    {
        $this->path = $path;
        $this->loadSchedule();

    }

    public function getSchedule(): array
    {
        if (isset($this->todos)) {
            return $this->todos;
        } else {
            return ['Seems like there are no tasks!'];
        }

    }

    public function loadSchedule(): void
    {
        $file = fopen($this->path, "r");

        while (($todo = fgetcsv($file)) !== FALSE) {

            $this->todos[] = new TODO($todo[0], $todo[1]);

        }

        fclose($file);

    }

    public function saveSchedule(?string $id): void
    {
        $file = fopen($this->path, 'w');
        if (isset($this->todos)) {
            foreach ($this->todos as $todo) {
                if ($id !== $todo->getID()) {
                    fputcsv($file, (array)$todo);
                }
            }
        }

        fclose($file);
    }

    public function setTodo(?string $todo): void
    {
        if ($todo) {
            $this->todos[] = new TODO($todo, uniqid(''));
        }
    }
}