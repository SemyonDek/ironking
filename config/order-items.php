<?php

require_once('connect.php');
require_once('product.php');

$OrdersItemList = mysqli_query($ConnectDatabase, "SELECT * FROM `order_item`");
$OrdersItemList = mysqli_fetch_all($OrdersItemList, MYSQLI_ASSOC);
$TableProdAll = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
$TableProdAll = mysqli_fetch_all($TableProdAll, MYSQLI_ASSOC);
$PhotosProdList = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img`");
$PhotosProdList = mysqli_fetch_all($PhotosProdList, MYSQLI_ASSOC);


function addTableOrdersAdmin($OrdersItemList, $TableProdAll, $PhotosProdList, $idOrder)
{
    foreach ($OrdersItemList as $item) {
        if ($item['IDORDER'] == $idOrder) {
            foreach ($TableProdAll as $itemProd) {
                if ($item['IDPROD'] == $itemProd['ID']) {
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
                                <img src="../<?= $imgSrc ?>" alt="">
                                <div class="prod-name-td">
                                    <?= $itemProd['NAME'] ?>
                                </div>
                            </div>
                        </td>
                        <td class="price-td"><?= number_format($item['PRICE'], 0, '.', ' ') . ' ' ?> руб.</td>
                        <td class="amount-td"><?= number_format($item['AMOUNT'], 0, '.', ' ') . ' ' ?> руб.</td>
                        <td class="value-td"><?= $item['VALUE'] ?></td>
                    </tr>
                <?php
                    break;
                }
            }
        }
    }
}
function addTableOrdersUser($OrdersItemList, $TableProdAll, $PhotosProdList, $idOrder)
{
    foreach ($OrdersItemList as $item) {
        if ($item['IDORDER'] == $idOrder) {
            foreach ($TableProdAll as $itemProd) {
                if ($item['IDPROD'] == $itemProd['ID']) {
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
                                <div class="prod-name-td">
                                    <?= $itemProd['NAME'] ?>
                                </div>
                            </div>
                        </td>
                        <td class="price-td"><?= number_format($item['PRICE'], 0, '.', ' ') . ' ' ?> руб.</td>
                        <td class="amount-td"><?= number_format($item['AMOUNT'], 0, '.', ' ') . ' ' ?> руб.</td>
                        <td class="value-td"><?= $item['VALUE'] ?></td>
                    </tr>
<?php
                    break;
                }
            }
        }
    }
}
