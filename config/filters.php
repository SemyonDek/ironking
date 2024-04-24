<?php

if (isset($_GET['search']) && $_GET['search'] !== '') {
    $search = '%' . $_GET['search'] . '%';
    $searchStr = "AND (`NAME` LIKE '$search')";
} else $searchStr = '';

if (isset($_GET['catId']) && $_GET['catId'] !== '' && !preg_match('/\s/', $_GET['catId'])) {
    $idCatProd = "AND `IDCAT` = '" . $_GET['catId'] . "'";
} else $idCatProd = '';

if (isset($_GET['min_price']) && ($_GET['min_price'] !== '' && !preg_match('/\s/', $_GET['min_price']))) {
    $min_prod_mass = $_GET['min_price'];;
} else {
    $min_prod_mass = 0;
}

if (isset($_GET['max_price']) && ($_GET['max_price'] !== '') && !preg_match('/\s/', $_GET['max_price'])) {
    $max_prod_mass = $_GET['max_price'];
} else {
    $max_prod_mass = 3000000000;
}

if (isset($_GET['model']) && $_GET['model'] !== '' && !preg_match('/\s/', $_GET['model'])) {
    $idModel = "AND `MODEL` = '" . $_GET['model'] . "'";
} else $idModel = '';

if (isset($_GET['group']) && $_GET['group'] !== '' && !preg_match('/\s/', $_GET['group'])) {
    $idGroup = "AND `GROUPPROD` = '" . $_GET['group'] . "'";
} else $idGroup = '';

if (isset($_GET['use']) && $_GET['use'] !== '' && !preg_match('/\s/', $_GET['use'])) {
    $idUse = "AND `USEPROD` = '" . $_GET['use'] . "'";
} else $idUse = '';

$str_color = "AND (";
$i = 0;
foreach ($color as $key => $item_color) {
    if (isset($_GET['color'][$key])) {
        if ($i > 0) {
            $str_color .= " OR COLOR = '" . $item_color . "'";
            $i++;
        } else {
            $str_color .= "COLOR = '" . $item_color . "'";
            $i++;
        }
    }
}
$str_color .= ")";

if ($i == 0) {
    $str_color = "";
}

if (isset($_GET['sort_select']) && $_GET['sort_select'] !== '') {
    if ($_GET['sort_select'] == 0) {
        $sort = 'ORDER BY `PRICE` ASC';
    } else {
        $sort = 'ORDER BY `PRICE` DESC';
    }
} else $sort = '';
