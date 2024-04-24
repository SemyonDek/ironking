<?php
session_start();
require_once('../../config/connect.php');

$value = $_SESSION['countBasket'];
$amountOrder = $_SESSION['basketSum'];
$amountOrderSale = $amountOrder;
$bonus = $_POST['bonus'];

$name = $_POST['name-client'];
$mail = $_POST['mail-client'];
$number = $_POST['number-client'];
$address = $_POST['addres-client'];
$comm = $_POST['comm-client'];

if (isset($_SESSION['accountId'])) {
    $idAccount = $_SESSION['accountId'];
    if (!$_POST['pay']) {
        $bonus = 0;
    }
} else {
    $bonus = 0;
    $idAccount = 0;
}
$amountOrderSale -= $bonus;

mysqli_query($ConnectDatabase, "INSERT INTO `orders` 
    (`ID`, `IDUSER`, `STATUS`, `VALUE`, `FULLAMOUNT`, `BONUS`, `SALEAMOUNT`, `NAME`, `MAIL`, `NUMBER`, `ADDRESS`, `COMM`) VALUES 
    (NULL, '$idAccount', 1, '$value', '$amountOrder', '$bonus', '$amountOrderSale', '$name', '$mail', '$number', '$address', '$comm')");

$idOrder = mysqli_query($ConnectDatabase, "SELECT MAX(id) FROM `orders`");
$idOrder = mysqli_fetch_all($idOrder);
$idOrder = $idOrder[0][0];

foreach ($_SESSION['basket'] as $item) {
    $idProd = $item['ID'];
    $value = $item['VALUE'];
    $price = $item['PRICE'];
    $amount = $item['AMOUNT'];


    $itemProd = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE `ID`='$idProd'");
    $itemProd = mysqli_fetch_assoc($itemProd);
    $valueProd = $itemProd['VALUE'];
    $valueProd -= $value;

    mysqli_query($ConnectDatabase, "UPDATE `products` SET `VALUE` = '$valueProd' WHERE `products`.`ID` = $idProd");
    mysqli_query($ConnectDatabase, "INSERT INTO `order_item` 
        (`IDORDER`, `IDPROD`, `PRICE`, `VALUE`, `AMOUNT`) VALUES 
        ('$idOrder', '$idProd', '$price', '$value', '$amount')");
}

if (isset($idAccount)) {
    $usersData = mysqli_query($ConnectDatabase, "SELECT * FROM `users` WHERE ID = '$idAccount'");
    $usersData = mysqli_fetch_assoc($usersData);
    $bonususer = $usersData['BONUS'];
    if ($_POST['pay']) {
        $bonususer -= $bonus;
    } else {
        $bonususer += (int)substr($_SESSION['basketSum'], 0, -2);
    }
    mysqli_query($ConnectDatabase, "UPDATE `users` SET `BONUS` = '$bonususer' WHERE `users`.`ID` = $idAccount");
}

$_SESSION['basket'] = [];
$_SESSION['basketSum'] = 0;
$_SESSION['countBasket'] = 0;

echo 'Заказ оформлен';
