<?php
    session_start();

    include 'cart.php';

    if($_POST['submit']) {

        $currentId = (int) $_POST['submit'];
        $newQuantity = (int) $_POST['quantity'];

        setQuantity($currentId, $newQuantity);

        header('Location: /list.php');

    }





?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Интернет магазин элитных овощей</title>
</head>
<body>
    <h2>Ваша корзина</h2>
    <table>
        <tr>
            <th>Название товара</th>
            <th>Количество</th>
            <th>Сумма</th>
        </tr>
        <?php if(count($_SESSION['cart']['items']) > 0): ?>
        <?php foreach ($_SESSION['cart']['items'] as $cart): ?>
        <tr>
            <td><?= $cart['name'] ?></td>
            <td>
                <form method="post">
                    <input name="quantity" type="number" value="<?= $cart['quantity'] ?>"><br>
                    <button name="submit" value="<?= $cart['id']?>" type="submit">Поменять кол-во</button>
                </form>
            </td>
            <td><?= $cart['sum'] ?></td>
            <td><a href="delete.php?id=<?= $cart['id'] ?>">Удалить</a></td>
        </tr>



        <?php endforeach; ?>
    </table>
        <h3>Cумма товара: <?= $_SESSION['cart']['sum'] ?></h3>
        <p>Скидка предоставляется только если количество товара больше 20 единиц или сумма товара больше 2000 грн.</p>
        <?php else:?>
    </table>
    <h3>Товара нет</h3>
    <a href="add.php">Добавить</a>
        <?php endif; ?>



</body>
</html>
