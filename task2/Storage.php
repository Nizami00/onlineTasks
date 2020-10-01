<?php


class Storage
{
    private array $products = [];

    public function add(Product $product): void
    {
        $this->products[] = $product;
    }

    public function all(): array
    {
        return $this->products;
    }

}