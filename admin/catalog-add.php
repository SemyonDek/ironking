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
                    Добавить категорию
                </div>
                <form action="" id="addCategoryForm">
                    <div class="line-input-add">
                        <div class="name-input-add">
                            Название
                        </div>
                        <input type="text" class="add-input" id="name-category" name="name-category">
                    </div>
                    <div class="line-input-add">
                        <div class="name-input-add">
                            Краткое описание
                        </div>
                        <input type="text" class="add-input" id="desc-category" name="desc-category">
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
                        <button class="button-upd" type="button" onclick="addCategory()">Добавить</button>
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