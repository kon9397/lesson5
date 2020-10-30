<?php

session_start();

include 'cart.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ваш товар удален</title>
</head>
<body>
    <?php



    if(isset($_GET['id'])) {
        $id = (int) $_GET['id'];

        deleteItem($id);
        echo '<h1>Товар удален!</h1>';
        echo '<a href="list.php">Назад</a>';

    }
    ?>
</body>
</html>





