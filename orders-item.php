<?php
require_once('config/connect.php');
require_once('config/order-items.php');
$idOrder = $_GET['idOrder'];
$itemOrder = mysqli_query($ConnectDatabase, "SELECT * FROM `orders` WHERE `ID`='$idOrder'");
$itemOrder = mysqli_fetch_assoc($itemOrder);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заказ</title>
    <link rel="stylesheet" href="css/catalog.css">
    <link rel="stylesheet" href="css/catalog-admin.css">
    <link rel="stylesheet" href="css/orders-admin.css">
    <link rel="stylesheet" href="css/basket.css">
    <link rel="stylesheet" href="css/photos-category.css">
    <link rel="stylesheet" href="css/orders-item.css">
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
                    Заказ №<?= $idOrder ?>
                </div>
            </div>
        </div>
        <div id="basket-main-block">
            <div class="inner">
                <div class="basket-table">
                    <table>
                        <thead>
                            <tr>
                                <td class="product-td">ТОВАРЫ</td>
                                <td class="price-td">ЦЕНА</td>
                                <td class="amount-td">СУММА</td>
                                <td class="value-td">КОЛИЧЕСТВО</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            addTableOrdersUser($OrdersItemList, $TableProdAll, $PhotosProdList, $idOrder);
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="char-basket-block">
                    <div class="info-client-block">
                        <div class="info-basket">
                            <div class="props-table__item">
                                <dt class="props-table__ter">
                                    <span class="props-table__ter-text">Состояние:</span>
                                </dt>
                                <dd class="props-table__def">
                                    <span class="props-table__def-text" id="allSum_wVAT_FORMATED"><?php if ($itemOrder['STATUS'] == 1) echo 'В обработке';
                                                                                                    elseif ($itemOrder['STATUS'] == 2) echo 'Собирается';
                                                                                                    elseif ($itemOrder['STATUS'] == 3) echo 'В доставке';
                                                                                                    elseif ($itemOrder['STATUS'] == 4) echo 'Выполнен'; ?></span>
                                </dd>
                            </div>
                            <div class="props-table__item">
                                <dt class="props-table__ter">
                                    <span class="props-table__ter-text">Ф.И.О.:</span>
                                </dt>
                                <dd class="props-table__def">
                                    <span class="props-table__def-text" id="allSum_wVAT_FORMATED"><?= $itemOrder['NAME'] ?></span>
                                </dd>
                            </div>
                            <div class="props-table__item">
                                <dt class="props-table__ter">
                                    <span class="props-table__ter-text">E-Mail:</span>
                                </dt>
                                <dd class="props-table__def">
                                    <span class="props-table__def-text" id="allSum_wVAT_FORMATED"><?= $itemOrder['MAIL'] ?></span>
                                </dd>
                            </div>
                            <div class="props-table__item">
                                <dt class="props-table__ter">
                                    <span class="props-table__ter-text">Телефон:</span>
                                </dt>
                                <dd class="props-table__def">
                                    <span class="props-table__def-text" id="allSum_wVAT_FORMATED"><?= $itemOrder['NUMBER'] ?></span>
                                </dd>
                            </div>
                            <div class="props-table__item">
                                <dt class="props-table__ter">
                                    <span class="props-table__ter-text">Адрес доставки:</span>
                                </dt>
                                <dd class="props-table__def">
                                    <span class="props-table__def-text" id="allSum_wVAT_FORMATED"><?= $itemOrder['ADDRESS'] ?></span>
                                </dd>
                            </div>
                            <div class="props-table__item">
                                <dt class="props-table__ter">
                                    <span class="props-table__ter-text">Комментарии к заказу:</span>
                                </dt>
                            </div>
                            <div class="prod-name-td">
                                <?= $itemOrder['COMM'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="block-basket">
                        <div class="info-basket">
                            <div class="props-table__item">
                                <dt class="props-table__ter">
                                    <span class="props-table__ter-text">Кол-во товаров:</span>
                                </dt>
                                <dd class="props-table__def">
                                    <span class="props-table__def-text" id="allSum_wVAT_FORMATED"><?= $itemOrder['VALUE'] ?> шт.</span>
                                </dd>
                            </div>
                            <div class="props-table__item">
                                <dt class="props-table__ter">
                                    <span class="props-table__ter-text">Товаров на:</span>
                                </dt>
                                <dd class="props-table__def">
                                    <span class="props-table__def-text" id="allSum_wVAT_FORMATED"><?= number_format($itemOrder['FULLAMOUNT'], 0, '.', ' ') ?> руб.</span>
                                </dd>
                            </div>
                            <div class="props-table__item">
                                <dt class="props-table__ter">
                                    <span class="props-table__ter-text">Бонусы:</span>
                                </dt>
                                <dd class="props-table__def">
                                    <span class="props-table__def-text" id="allSum_wVAT_FORMATED"><?= $itemOrder['BONUS'] ?> </span>
                                </dd>
                            </div>
                            <div class="props-table__item">
                                <dt class="props-table__ter">
                                    <span class="props-table__ter-text props-table__ter-text--big">Сумма:</span>
                                </dt>
                                <dd class="props-table__def">
                                    <span class="props-table__def-text props-table__def-text--big" id="allSum_FORMATED"><?= number_format($itemOrder['SALEAMOUNT'], 0, '.', ' ') ?> руб.</span>
                                </dd>
                            </div>
                        </div>
                    </div>
                    <a href="account.php" class="button-add">
                        Назад
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>