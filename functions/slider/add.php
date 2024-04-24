<?php
require_once('../../config/connect.php');

$nameSlide = $_POST['name-slider'];
$catId = $_POST['category-slider'];
$descSlide = $_POST['desc-slider'];

$imgSlide = $_FILES['img-slider'];
$srcImgSlide = '';

$typeFIle = substr($imgSlide['name'], strrpos($imgSlide['name'], '.') + 1);

$prov = True;
while ($prov) {
    $fileName = uniqid() . '.' . $typeFIle;
    $fileUrl = '../../img/slider/' . $fileName;
    $srcImgSlide = 'img/slider/' . $fileName;

    if (!file_exists($fileUrl)) {
        move_uploaded_file($imgSlide['tmp_name'], $fileUrl);

        $prov = False;
    }
}

mysqli_query($ConnectDatabase, "INSERT INTO `slider` 
(`ID`, `NAME`, `CATID`, `DESCRIPTION`, `SRC`) VALUES 
(NULL, '$nameSlide', '$catId', '$descSlide', '$srcImgSlide')");

echo 'Слайд добавлен';
