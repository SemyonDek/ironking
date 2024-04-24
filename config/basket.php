<?php
require_once('connect.php');

if (isset($_SESSION['basket'])) {
    $BasketTable = $_SESSION['basket'];
} else {
    $BasketTable = [];
}
$TableProdAll = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
$TableProdAll = mysqli_fetch_all($TableProdAll, MYSQLI_ASSOC);
$PhotosProdList = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img`");
$PhotosProdList = mysqli_fetch_all($PhotosProdList, MYSQLI_ASSOC);


function addTableBasket($BasketTable, $TableProdAll, $PhotosProdList)
{
    foreach ($BasketTable as $key => $itemBasket) {
        foreach ($TableProdAll as $itemProd) {
            if ($itemProd['ID'] == $itemBasket['ID']) {
                $imgSrc = '';
                foreach ($PhotosProdList as $itemPhotos) {
                    if ($itemPhotos['IDPROD'] == $itemProd['ID']) {
                        $imgSrc = $itemPhotos['SRC'];
                        break;
                    }
                }
?>
                <tr>
                    <td class="product-td">
                        <div class="product-block-td">
                            <img src="<?= $imgSrc ?>" alt="">
                            <a href="product-card.php?idProd=<?= $itemProd['ID'] ?>">
                                <div class="prod-name-td">
                                    <?= $itemProd['NAME'] ?>
                                </div>
                            </a>
                        </div>
                    </td>
                    <td class="price-td"><?= number_format($itemBasket['PRICE'], 0, '.', ' ') . ' ' ?> руб.</td>
                    <td class="amount-td"><?= number_format($itemBasket['AMOUNT'], 0, '.', ' ') . ' ' ?> руб.</td>
                    <td class="value-td"><?= $itemBasket['VALUE'] ?></td>
                    <td class="del-td" onclick="delBasket(<?= $key ?>)">Удалить</td>
                </tr>
            <?php
            }
        }
    }
}

function addTableBassketOrder($BasketTable, $TableProdAll, $PhotosProdList)
{
    foreach ($BasketTable as $key => $itemBasket) {
        foreach ($TableProdAll as $itemProd) {
            if ($itemProd['ID'] == $itemBasket['ID']) {
                $imgSrc = '';
                foreach ($PhotosProdList as $itemPhotos) {
                    if ($itemPhotos['IDPROD'] == $itemProd['ID']) {
                        $imgSrc = $itemPhotos['SRC'];
                        break;
                    }
                }
            ?>
                <tr>
                    <td class="prod-order">
                        <div class="product-block-td">
                            <img src="<?= $imgSrc ?>" alt="">
                            <a href="product-card.php?idProd=<?= $itemProd['ID'] ?>">
                                <div class="prod-name-td">
                                    <?= $itemProd['NAME'] ?>
                                </div>
                            </a>
                        </div>
                    </td>
                    <td class="value-prod-order">
                        <div class="bx-soa-item-td-title visible-xs visible-sm">Количество</div>
                        <?= $itemBasket['VALUE'] ?> шт
                    </td>
                    <td class="amount-prod-order">
                        <div class="bx-soa-item-td-title visible-xs visible-sm">Сумма</div>
                        <?= number_format($itemBasket['AMOUNT'], 0, '.', ' ') . ' ' ?> руб.
                    </td>
                </tr>
<?php
            }
        }
    }
}
