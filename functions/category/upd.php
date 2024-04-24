<?php
require_once('../../config/connect.php');

$idCat = $_POST['id-category'];
$nameCat = $_POST['name-category'];
$descCat = $_POST['desc-category'];

mysqli_query($ConnectDatabase, "UPDATE `category` SET 
`NAME` = '$nameCat', `DESK` = '$descCat'  WHERE `category`.`ID` = $idCat");

$itemCat = mysqli_query($ConnectDatabase, "SELECT * FROM `category` WHERE `ID`='$idCat'");
$itemCat = mysqli_fetch_assoc($itemCat);

if ($_FILES['min-img-category']['name'] !== '') {
    unlink('../../' . $itemCat['SMALLIMG']);
    $minimgCat = $_FILES['min-img-category'];
    $srcMinImgCat = '';
    $typeFIle = substr($minimgCat['name'], strrpos($minimgCat['name'], '.') + 1);
    $prov = True;
    while ($prov) {
        $fileName = uniqid() . '.' . $typeFIle;
        $fileUrl = '../../img/category/catalog/' . $fileName;
        $srcMinImgCat = 'img/category/catalog/' . $fileName;

        if (!file_exists($fileUrl)) {
            move_uploaded_file($minimgCat['tmp_name'], $fileUrl);

            $prov = False;
        }
    }
    mysqli_query($ConnectDatabase, "UPDATE `category` SET 
    `SMALLIMG` = '$srcMinImgCat'  WHERE `category`.`ID` = $idCat");
}

if ($_FILES['max-img-category']['name'] !== '') {
    unlink('../../' . $itemCat['BIGIMG']);
    $maximgCat = $_FILES['max-img-category'];
    $srcMaxImgCat = '';
    $typeFIle = substr($maximgCat['name'], strrpos($maximgCat['name'], '.') + 1);
    $prov = True;
    while ($prov) {
        $fileName = uniqid() . '.' . $typeFIle;
        $fileUrl = '../../img/category/category-list/' . $fileName;
        $srcMaxImgCat = 'img/category/category-list/' . $fileName;

        if (!file_exists($fileUrl)) {
            move_uploaded_file($maximgCat['tmp_name'], $fileUrl);

            $prov = False;
        }
    }
    mysqli_query($ConnectDatabase, "UPDATE `category` SET 
    `BIGIMG` = '$srcMaxImgCat'  WHERE `category`.`ID` = $idCat");
}

$itemCat = mysqli_query($ConnectDatabase, "SELECT * FROM `category` WHERE `ID`='$idCat'");
$itemCat = mysqli_fetch_assoc($itemCat);

?>

<input type="text" value="../<?= $itemCat['SMALLIMG'] ?>" id="min-cat-img">
<input type="text" value="../<?= $itemCat['BIGIMG'] ?>" id="max-cat-img">