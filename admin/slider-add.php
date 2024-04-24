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
                    Добавить слайд
                </div>
                <form action="" id="addSliderForm" style="padding-bottom: 30px;">
                    <div class="line-input-add">
                        <div class="name-input-add">
                            Название
                        </div>
                        <input type="text" class="add-input" id="name-slider" name="name-slider">
                    </div>
                    <div class="line-input-add">
                        <div class="name-input-add">
                            Категория
                        </div>
                        <select class="add-input" name="category-slider" id="category-slider">
                            <option value=""></option>
                            <?php
                            addOptionCategory($CategoryList);
                            ?>
                        </select>
                    </div>
                    <div class="line-input-add">
                        <div class="name-input-add">
                            Краткое описание
                        </div>
                        <input type="text" class="add-input" id="desc-slider" name="desc-slider">
                    </div>
                    <div class="line-input-add">
                        <div class="name-input-add">
                            Изображение
                        </div>
                        <input type="file" class="add-file" id="img-slider" name="img-slider">
                    </div>
                    <div class="line-input-add">
                        <button class="button-upd" type="button" onclick="addSlider()">Добавить</button>
                    </div>
                    <a href="main-slider.php" class="button-add">
                        Назад
                    </a>
                </form>
            </div>
        </div>
    </div>
</body>

<script src="../script/slider.js"></script>

</html>