<?php
require_once('connect.php');
require_once('color.php');
require_once('model.php');
require_once('filters.php');

$ProductTable = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE 
PRICE BETWEEN $min_prod_mass AND $max_prod_mass
$searchStr $idCatProd $idModel $idGroup $idUse $str_color $sort");

$ProductTable = mysqli_fetch_all($ProductTable, MYSQLI_ASSOC);
$PhotosProdList = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img`");
$PhotosProdList = mysqli_fetch_all($PhotosProdList, MYSQLI_ASSOC);

function addProdListAdm($ProductTable, $PhotosProdList)
{
    foreach ($ProductTable as $itemProd) {
        $imgSrc = '';
        foreach ($PhotosProdList as $itemPhoto) {
            if ($itemPhoto['IDPROD'] == $itemProd['ID']) {
                $imgSrc = $itemPhoto['SRC'];
                break;
            }
        }
?>
        <div class="product-item">
            <div class="product-item-img">
                <img src="../<?= $imgSrc ?>" alt="">
            </div>
            <div class="product-item-name">
                <div class="block-product-item-name">
                    <div class="product-item-name-text">
                        <?= $itemProd['NAME'] ?>
                    </div>
                    <div class="product-item-price">
                        <?= number_format($itemProd['PRICE'], 0, '.', ' ') . ' ' ?> руб.
                    </div>
                </div>
            </div>
            <a href="product-upd.php?idProd=<?= $itemProd['ID'] ?>" class="button-upd">
                Изменить
            </a>
            <button class="button-del" type="button" onclick="delProduct(<?= $itemProd['ID'] ?>)">Удалить</button>
        </div>
    <?php
    }
}

function addProdList($ProductTable, $PhotosProdList)
{
    foreach ($ProductTable as $itemProd) {
        $imgSrc = '';
        foreach ($PhotosProdList as $itemPhoto) {
            if ($itemPhoto['IDPROD'] == $itemProd['ID']) {
                $imgSrc = $itemPhoto['SRC'];
                break;
            }
        }
    ?>
        <div class="product-item">
            <a href="product-card.php?idProd=<?= $itemProd['ID'] ?>">
                <div class="product-item-img">
                    <img src="<?= $imgSrc ?>" alt="">
                </div>
                <div class="product-item-name">
                    <div class="block-product-item-name">
                        <div class="product-item-name-text">
                            <?= $itemProd['NAME'] ?>
                        </div>
                        <div class="product-item-price">
                            <?= number_format($itemProd['PRICE'], 0, '.', ' ') . ' ' ?> руб.
                        </div>
                    </div>
                </div>
            </a>
        </div>
    <?php
    }
}

function countProdCategory($ProductTable, $idCat)
{
    $count = 0;
    foreach ($ProductTable as $item) {
        if ($item['ID'] == $idCat) {
            $count += 1;
        }
    }
    return $count;
}

function addListColor($color, $colorGet = [])
{
    foreach ($color as $key => $item) {
    ?>
        <label class="label-color" for="color_<?= $key ?>">
            <input <?php
                    if (isset($colorGet[$key])) echo "checked";
                    ?> class="checkbox-color" type="checkbox" name="color[<?= $key ?>]" id="color_<?= $key ?>">
            <p class="color-name"><?= $item ?></p>
        </label>

    <?php
    }
}
function addListModel($model, $idModel = '')
{
    foreach ($model as $item) {
    ?>
        <option value="<?= $item ?>" <?php if ($item == $idModel) echo 'selected="selected"' ?>><?= $item ?></option>
<?php
    }
}
