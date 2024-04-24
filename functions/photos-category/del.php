<?php
require_once('../../config/connect.php');

$idPhotoCat = $_POST['idPhotoCat'];
$itemPhotoCat = mysqli_query($ConnectDatabase, "SELECT * FROM `category_img` WHERE `ID`='$idPhotoCat'");
$itemPhotoCat = mysqli_fetch_assoc($itemPhotoCat);
unlink('../../' . $itemPhotoCat['SRC']);

mysqli_query($ConnectDatabase, "DELETE FROM category_img WHERE `category_img`.`ID` = $idPhotoCat");

require_once('../../config/photos-category.php');
?>

<div id="list-category-block">
    <?php
    addListPhotosCategoryAdm($PhotosCategoryList, $CategoryList);
    ?>
</div>