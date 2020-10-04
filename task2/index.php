<?php

require_once 'DataInterface.php';
require_once 'Shop.php';
require_once 'MoneyFormat.php';
require_once 'ShopDisplay.php';
require_once 'products/Storage.php';
require_once 'products/Product.php';
require_once 'customers/Customer.php';
require_once 'customers/CustomersDB.php';


$shop = new Shop('Narvesen');
$storage = new Storage('products/ProductsFile.csv');
$customerDB = new CustomersDB('customers/CostumersDatabase.csv');
$customerDB->load();
$storage->load();

echo 'Welcome to the store!' . PHP_EOL;

$name = (string) readline('Please enter your name: ');


try {
    $customer  = ShopDisplay::checkCustomer($customerDB->getCustomers(), $name);
} catch (Exception $e) {
    echo 'You are imposter!';
    exit();
}


while(true){
    echo PHP_EOL;
    echo 'Would you like to have see available product? press 1' . PHP_EOL;
    echo 'Show your balance. press 2' . PHP_EOL;
    echo 'Buy product. press 3' . PHP_EOL;
    echo 'Show your products. press 4' . PHP_EOL;
    echo 'Exit. press 5' . PHP_EOL;
    do {
        $input = (int) readline('Press number from 1 to 5:');
    } while ($input < 1 || $input > 6);
    echo ShopDisplay::menu($input, $storage->all(), $customer, $shop);
    $customerDB->save();
    $storage->save();
    echo PHP_EOL;

}



