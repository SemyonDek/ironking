<?php
require_once('../../config/connect.php');

$idCat = $_POST['idCat'];
$itemCat = mysqli_query($ConnectDatabase, "SELECT * FROM `category` WHERE `ID`='$idCat'");
$itemCat = mysqli_fetch_assoc($itemCat);

unlink('../../' . $itemCat['SMALLIMG']);
unlink('../../' . $itemCat['BIGIMG']);

mysqli_query($ConnectDatabase, "DELETE FROM category WHERE `category`.`ID` = $idCat");

require_once('../../config/category.php');
?>
<div id="list-category-block">
    <?php
    addListCategoryAdm($CategoryList);
    ?>
</div>