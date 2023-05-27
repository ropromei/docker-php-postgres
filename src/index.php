<?php

require_once 'script/common/Person.php';
require_once 'script/common/Book.php';
require_once 'script/common/common.php';
require_once 'script/common/Repository.php';

$repo = new Repository();

$persons = $repo->getAllPersons();

$books = $repo->getAllBooks();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach ($persons as $person): ?>
        <p><?= $person ?></p>
    <?php endforeach; ?>
    <br>
    <?php foreach ($books as $book): ?>
        <p><?= $book ?></p>
    <?php endforeach; ?>
</body>
</html>
