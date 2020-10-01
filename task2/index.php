<?php


require_once 'Storage.php';
require_once 'Product.php';

$storage = new Storage();
$storage->add(new Product('RedBull', 5.00));
$storage->add(new Product('MonsterEnergy', 4.00));


foreach ($storage->all() as $product)
{
    /** @var Product $product */
    echo $product->getName() . ' price is ' . $product->getPrice();
    echo ' and quantity ' . $product->getQuantity() . PHP_EOL;
}

echo 'What you would like to buy? Enter name of listed products' . PHP_EOL;
$choiceOFProduct = (string) readline('>> ');

foreach ($storage->all() as $product)
{
    /** @var Product $product */
    if($product->getName() == $choiceOFProduct){
        $product->setQuantity(1);
    }
}