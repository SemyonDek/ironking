<?php
require_once('../../config/connect.php');

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

mysqli_query($ConnectDatabase, "INSERT INTO `products` 
(`ID`, `IDCAT`, `NAME`, 
`PRICE`, `VALUE`, `MODEL`, 
`GROUPPROD`, `USEPROD`, `COLOR`, 
`DESCRIPTION`, `DESKCAHR`) VALUES 
(NULL, '$catIdProd', '$nameProd', 
'$priceProd', '$valueProd', '$modelProd', 
'$groupProd', '$useProd', '$colorProd', 
'$descProd', '$charProd')");

$idProd = mysqli_query($ConnectDatabase, "SELECT MAX(id) FROM `products`");
$idProd = mysqli_fetch_all($idProd);
$idProd = $idProd[0][0];

foreach ($_FILES as $key => $item) {
    if ($item['name'] !== '') {
        $typeFIle = substr($item['name'], strrpos($item['name'], '.') + 1);

        $prov = True;
        while ($prov) {
            $fileName = uniqid() . '.' . $typeFIle;
            $fileUrl = '../../img/product/' . $fileName;
            $fileUrlDataBase = 'img/product/' . $fileName;

            if (!file_exists($fileUrl)) {
                move_uploaded_file($item['tmp_name'], $fileUrl);

                mysqli_query($ConnectDatabase, "INSERT INTO `products_img` (`ID`, `IDPROD`, `SRC`) 
                    VALUES (NULL, '$idProd', '$fileUrlDataBase')");

                $prov = False;
            }
        }
    }
}

echo 'Товар добавлен';
