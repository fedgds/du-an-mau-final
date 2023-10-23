<?php
session_start();
if (isset($_GET['index']) && is_numeric($_GET['index'])) {
    $index = (int)$_GET['index'];
    if (isset($_SESSION['cart'][$index])) {
        unset($_SESSION['cart'][$index]);
    }
}
header('Location: ../index.php?act=cart');
?>