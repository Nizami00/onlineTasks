<?php
require_once 'PeopleCollection.php';
require_once 'Person.php';

session_start();

$people = new PeopleCollection('people.csv');
if(isset($_POST['number'])){
    $person = $people->checkID($_POST['number']);
    if($person){
        $_SESSION['id'] = $person->getID();

    }
}

?>

<html>
<body>
<form action="index.php" method="post">
    <label for="pin">Enter your pin</label>
    <input type="number" name="number">
    <button type="submit">Submit</button>
</form>
</body>
</html>
