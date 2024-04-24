<?php
require_once('../../config/connect.php');

$idSlide = $_POST['id-slider'];
$nameSlide = $_POST['name-slider'];
$catId = $_POST['category-slider'];
$descSlide = $_POST['desc-slider'];

mysqli_query($ConnectDatabase, "UPDATE `slider` SET 
`NAME` = '$nameSlide', `CATID` = '$catId', `DESCRIPTION` = '$descSlide'  WHERE `slider`.`ID` = $idSlide");

$itemSlide = mysqli_query($ConnectDatabase, "SELECT * FROM `slider` WHERE `ID`='$idSlide'");
$itemSlide = mysqli_fetch_assoc($itemSlide);

if ($_FILES['img-slider']['name'] !== '') {
    unlink('../../' . $itemSlide['SRC']);
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
    mysqli_query($ConnectDatabase, "UPDATE `slider` SET 
    `SRC` = '$srcImgSlide'  WHERE `slider`.`ID` = $idSlide");
}
