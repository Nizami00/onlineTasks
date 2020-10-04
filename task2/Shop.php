<?php

class Shop
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function buyProduct(Product $product, Customer $customer): bool
    {

        if($product->getQuantity() > 0 && $customer->getBalance() - $product->getPrice() >=0){
            $product->setQuantity(1);
            $customer->makeABuy($product->getPrice());
            self::saveCustomersProducts($product, $customer);
            return true;
        }else{
            return false;
        }
    }



    public function saveCustomersProducts(Product $product, Customer $customer): void
    {
        $csv = '';
        $grocery = $product->getName() . ';' . 1;
        $grocery = explode(';', $grocery);
        $customer->setProducts($grocery);
        foreach($customer->getProducts() as $product){
            $csv .= $product[0] . ';' . $product[1] . PHP_EOL;
        }

        $csv_handler = fopen('customers/customer_products/'.$customer->getName(). '.csv', 'a');
        fwrite ($csv_handler, $csv);
        fclose ($csv_handler);
    }

    public function loadCustomersProduct(Customer $customer): string
    {
        $database = file_get_contents('customers/customer_products/' . $customer->getName(). '.csv');
        $products = explode(PHP_EOL, $database);
        $showProduct = '';

        foreach ($products as $product) {
            if($product){

                $showProduct .= (string) implode(' ', explode(';', $product)) . PHP_EOL;
            }
        }

        return $showProduct;
    }

}