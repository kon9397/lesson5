<?php

session_start();

include 'cart.php';



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

    <?php

          if(isset($_POST['products']) && isset($_POST['quantity'])) {
              foreach($products as $product) {
                  if($product['name'] === $_POST['products']) {
                      addItems($product['name'], (int) $_POST['quantity'], $product['price']);
                  }
              }
          }
    ?>
    <form method="POST">
        <select name="products" id="products">
            <?php foreach ($products as $product): ?>
                <option><?= $product['name']?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="quantity" value="1">
        <button type="submit">Добавить в корзину</button>

    </form>
    <a href="list.php">Перейти в корзину</a>

</body>
</html>
