<?php


abstract class Database
{
    protected string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
        $this->load();
    }

    abstract protected function load(): void;

}
