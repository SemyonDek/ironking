<?php

require_once('connect.php');

$CategoryList = mysqli_query($ConnectDatabase, "SELECT * FROM `category`");
$CategoryList = mysqli_fetch_all($CategoryList, MYSQLI_ASSOC);
$prodListCat = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
$prodListCat = mysqli_fetch_all($prodListCat, MYSQLI_ASSOC);

function addListCategoryAdm($CategoryList)
{
    foreach ($CategoryList as $item) {
?>
        <div class="list-category-item">
            <div class="list-category-img">
                <img src="../<?= $item['SMALLIMG'] ?>" alt="">
            </div>
            <div class="list-category-name">
                <div class="list-category-name-text">
                    <?= $item['NAME'] ?>
                </div>
            </div>
            <a href="catalog-upd.php?catId=<?= $item['ID'] ?>" class="button-upd">
                Изменить
            </a>
            <button class="button-del" type="button" onclick="delCategory(<?= $item['ID'] ?>)">Удалить</button>
        </div>
    <?php
    }
}
function addListCategory($CategoryList, $ProductTable)
{
    foreach ($CategoryList as $item) {
        $countCat = 0;
    ?>
        <div class="list-category-item">
            <a href="catalog-product.php?catId=<?= $item['ID'] ?>">
                <div class="list-category-img">
                    <img src="<?= $item['SMALLIMG'] ?>" alt="">
                </div>
                <span class="main-items__count">
                    <?php
                    foreach ($ProductTable as $itemProd) {
                        if ($itemProd['IDCAT'] == $item['ID']) {
                            $countCat = $countCat + 1;
                        }
                    }
                    ?>
                    <?= $countCat ?>
                </span>
                <div class="list-category-name">
                    <div class="list-category-name-text">
                        <?= $item['NAME'] ?>
                    </div>
                </div>
            </a>
        </div>
    <?php
    }
}

function addOptionCategory($CategoryList, $idCat = '')
{
    foreach ($CategoryList as $item) {
    ?>
        <option value="<?= $item['ID'] ?>" <?php if ($item['ID'] == $idCat) echo 'selected="selected"' ?>><?= $item['NAME'] ?></option>
<?php
    }
}
