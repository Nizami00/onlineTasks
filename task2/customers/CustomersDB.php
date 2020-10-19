<?php

class CustomersDB implements DataInterface
{
    private array $customers = [];
    private string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function load(): void
    {
        $database = file_get_contents($this->path);
        $customers = explode(PHP_EOL, $database);

        foreach ($customers as $line) {
            if($line){
            $customer = explode(';', implode(';', str_getcsv($line)));
            $this->customers[] = new Customer((string) $customer[0], (int) $customer[1]);
            }
        }
    }

    public function getCustomers(): array
    {
        return $this->customers;
    }

    public function save(): void
    {
        $fp = fopen($this->path, 'w');

        foreach ($this->customers as $customer) {
            if($customer){
                $person = (array($customer->getName(), $customer->getBalance()));
                fputcsv($fp, $person, ';');
            }
        }
        fclose($fp);
    }




}