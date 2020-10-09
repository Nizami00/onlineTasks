<?php
require_once 'TODO.php';
require_once 'Lists.php';

$todo = $_POST['addTODO'] ?? null;
$erase = $_POST['erase'] ?? null;

if($erase){
    header("Refresh:0");
}

$todos = new Lists('list.csv');

$todos->setTodo($todo);
$todos->saveSchedule($erase);


?>

<hmtl>
    <body>
    <form action="index.php" method="post">
        <label for="addTODO">Add to schedule</label>
        <input type="text" id="addTODO" name="addTODO"/>
        <button type="submit">Submit</button><br>
<!--    </form>-->
<!--    <form action="index.php" method="post">-->
        <br>
        <?php foreach ($todos->getSchedule() as $todo): ?>
            <?php if (is_object($todo)) : ?>
                <li>
                    <label for="erase"><?= $todo->getName(); ?></label>
                    <button type="submit" id="erase" name="erase" value="<?= $todo->getID(); ?>">[X]</button>
                </li>
            <?php else: ?>
                <p><?= $todo; ?></p>
            <?php endif; ?>
        <?php endforeach; ?>

    </form>
    </body>
</hmtl>







