<?php

    session_start();

    include 'cart.php';


    if(isset($_GET['id'])) {
        $id = (int) $_GET['id'];

        deleteItem($id);

        header('Location: /list.php');

    }
?>




