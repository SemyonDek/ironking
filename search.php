<?php
require_once('config/connect.php');
require_once('config/product.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Поиск</title>
    <link rel="stylesheet" href="css/catalog-product.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/catalog-admin.css">
</head>

<body>
    <div id="page">
        <?php
        require_once('header.php');
        ?>

        <div id="search-block-search">
            <div class="inner">
                <form id="searchFormStr" class="" action="" method="get">
                    <input value="<?= $_GET['search'] ?>" type="text" id="searchStr" name="search" value="" placeholder="Найти тренажер..." autocomplete="off" required>
                    <button class="header__search-icon header__search-submit" title="Поиск">
                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.8181 17.9402L13.7656 12.8877C14.9742 11.4744 15.6351 9.69702 15.6351 7.81743C15.6351 5.72922 14.8217 3.76622 13.3453 2.28978C11.8686 0.813139 9.90543 0 7.81743 0C5.72922 0 3.76622 0.813346 2.28978 2.28978C0.813139 3.76622 0 5.72922 0 7.81743C0 9.90564 0.813346 11.8686 2.28978 13.3453C3.76622 14.8219 5.72922 15.6351 7.81743 15.6351C9.69702 15.6351 11.4742 14.9742 12.8877 13.7656L17.9402 18.8181C17.9977 18.8758 18.0662 18.9216 18.1415 18.9528C18.2168 18.9841 18.2976 19.0001 18.3791 19C18.502 19.0002 18.6221 18.9639 18.7243 18.8957C18.8266 18.8275 18.9062 18.7305 18.9532 18.617C19.0002 18.5034 19.0125 18.3785 18.9884 18.258C18.9644 18.1376 18.9051 18.0269 18.8181 17.9402ZM7.81743 14.3935C6.06098 14.3935 4.40966 13.7093 3.1677 12.4674C1.92554 11.2252 1.24154 9.57388 1.24154 7.81743C1.24154 6.06098 1.92554 4.40966 3.1677 3.1677C4.40966 1.92575 6.06077 1.24154 7.81743 1.24154C9.57368 1.24154 11.2252 1.92575 12.4674 3.16791C13.7093 4.40966 14.3935 6.06098 14.3935 7.81743C14.3935 9.57388 13.7093 11.2252 12.4674 12.4674C11.2252 13.7093 9.57368 14.3935 7.81743 14.3935Z" fill="black"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        <div id="product-list-block">
            <div class="inner">
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
                        addProdList($ProductTable, $PhotosProdList);
                        ?>
                    </div>
                    <div id="filter-block">
                        <form action="" id="filterForm" method="get">
                            <input value="<?= $_GET['search'] ?>" type="hidden" id="id-filter" name="search">
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
                            <input value="<?= $_GET['search'] ?>" type="hidden" id="id-clear" name="search">
                            <button class="button-del" type="submit" onclick="">Сбросить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require_once('footer.php');
        ?>
    </div>
</body>

<script src="script/sort.js"></script>

</html>