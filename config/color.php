<?php
$TableProdAll = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
$TableProdAll = mysqli_fetch_all($TableProdAll, MYSQLI_ASSOC);

$color = [];
$prov = true;

foreach ($TableProdAll as $item) {
    foreach ($color as $item_color) {
        if ($item['COLOR'] == $item_color) {
            $prov = false;
            break;
        }
    }
    if ($prov) {
        $color[] = $item['COLOR'];
    }
    $prov = true;
}
