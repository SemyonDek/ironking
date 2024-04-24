<?php
require_once('../config/connect.php');
$catId = $_GET['catId'];
$itemCat = mysqli_query($ConnectDatabase, "SELECT * FROM `category` WHERE `ID`='$catId'");
$itemCat = mysqli_fetch_assoc($itemCat);
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
                    Изменить категорию
                </div>
                <img src="../<?= $itemCat['SMALLIMG'] ?>" alt="" class="max-cat-img" id="min-cat-img">
                <img src="../<?= $itemCat['BIGIMG'] ?>" alt="" class="max-cat-img" id="max-cat-img">
                <form action="" id="addCategoryForm">
                    <input value="<?= $catId ?>" type="hidden" id="id-category" name="id-category">
                    <div class="line-input-add">
                        <div class="name-input-add">
                            Название
                        </div>
                        <input value="<?= $itemCat['NAME'] ?>" type="text" class="add-input" id="name-category" name="name-category">
                    </div>
                    <div class="line-input-add">
                        <div class="name-input-add">
                            Краткое описание
                        </div>
                        <input value="<?= $itemCat['DESK'] ?>" type="text" class="add-input" id="desc-category" name="desc-category">
                    </div>
                    <div class="line-input-add">
                        <div class="name-input-add">
                            Изображение в каталоге категорий
                        </div>
                        <input type="file" class="add-file" id="min-img-category" name="min-img-category">
                    </div>
                    <div class="line-input-add">
                        <div class="name-input-add">
                            Изображение в каталоге товаров
                        </div>
                        <input type="file" class="add-file" id="max-img-category" name="max-img-category">
                    </div>
                    <div class="line-input-add">
                        <button class="button-upd" type="button" onclick="updCategory()">Изменить</button>
                    </div>
                    <a href="catalog.php?" class="button-add">
                        Назад
                    </a>
                </form>
            </div>
        </div>
    </div>
</body>

<script src="../script/category.js"></script>

</html>