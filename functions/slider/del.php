<?php
require_once('../../config/connect.php');

$idSlide = $_POST['idSlide'];
$itemSlide = mysqli_query($ConnectDatabase, "SELECT * FROM `slider` WHERE `ID`='$idSlide'");
$itemSlide = mysqli_fetch_assoc($itemSlide);

unlink('../../' . $itemSlide['SRC']);

mysqli_query($ConnectDatabase, "DELETE FROM slider WHERE `slider`.`ID` = $idSlide");

require_once('../../config/slider.php');
?>
<div id="list-category-block">
    <?php
    addListSliderAdm($SliderList);
    ?>
</div>