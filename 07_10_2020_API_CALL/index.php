<html>
<body>
<form action="/index.php" method="post">
    <label for="name">Your name:</label><br>
    <input type="text" id="name" name="name"/><br>
    <label for="surname">Your surname:</label><br>
    <input type="text" id="surname" name="surname"/><br>
    <label for="code">Your personal code:</label><br>
    <input type="text" id="code" name="code"/><br>
    <label for="address">Your address</label><br>
    <input type="text" id="address" name="address"/><br>
    <button type="submit">Submit</button>
</form>
</body>
</html>

<?php
require_once 'Storage.php';
require_once 'Person.php';


$storage = new Storage('users.csv');

$storage->loadUsers();
$storage->setUser();
$storage->saveUsers();

?>

<html>
<body>
<h1>Find a person</h1>
<form action="index.php" method="post">
    <label for="findPerson">Enter personal code</label><br>
    <input type="text" id="findPerson" name="findPerson"/><br>
    <?php echo $storage->getUser(); ?>
    <button type="submit">Submit</button>
</form>
</body>
</html>
