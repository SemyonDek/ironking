<?php
require_once('../../config/connect.php');

$nameCat = $_POST['name-category'];
$descCat = $_POST['desc-category'];
$minimgCat = $_FILES['min-img-category'];
$maximgCat = $_FILES['max-img-category'];
$srcMinImgCat = '';
$srcMaxImgCat = '';

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

mysqli_query($ConnectDatabase, "INSERT INTO `category` 
(`ID`, `NAME`, `DESK`, `BIGIMG`, `SMALLIMG`) VALUES 
(NULL, '$nameCat', '$descCat', '$srcMaxImgCat', '$srcMinImgCat')");

echo 'Категория добавлена';
