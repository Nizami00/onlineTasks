<?php
require_once 'Safe.php';

session_start();

$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9];
$safe = new Safe(1111);

if (isset($_POST['number'])) {
    $_SESSION['number'] .= $_POST['number'];
}

$pin = $_SESSION['number'] ?? '';

if (strlen($pin) == 4){
    $_SESSION['number'] = '';
    $pin == $safe->getPin() ? $safe->isLocked(false) : $safe->isLocked(true);
}


$count = 0;

?>

<html>
<body>
<form action="/" method="post">
    <?php if (strlen($pin) === 4) : ?>
        <h1><?= $pin == $safe->getPin() ? 'Unlocked' : 'Locked'; ?> </h1>
    <?php endif; ?>
    <h2><?= str_repeat('X', strlen($pin)); ?></h2>
    <?php foreach ($numbers as $number): ?>
        <?php if ($count % 3 == 0): ?>
            <br>
        <?php endif; ?>
        <?php $count++; ?>
        <label for="number"></label>
        <button type="submit" id="number" name="number" value="<?= $number ?>"> <?= $number ?> </button>
    <?php endforeach; ?>
</form>
</body>
</html>
