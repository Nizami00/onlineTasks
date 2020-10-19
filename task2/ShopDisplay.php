<?php

class ShopDisplay
{
    public static function showProduct(array $products): string
    {
        $productsDisplay = '';
        foreach($products as $product){
            $productsDisplay .= $product->getName();
            $productsDisplay .= ' with price ' . MoneyFormat::convertMoney($product->getPrice());
            $productsDisplay .= ' and quantity of ' . $product->getQuantity();
            $productsDisplay .= PHP_EOL;
        }
        return $productsDisplay;
    }

    public static function checkCustomer(array $customers, string $name): Customer
    {
        $customer = null;
        foreach($customers as $buyer){
            if($buyer->getName() == $name){
                $customer = $buyer;
                break;
            }
        }
        if($customer == null){
            throw new Exception('Not valid');
        }
        return $customer;

    }

    public static function checkProduct(array $products, string $name): Product
    {

        $product = null;
        foreach($products as $grocery){
            if($grocery->getName() == $name){
                $product = $grocery;
            }
        }

        if($product == null){
            throw new Exception('Not valid');
        }
        return $product;
    }



    public static function menu(
        int $input,
        array $products,
        Customer $buyer,
        Shop  $shop
    ): string
    {
        switch ($input) {
            case 1:
                return self::showProduct($products);
            case 2:
                return 'Your balance is ' . MoneyFormat::convertMoney($buyer->getBalance());
            case 3:
                $name = (string) readline('Which product you want to buy? ');
                try {
                    $product = self::checkProduct($products, $name);
                } catch (Exception $e) {
                    return 'There is no such product';
                }
                if($shop->buyProduct($product, $buyer)){
                    return 'Successful buy!';
                }else{
                    return 'Not enough money on balance!';
                }
            case 4:
                return $shop->loadCustomersProduct($buyer);
            case 5:
                exit('Pew');
            default:
                return 'There is no such option';
        }
    }
}