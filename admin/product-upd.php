<?php
require_once('../config/category.php');
$idProd = $_GET['idProd'];
$itemProd = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE `ID`='$idProd'");
$itemProd = mysqli_fetch_assoc($itemProd);
$PhotosProd = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img` WHERE `IDPROD`='$idProd'");
$PhotosProd = mysqli_fetch_all($PhotosProd, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ</title>
    <link rel="stylesheet" href="../css/catalog.css">
    <link rel="stylesheet" href="../css/catalog-admin.css">
    <link rel="stylesheet" href="../css/catalog-admin-add.css">
    <link rel="stylesheet" href="../css/product-add.css">
</head>

<body>
    <div id="page">
        <?php
        require_once('header.php');
        ?>
        <div id="crumbs"></div>
        <div id="add-main-blok">
            <div class="inner">
                <div class="title-category">
                    Изменить товар
                </div>
                <form action="" id="addProdForm">
                    <input type="hidden" id="id-prod" name="id-prod" value="<?= $idProd ?>">
                    <div class="left-block-product-add">
                        <div class="line-input-add">
                            <div class="name-input-add">
                                Категория
                            </div>
                            <select class="add-input" name="category-prod" id="category-prod">
                                <option value=""></option>
                                <?php
                                addOptionCategory($CategoryList, $itemProd['IDCAT']);
                                ?>
                            </select>
                        </div>
                        <div class="line-input-add">
                            <div class="name-input-add">
                                Название
                            </div>
                            <input value="<?= $itemProd['NAME'] ?>" type="text" class="add-input" id="name-prod" name="name-prod">
                        </div>
                        <div class="line-input-add">
                            <div class="name-input-add">
                                Цена
                            </div>
                            <input value="<?= $itemProd['PRICE'] ?>" type="number" class="add-input" id="price-prod" name="price-prod">
                        </div>
                        <div class="line-input-add">
                            <div class="name-input-add">
                                Кол-во товаров
                            </div>
                            <input value="<?= $itemProd['VALUE'] ?>" type="number" class="add-input" id="value-prod" name="value-prod">
                        </div>
                        <div class="line-input-add">
                            <div class="name-input-add">
                                Модель
                            </div>
                            <input value="<?= $itemProd['MODEL'] ?>" type="text" class="add-input" id="model-prod" name="model-prod">
                        </div>
                        <div class="line-input-add">
                            <div class="name-input-add">
                                Группа мышц
                            </div>
                            <select class="add-input" name="group-prod" id="group-prod">
                                <option value=""></option>
                                <option value="1" <?php if ($itemProd['GROUPPROD'] == 1) echo 'selected="selected"' ?>>Все</option>
                                <option value="2" <?php if ($itemProd['GROUPPROD'] == 2) echo 'selected="selected"' ?>>Для мышц груди</option>
                                <option value="3" <?php if ($itemProd['GROUPPROD'] == 3) echo 'selected="selected"' ?>>Для мышц ног</option>
                                <option value="4" <?php if ($itemProd['GROUPPROD'] == 4) echo 'selected="selected"' ?>>Для мышц пресса</option>
                                <option value="5" <?php if ($itemProd['GROUPPROD'] == 5) echo 'selected="selected"' ?>>Для мышц рук</option>
                                <option value="6" <?php if ($itemProd['GROUPPROD'] == 6) echo 'selected="selected"' ?>>Для мышц спины</option>
                                <option value="7" <?php if ($itemProd['GROUPPROD'] == 7) echo 'selected="selected"' ?>>Кардио</option>
                            </select>
                        </div>
                        <div class="line-input-add">
                            <div class="name-input-add">
                                Целевое назначение
                            </div>
                            <select class="add-input" name="use-prod" id="use-prod">
                                <option value=""></option>
                                <option value="1" <?php if ($itemProd['USEPROD'] == 1) echo 'selected="selected"' ?>>Для восстановления здоровья</option>
                                <option value="2" <?php if ($itemProd['USEPROD'] == 2) echo 'selected="selected"' ?>>Для домашней физкультуры</option>
                                <option value="3" <?php if ($itemProd['USEPROD'] == 3) echo 'selected="selected"' ?>>Для тренажерного зала</option>
                                <option value="4" <?php if ($itemProd['USEPROD'] == 4) echo 'selected="selected"' ?>>Для улицы</option>
                            </select>
                        </div>
                        <div class="line-input-add">
                            <div class="name-input-add">
                                Цвет
                            </div>
                            <input value="<?= $itemProd['COLOR'] ?>" type="text" class="add-input" id="color-prod" name="color-prod">
                        </div>
                        <div class="line-input-add">
                            <div class="name-input-add">
                                Описание
                            </div>
                            <textarea class="add-input" name="desc-prod" id="desc-prod"><?= $itemProd['DESCRIPTION'] ?></textarea>
                        </div>
                        <div class="line-input-add">
                            <div class="name-input-add">
                                Описание характеристик
                            </div>
                            <textarea class="add-input" name="char-prod" id="char-prod"><?= $itemProd['DESKCAHR'] ?></textarea>
                        </div>

                        <div class="line-input-add">
                            <button class="button-upd" type="button" onclick="updProduct()">Изменить</button>
                        </div>
                        <a href="products.php?" class="button-add">
                            Назад
                        </a>
                    </div>
                    <div class="right-block-product-add">
                        <div class="name-input-add">
                            Загрузить изображения
                        </div>
                        <div class="file_photo">
                            <input type="file" class="add-file" id="file_photo">
                            <button class="add_photo" type="button" onclick="addPhotos()">Добавить фото</button>
                            <input type="file" class="hidden" name="file_photo_1" id="file_photo_1">
                            <input type="file" class="hidden" name="file_photo_2" id="file_photo_2">
                            <input type="file" class="hidden" name="file_photo_3" id="file_photo_3">
                            <input type="file" class="hidden" name="file_photo_4" id="file_photo_4">
                            <input type="file" class="hidden" name="file_photo_5" id="file_photo_5">
                        </div>

                        <div id="phot_prod_add">
                            <?php
                            foreach ($PhotosProd as $key => $value) {
                            ?>
                                <div class="photo_add" id="photo_<?= $key + 1 ?>" style="background-image: url(<?= '../' . $value['SRC'] ?>);">
                                    <button class="del_photo" type="button" onclick="delPhoto('photo_<?= $key + 1 ?>')">✕</button>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
</body>

<script src="../script/add-photo.js"></script>
<script src="../script/product.js"></script>

</html>