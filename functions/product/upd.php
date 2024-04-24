<?php
require_once('../../config/connect.php');

$idProd = $_POST['id-prod'];
$catIdProd = $_POST['category-prod'];
$nameProd = $_POST['name-prod'];
$priceProd = $_POST['price-prod'];
$valueProd = $_POST['value-prod'];
$modelProd = $_POST['model-prod'];
$groupProd = $_POST['group-prod'];
$useProd = $_POST['use-prod'];
$colorProd = $_POST['color-prod'];
$descProd = $_POST['desc-prod'];
$charProd = $_POST['char-prod'];

$Photos = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img` WHERE `IDPROD`='$idProd'");
$Photos = mysqli_fetch_all($Photos, MYSQLI_ASSOC);

mysqli_query($ConnectDatabase, "UPDATE `products` SET 
`IDCAT` = '$catIdProd', `NAME` = '$nameProd', `PRICE` = '$priceProd', 
`VALUE` = '$valueProd', `MODEL` = '$modelProd', `GROUPPROD` = '$groupProd', 
`USEPROD` = '$useProd', `COLOR` = '$colorProd', `DESCRIPTION` = '$descProd', 
`DESKCAHR` = '$charProd' WHERE `products`.`ID` = $idProd");

$length = count($Photos);
for ($i = 0; $i < 5; $i++) {
    if ($i < $length) {
        if ($_FILES['file_photo_' . $i + 1]['name'] == '') {
            if ($_POST['FilesDell_' . $i + 1] == 1) {

                $idPhoto = $Photos[$i]['ID'];
                unlink('../../' . $Photos[$i]['SRC']);
                mysqli_query($ConnectDatabase, "DELETE FROM products_img WHERE `products_img`.`ID` = $idPhoto");
            }
        } else {

            $typeFIle = substr($_FILES['file_photo_' . $i + 1]['name'], strrpos($_FILES['file_photo_' . $i + 1]['name'], '.') + 1);
            $urlNewFile = substr($Photos[$i]['SRC'], 0, strrpos($Photos[$i]['SRC'], '.'));
            $urlNewFile = $urlNewFile . '.' . $typeFIle;
            unlink('../../' . $Photos[$i]['SRC']);
            move_uploaded_file($_FILES['file_photo_' . $i + 1]['tmp_name'], '../../' . $urlNewFile);
            $idPhoto = $Photos[$i]['ID'];
            mysqli_query($ConnectDatabase, "UPDATE `products_img` SET `SRC` = '$urlNewFile' WHERE `products_img`.`ID` = '$idPhoto'");
        }
    } else if ($_FILES['file_photo_' . $i + 1]['name'] !== '') {

        $typeFIle = substr($_FILES['file_photo_' . $i + 1]['name'], strrpos($_FILES['file_photo_' . $i + 1]['name'], '.') + 1);

        $prov = True;
        while ($prov) {
            $fileName = uniqid() . '.' . $typeFIle;
            $fileUrl = '../../img/product/' . $fileName;
            $fileUrlDataBase = 'img/product/' . $fileName;

            if (!file_exists($fileUrl)) {
                move_uploaded_file($_FILES['file_photo_' . $i + 1]['tmp_name'], $fileUrl);

                mysqli_query($ConnectDatabase, "INSERT INTO `products_img` (`ID`, `IDPROD`, `SRC`) 
                VALUES (NULL, '$idProd', '$fileUrlDataBase')");

                $prov = False;
            }
        }
    }
}

echo 'Товар изменен';
