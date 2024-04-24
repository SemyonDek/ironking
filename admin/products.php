<?php
require_once('../config/product.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ</title>
    <link rel="stylesheet" href="../css/catalog-product.css">
    <link rel="stylesheet" href="../css/catalog-admin.css">
</head>

<body>
    <div id="page">
        <?php
        require_once('header.php');
        ?>
        <div id="crumbs">
        </div>

        <div id="product-list-block">
            <div class="inner">
                <a href="product-add.php" class="button-add">
                    Добавить
                </a>
                <div id="section-sort">
                    <div class="text-sort">СОРТИРОВАТЬ</div>
                    <select name="sort" id="sorting" onchange="sortProd()">
                        <option value=""></option>
                        <option value="0" <?php if (isset($_GET['sort']) && $_GET['sort'] == 0) echo 'selected="selected"'; ?>>сначала дешевые</option>
                        <option value="1" <?php if (isset($_GET['sort']) && $_GET['sort'] == 1) echo 'selected="selected"'; ?>>сначала дорогие</option>
                    </select>
                </div>
                <div id="product-list">
                    <div id="product-block">
                        <?php
                        addProdListAdm($ProductTable, $PhotosProdList);
                        ?>
                    </div>
                    <div id="filter-block">
                        <form action="" id="filterForm" method="get">
                            <input value="" type="hidden" id="sort-filter" name="sort">
                            <div class="line-filter">
                                <div class="title-filter">
                                    Цена, руб
                                </div>
                                <div class="input-filter input-filter-price">
                                    <input value="<?php if (isset($_GET['min_price'])) echo $_GET['min_price'] ?>" type="number" class="price-input" id="min_price" name="min_price" placeholder="min">
                                    —
                                    <input value="<?php if (isset($_GET['max_price'])) echo $_GET['min_price'] ?>" type="number" class="price-input" id="max_price" name="max_price" placeholder="max">
                                </div>
                            </div>
                            <div class="line-filter">
                                <div class="title-filter">
                                    Модель
                                </div>
                                <div class="input-filter">
                                    <select class="select-filter" name="model" id="model">
                                        <option value=""></option>
                                        <?php
                                        if (isset($_GET['model'])) {
                                            addListModel($model, $_GET['model']);
                                        } else {
                                            addListModel($model);
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="line-filter">
                                <div class="title-filter">
                                    Группы мышц
                                </div>
                                <div class="input-filter">
                                    <select class="select-filter" name="group" id="group">
                                        <?php
                                        $groupGet = 0;
                                        if (isset($_GET['group'])) {
                                            $groupGet = $_GET['group'];
                                        }
                                        ?>
                                        <option value=""></option>
                                        <option value="1" <? if ($groupGet = 1) echo 'selected="selected"'; ?>>Все</option>
                                        <option value="2" <? if ($groupGet = 2) echo 'selected="selected"'; ?>>Для мышц груди</option>
                                        <option value="3" <? if ($groupGet = 3) echo 'selected="selected"'; ?>>Для мышц ног</option>
                                        <option value="4" <? if ($groupGet = 4) echo 'selected="selected"'; ?>>Для мышц пресса</option>
                                        <option value="5" <? if ($groupGet = 5) echo 'selected="selected"'; ?>>Для мышц рук</option>
                                        <option value="6" <? if ($groupGet = 6) echo 'selected="selected"'; ?>>Для мышц спины</option>
                                        <option value="7" <? if ($groupGet = 7) echo 'selected="selected"'; ?>>Кардио</option>
                                    </select>
                                </div>
                            </div>
                            <div class="line-filter">
                                <div class="title-filter">
                                    Целевое использование
                                </div>
                                <div class="input-filter">
                                    <select class="select-filter" name="use" id="use">
                                        <?php
                                        $useGet = 0;
                                        if (isset($_GET['use'])) {
                                            $useGet = $_GET['use'];
                                        }
                                        ?>
                                        <option value=""></option>
                                        <option value="1" <? if ($useGet = 1) echo 'selected="selected"'; ?>>Для восстановления здоровья</option>
                                        <option value="2" <? if ($useGet = 2) echo 'selected="selected"'; ?>>Для домашней физкультуры</option>
                                        <option value="3" <? if ($useGet = 3) echo 'selected="selected"'; ?>>Для тренажерного зала</option>
                                        <option value="4" <? if ($useGet = 4) echo 'selected="selected"'; ?>>Для улицы</option>
                                    </select>
                                </div>
                            </div>
                            <div class="line-filter">
                                <div class="title-filter">
                                    Цвет
                                </div>
                                <div class="input-filter">
                                    <?php
                                    if (isset($_GET['color'])) {
                                        addListColor($color, $_GET['color']);
                                    } else {
                                        addListColor($color);
                                    }
                                    ?>
                                </div>
                            </div>
                            <button class="button-del" type="submit" onclick="">Применить</button>
                        </form>
                        <form action="" method="get">
                            <button class="button-del" type="submit" onclick="">Сбросить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="../script/product.js"></script>
<script src="../script/sort.js"></script>

</html>