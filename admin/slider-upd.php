<?php
require_once('../config/connect.php');
require_once('../config/category.php');
$idSlide = $_GET['idSlide'];
$itemSlide = mysqli_query($ConnectDatabase, "SELECT * FROM `slider` WHERE `ID`='$idSlide'");
$itemSlide = mysqli_fetch_assoc($itemSlide);
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
                    Изменить слайд
                </div>
                <form action="" id="addSliderForm" style="padding-bottom: 30px;">
                    <input type="hidden" name="id-slider" id="id-slider" value="<?= $idSlide ?>">
                    <div class="line-input-add">
                        <div class="name-input-add">
                            Название
                        </div>
                        <input value="<?= $itemSlide['NAME'] ?>" type="text" class="add-input" id="name-slider" name="name-slider">
                    </div>
                    <div class="line-input-add">
                        <div class="name-input-add">
                            Категория
                        </div>
                        <select class="add-input" name="category-slider" id="category-slider">
                            <option value=""></option>
                            <?php
                            addOptionCategory($CategoryList, $itemSlide['CATID']);
                            ?>
                        </select>
                    </div>
                    <div class="line-input-add">
                        <div class="name-input-add">
                            Краткое описание
                        </div>
                        <input value="<?= $itemSlide['DESCRIPTION'] ?>" type="text" class="add-input" id="desc-slider" name="desc-slider">
                    </div>
                    <div class="line-input-add">
                        <div class="name-input-add">
                            Изображение
                        </div>
                        <input type="file" class="add-file" id="img-slider" name="img-slider">
                    </div>
                    <div class="line-input-add">
                        <button class="button-upd" type="button" onclick="updSlider()">Изменить</button>
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