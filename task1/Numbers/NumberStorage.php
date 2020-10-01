<?php

//require_once 'StorageInterface.php';

class NumberStorage implements StorageInterface
{
    private string $path;
    private const delimiter = PHP_EOL;
    private array $numbers;

    public function __construct(string $path)
    {
        $this->path = $path;

        $this->numbers = explode(self::delimiter, file_get_contents($this->path));

    }


    public function load(): array
    {
        return explode(self::delimiter, file_get_contents($this->path));
    }

    public function save(): void
    {
        file_put_contents($this->path, implode(self::delimiter, $this->numbers));
    }

    public function add(int $number): void
    {
        $this->numbers[] = $number;
    }
}