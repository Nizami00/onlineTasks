<?php

class Customer
{
    private string $name;
    private int $balance;
    private array $products = [];

    public function __construct(string $name, int $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }

    public function makeABuy($price): void
    {
        $this->balance -= $price;
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function setProducts(array $groceries): void
    {
        $this->products[] = $groceries;
    }


}