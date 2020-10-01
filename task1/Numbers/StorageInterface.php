<?php

interface StorageInterface
{
    public function load(): array;
    public function save(): void;
    public function add(int $number): void;
}