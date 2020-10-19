<?php
require_once 'PhoneNumberCollection.php';
require_once 'Person.php';
$numbers = new PhoneNumberCollection('phone_numbers.csv');

if (isset($_POST['number'])) {
    $person = $numbers->findNumber($_POST['number']);
}

?>


<html>
<body>
<form action="index.php" method="post">
    <h1>Enter phone number</h1><br>
    <?php if (isset($_POST['number'])) : ?>
        <?php if ($person) : ?>
            <h3><?= $person->getName() . ' ' . $person->getSurname() . ' and his number is '; ?></h3>
            <h3><?= $person->getNumber(); ?></h3>
        <?php else : ?>
            <h3><?= 'There is no such number'; ?></h3>
        <?php endif; ?>
    <?php endif; ?>
    <label for="number">Search</label>
    <input type="number" id="number" name="number"/>
    <button type="submit">Submit</button>
</form>
</body>
</html>
