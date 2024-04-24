<?php
session_start();
require_once('../../config/connect.php');
$name = $_POST['nameUser'];
$mail = $_POST['mailUser'];
$number = $_POST['numberUser'];
$address = $_POST['addressUser'];

$idUser = $_SESSION['accountId'];

mysqli_query($ConnectDatabase, "UPDATE `users` SET `NAME` = '$name', `MAIL` = '$mail', `NUMBER` = '$number', `ADDRESS` = '$address' WHERE `users`.`ID` = $idUser");

echo 'Данные изменены';
