<?php
require_once('../config/gallery.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ</title>
    <link rel="stylesheet" href="../css/catalog.css">
    <link rel="stylesheet" href="../css/catalog-admin.css">
    <link rel="stylesheet" href="../css/gallery.css">
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
                    Галерея
                </div>
                <form action="" id="addGalleryForm">
                    <input type="file" class="add-file" id="img-gallery" name="img-gallery">
                </form>
                <button type="button" class="button-add" onclick="addGallery()">Добавить</button>
                <div id="list-category-block">
                    <?php
                    addListGalleryAdm($SlideGalaryrList);
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="../script/gallery.js"></script>

</html>