<?php


require_once 'Database.php';

foreach (glob('../14_10_MONO_CHAT/*.php') as $filename) {
    require_once $filename;
}


session_start();

$people = new UsersCollection('users.csv');
$chat = new ChatCollection('messages.csv');


if (isset($_POST['number'])) {
    $_SESSION['id'] = IdentificationCheck::identifyUser($_POST['number'], $people);;
}

if (isset($_POST['logOut'])) {
    unset($_SESSION['id']);
    unset($_POST['message']);
}

if (isset($_POST['message'])) {
    $chat->saveMessage($_SESSION['id'], $_POST['message']);
}

?>

<html>
<body>
<form action="index.php" method="post">
    <?php if (isset($_SESSION['id'])) : ?>
        <h3>Hello <?= $people->findByName($_SESSION['id']); ?></h3>
        <h4>Look at your chat</h4>
        <?php foreach ($chat->getChat() as $message) : ?>
            <?php if ($_SESSION['id'] == $message['id']) : ?>
                <em><?= $message['id'] . ':' . $message['msg'] . PHP_EOL ?></em><br>
            <?php endif; ?>
        <?php endforeach; ?>
        <p><label for="message">If you are so lonely, write to yourself again!</label></p>
        <p><input type="text" id="message" name="message">
            <button type="submit">Submit</button>
        </p>
        <button type='submit' value="logOut" name="logOut">Log Out</button>
    <?php else : ?>
        <h3>Please log in</h3>
        <label for="pin">Enter your pin</label>
        <input type="number" name="number">
        <button type="submit">Submit</button>
    <?php endif; ?>


</form>
</body>
</html>