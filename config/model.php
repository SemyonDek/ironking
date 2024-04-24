<?php
$TableProdAll = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
$TableProdAll = mysqli_fetch_all($TableProdAll, MYSQLI_ASSOC);

$model = [];
$prov = true;

foreach ($TableProdAll as $item) {
    foreach ($model as $item_model) {
        if ($item['MODEL'] == $item_model) {
            $prov = false;
            break;
        }
    }
    if ($prov) {
        $model[] = $item['MODEL'];
    }
    $prov = true;
}
