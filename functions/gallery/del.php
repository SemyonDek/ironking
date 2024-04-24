<?php
require_once('../../config/connect.php');

$idGallery = $_POST['idGallery'];
$itemGallery = mysqli_query($ConnectDatabase, "SELECT * FROM `gallery` WHERE `ID`='$idGallery'");
$itemGallery = mysqli_fetch_assoc($itemGallery);
unlink('../../' . $itemGallery['SRC']);

mysqli_query($ConnectDatabase, "DELETE FROM gallery WHERE `gallery`.`ID` = $idGallery");

require_once('../../config/gallery.php');
?>

<div id="list-category-block">
    <?php
    addListGalleryAdm($SliderList);
    ?>
</div>