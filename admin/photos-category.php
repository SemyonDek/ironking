<?php
require_once('../config/category.php');
require_once('../config/photos-category.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ</title>
    <link rel="stylesheet" href="../css/catalog.css">
    <link rel="stylesheet" href="../css/catalog-admin.css">
    <link rel="stylesheet" href="../css/photos-category.css">
</head>

<body>
    <div id="page">
        <?php
        require_once('header.php');
        ?>
        <div id="crumbs"></div>
        <div id="list-category">
            <div class="inner">
                <div class="title-category">
                    Фотографии категорий
                </div>
                <select class="add-input" name="category-img-id" id="category-img-id">
                    <option value=""></option>
                    <?php
                    addOptionCategory($CategoryList);
                    ?>
                </select>
                <form action="" id="addImgCategoryForm">
                    <input type="file" class="add-file" id="category-img" name="category-img">
                </form>
                <button type="button" class="button-add" onclick="addPhotosCategory()">
                    Добавить
                </button>
                <div id="list-category-block">

                    <?php
                    addListPhotosCategoryAdm($PhotosCategoryList, $CategoryList);
                    ?>

                </div>
            </div>
        </div>
    </div>
</body>

<script src="../script/photos-category.js"></script>

</html>