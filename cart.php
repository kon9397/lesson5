<?php
session_start();

$products = [

    2=>['name'=>'морковка', 'price'=>233],

    7=>['name'=>'капуста', 'price'=>333],

    43=>['name'=>'помидоры', 'price'=>332],

];

if(isset($_SESSION['cart'])) {
    $id = $_SESSION['cart']['items'][count($_SESSION['cart']['items'])-1]['id']+1;
} else {
    $id = 1;
}



//Вспомощающая функция, которая пересчитывает сумму всех товаров
function getSum() {
    $sum = 0;

//    for($i = 0; $i < count($_SESSION['cart']['items']); $i++) {
//        $sum += $_SESSION['cart']['items'][$i]['quantity'] * $_SESSION['cart']['items'][$i]['price'];
//    }

    foreach ($_SESSION['cart']['items'] as $key=>$item) {
        $sum += $_SESSION['cart']['items'][$key]['quantity'] * $_SESSION['cart']['items'][$key]['price'];
    }

    $_SESSION['cart']['sum'] = $sum;

    getDiscount();
}

function addItems($name, $quantity, $price) {
    global $id;

    if(isset($_SESSION['cart'])) {
        for ($i = 0; $i < count($_SESSION['cart']['items']); $i++) {
            if($_SESSION['cart']['items'][$i]['name'] === $name) {
                $_SESSION['cart']['items'][$i]['quantity'] += $quantity;
                $_SESSION['cart']['items'][$i]['sum'] = $quantity * $_SESSION['cart']['items'][$i]['price'];
                getSum();
                return ;
            }
        }
    }


    $_SESSION['cart']['items'][] = [
        'id'=>$id++,
        'name'=>$name,
        'quantity'=>$quantity,
        'price'=>$price,
        'sum'=>$price * $quantity
    ];

    getSum();

}

function deleteItem($id) {


    foreach ($_SESSION['cart']['items'] as $key=>$item) {
        if($item['id'] === $id) {
            unset($_SESSION['cart']['items'][$key]);
        }
    }

    getSum();


}

function setQuantity($id, $quantity) {

    foreach ($_SESSION['cart']['items'] as $key=>$item) {
        if($item['id'] === $id) {
            $_SESSION['cart']['items'][$key]['quantity'] = $quantity;
            $_SESSION['cart']['items'][$key]['sum'] = $quantity * $_SESSION['cart']['items'][$key]['price'];
        }
    }

    getSum();

}

function getDiscount() {
    $quantity = 0;

    for($i = 0; $i < count($_SESSION['cart']['items']); $i++) {
        $quantity += $_SESSION['cart']['items'][$i]['quantity'];
    }

    if($_SESSION['cart']['sum'] > 2000) {
        $_SESSION['cart']['sum'] = $_SESSION['cart']['sum'] - ($_SESSION['cart']['sum'] * 7 / 100);
    }

    if($quantity > 10) {
        $_SESSION['cart']['sum'] = $_SESSION['cart']['sum'] - ($_SESSION['cart']['sum'] * 10 / 100);
    }

}





