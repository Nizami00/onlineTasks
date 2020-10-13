<?php
require_once 'collection/DatabaseInterface.php';
require_once 'collection/PhotosCollection.php';
require_once 'Photo.php';

$photosDatabase = new PhotosCollection('collection/photoCollection.csv');

if(isset($_POST['like'])){
    $photo = $photosDatabase->findPhotoByID($_POST['like']);
    $photo->setLikes(1);
}
if(isset($_POST['dislike'])){
    $photo = $photosDatabase->findPhotoByID($_POST['dislike']);
    $photo->setLikes(-1);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>MEMES</title>
</head>
<body>
<header>
    <img src="src/logo.png"><br>
</header>
    <?php foreach ($photosDatabase->getPhotos() as $photo) : ?>
<div class="gallery">
        <a target="_blank" href="<?= $photo->getSource(); ?>">
            <img src="<?= $photo->getSource();?>" alt=""><br>
        </a></div><br>
    <form action="index.php" method="post">
        <div class="desc">
            <h3>Likes: <?= $photo->getLikes() ; ?></h3>
            <button type="submit" id="like" name="like" value="<?= $photo->getID(); ?>">
                <img src="src/like.png" alt="">
            </button>
            <button type="submit" id="dislike" name="dislike" value="<?= $photo->getID(); ?>">
                <img src="src/dislike.png" alt="">
            </button>
        </div>
    </form>
    <?php endforeach; ?>
</body>
</html>