<?php
require_once('../../config/connect.php');
$id = $_POST['id'];
$status = $_POST['status'];
mysqli_query($ConnectDatabase, "UPDATE `orders` SET `STATUS` = '$status' WHERE `orders`.`ID` = $id");
