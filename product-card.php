<?php
require_once('config/connect.php');
$idProd = $_GET['idProd'];
$itemProd = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE `ID`='$idProd'");
$itemProd = mysqli_fetch_assoc($itemProd);
$PhotosProd = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img` WHERE `IDPROD`='$idProd'");
$PhotosProd = mysqli_fetch_all($PhotosProd, MYSQLI_ASSOC);
$idCat = $itemProd['IDCAT'];
$itemCat = mysqli_query($ConnectDatabase, "SELECT * FROM `category` WHERE `ID`='$idCat'");
$itemCat = mysqli_fetch_assoc($itemCat);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Карточка товара</title>
    <link rel="stylesheet" href="css/product-card.css">
</head>

<body>
    <div id="page">
        <?php
        require_once('header.php');
        ?>
        <div id="crumbs">
            <div class="inner">
                <a href="index.php" class="link-crumbs-active">Главная</a>
                <a href="catalog.php" class="link-crumbs-active">Каталог</a>
                <a href="catalog-product.php?catId=<?= $idCat ?>" class="link-crumbs-active"><?= $itemCat['NAME'] ?></a>
                <p class="link-crumbs"><?= $itemProd['NAME'] ?></p>
            </div>
        </div>
        <div id="product-card-block">
            <div class="inner">
                <div id="product-card-block-main">
                    <div class="top-prod-block">
                        <div class="line-prod-img" id="line-prod-img-block">
                            <?php
                            foreach ($PhotosProd as $item) {
                            ?>
                                <div class="div-line-prod-img-item">
                                    <img src="<?= $item['SRC'] ?>" alt="" class="line-prod-img-item">
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="main-prod-img">
                            <img src="<?= $PhotosProd[0]['SRC'] ?>" alt="" id="main-img-prod">
                        </div>
                        <div class="main-prod-text">
                            <div class="title-name-prod">
                                <?= $itemProd['NAME'] ?>
                            </div>
                            <div class="price-line-prod">
                                <div class="price-prod">
                                    <?= number_format($itemProd['PRICE'], 0, '.', ' ') . ' ' ?> руб.
                                </div>
                                <div class="count-prod">
                                    <p class="count-text">в наличии <?= $itemProd['VALUE'] ?> шт.</p>
                                </div>
                            </div>
                            <div class="value-prod-block">
                                <div class="input-value-block">
                                    <p class="input-value-text">Кол-во</p>
                                    <input id="value-prod" class="input-value-input" type="number" max="<?= $itemProd['VALUE'] ?>" value="1" onkeypress='validate(event)'>
                                </div>
                            </div>
                            <div class="add-basket-block">
                                <?php
                                if ($itemProd['VALUE'] !== '0') {
                                ?>
                                    <button class="add-basket-button" type="button" onclick="addBasket(<?= $itemProd['ID'] ?>)">
                                        В корзину
                                        <span class="icon-add-basket"></span>
                                    </button>

                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="bottom-prod-block">
                        <div class="tab-button-block">
                            <div id="button-info" class="tab-button-active">
                                Описание
                            </div>
                            <div id="button-char">
                                Основные характеристики
                            </div>
                        </div>
                        <div class="tab-block">
                            <div id="block-info" class="tab-block-active"><?= nl2br($itemProd['DESCRIPTION']) ?></div>
                            <div id="block-char">
                                Модель: <?= $itemProd['MODEL'] ?>
                                <br>
                                Групы мышц: <?php
                                            if ($itemProd['GROUPPROD'] == 1) echo 'Все';
                                            elseif ($itemProd['GROUPPROD'] == 2) echo 'Для мышц груди';
                                            elseif ($itemProd['GROUPPROD'] == 3) echo 'Для мышц ног';
                                            elseif ($itemProd['GROUPPROD'] == 4) echo 'Для мышц пресса';
                                            elseif ($itemProd['GROUPPROD'] == 5) echo 'Для мышц рук';
                                            elseif ($itemProd['GROUPPROD'] == 6) echo 'Для мышц спины';
                                            elseif ($itemProd['GROUPPROD'] == 7) echo 'Кардио';
                                            ?>
                                <br>
                                Целевое использование: <?php
                                                        if ($itemProd['USEPROD'] == 1) echo 'Для восстановления здоровья';
                                                        elseif ($itemProd['USEPROD'] == 2) echo 'Для домашней физкультуры';
                                                        elseif ($itemProd['USEPROD'] == 3) echo 'Для тренажерного зала';
                                                        elseif ($itemProd['USEPROD'] == 4) echo 'Для улицы';
                                                        ?>
                                <br>
                                Цвет: <?= $itemProd['COLOR'] ?>
                                <br>
                                <br>
                                <?= nl2br($itemProd['DESKCAHR']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require_once('footer.php');
        ?>
    </div>
</body>

<script src="script/swipe-img-prod.js"></script>
<script src="script/tab-product.js"></script>
<script src="script/value-prod.js"></script>
<script src="script/basket.js"></script>

</html>