<?php


class Storage implements DataInterface
{
    private array $products = [];
    private string $path;

    public function __construct(string $path)
    {
        $this->path = $path;

    }

    public function load(): void
    {
        $file= file_get_contents($this->path);
        $products = explode(PHP_EOL, $file);
        foreach ($products as $product) {
            if($product) {
                $product = explode(';', implode(';', str_getcsv($product)));
                $this->products[] = new Product((string)$product[0], (int)$product[1], (int)$product[2]);
            }

        }
    }

    public function save(): void
    {
        $fp = fopen($this->path, 'w');

        foreach ($this->products as $product) {
            if($product){
                $person = (array($product->getName(), $product->getPrice(), $product->getQuantity()));
                fputcsv($fp, $person, ';');
            }
        }
        fclose($fp);
    }

    public function all(): array
    {
        return $this->products;
    }

}