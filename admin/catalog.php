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
                    Каталог
                </div>
                <a href="catalog-add.php" class="button-add">
                    Добавить
                </a>
                <div id="list-category-block">
                    <?php
                    addListCategoryAdm($CategoryList);
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="../script/category.js"></script>

</html>