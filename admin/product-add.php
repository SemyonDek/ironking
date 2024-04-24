<?php
require_once('../config/category.php');
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
                    Добавить товар
                </div>
                <form action="" id="addProdForm">
                    <div class="left-block-product-add">
                        <div class="line-input-add">
                            <div class="name-input-add">
                                Категория
                            </div>
                            <select class="add-input" name="category-prod" id="category-prod">
                                <option value=""></option>
                                <?php
                                addOptionCategory($CategoryList);
                                ?>
                            </select>
                        </div>
                        <div class="line-input-add">
                            <div class="name-input-add">
                                Название
                            </div>
                            <input type="text" class="add-input" id="name-prod" name="name-prod">
                        </div>
                        <div class="line-input-add">
                            <div class="name-input-add">
                                Цена
                            </div>
                            <input type="number" class="add-input" id="price-prod" name="price-prod">
                        </div>
                        <div class="line-input-add">
                            <div class="name-input-add">
                                Кол-во товаров
                            </div>
                            <input type="number" class="add-input" id="value-prod" name="value-prod">
                        </div>
                        <div class="line-input-add">
                            <div class="name-input-add">
                                Модель
                            </div>
                            <input type="text" class="add-input" id="model-prod" name="model-prod">
                        </div>
                        <div class="line-input-add">
                            <div class="name-input-add">
                                Группа мышц
                            </div>
                            <select class="add-input" name="group-prod" id="group-prod">
                                <option value=""></option>
                                <option value="1">Все</option>
                                <option value="2">Для мышц груди</option>
                                <option value="3">Для мышц ног</option>
                                <option value="4">Для мышц пресса</option>
                                <option value="5">Для мышц рук</option>
                                <option value="6">Для мышц спины</option>
                                <option value="7">Кардио</option>
                            </select>
                        </div>
                        <div class="line-input-add">
                            <div class="name-input-add">
                                Целевое назначение
                            </div>
                            <select class="add-input" name="use-prod" id="use-prod">
                                <option value=""></option>
                                <option value="1">Для восстановления здоровья</option>
                                <option value="2">Для домашней физкультуры</option>
                                <option value="3">Для тренажерного зала</option>
                                <option value="4">Для улицы</option>
                            </select>
                        </div>
                        <div class="line-input-add">
                            <div class="name-input-add">
                                Цвет
                            </div>
                            <input type="text" class="add-input" id="color-prod" name="color-prod">
                        </div>
                        <div class="line-input-add">
                            <div class="name-input-add">
                                Описание
                            </div>
                            <textarea class="add-input" name="desc-prod" id="desc-prod"></textarea>
                        </div>
                        <div class="line-input-add">
                            <div class="name-input-add">
                                Описание характеристик
                            </div>
                            <textarea class="add-input" name="char-prod" id="char-prod"></textarea>
                        </div>

                        <div class="line-input-add">
                            <button class="button-upd" type="button" onclick="addProduct()">Добавить</button>
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