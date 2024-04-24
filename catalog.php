<?php
require_once('config/category.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог</title>
    <link rel="stylesheet" href="css/catalog.css">
</head>

<body>
    <div id="page">
        <?php
        require_once('header.php');
        ?>
        <div id="crumbs">
            <div class="inner">
                <a href="index.php" class="link-crumbs-active">Главная</a>
                <p class="link-crumbs">Каталог</p>
            </div>
        </div>
        <div id="list-category">
            <div class="inner">
                <div class="title-category">
                    Каталог
                </div>
                <div id="list-category-block">
                    <?php
                    addListCategory($CategoryList, $prodListCat);
                    ?>
                </div>
            </div>
        </div>
        <?php
        require_once('footer.php');
        ?>
    </div>
</body>

</html>