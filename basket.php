<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
    <link rel="stylesheet" href="css/basket.css">
</head>

<body>
    <div id="page">
        <?php
        require_once('header.php');
        require_once('config/basket.php');
        ?>
        <div id="crumbs">
            <div class="inner">
                <a href="index.php" class="link-crumbs-active">Главная</a>
                <p class="link-crumbs">Корзина</p>
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
                                <td class="del-td"></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                addTableBasket($BasketTable, $TableProdAll, $PhotosProdList);
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="char-basket-block">
                    <div class="block-basket">
                        <div class="info-basket">
                            <div class="props-table__item">
                                <dt class="props-table__ter">
                                    <span class="props-table__ter-text">Кол-во товаров:</span>
                                </dt>
                                <dd class="props-table__def">
                                    <span class="props-table__def-text" id="allSum_wVAT_FORMATED"><?php if (isset($_SESSION['countBasket'])) echo $_SESSION['countBasket'] ?> шт.</span>
                                </dd>
                            </div>
                            <div class="props-table__item">
                                <dt class="props-table__ter">
                                    <span class="props-table__ter-text">Товаров на:</span>
                                </dt>
                                <dd class="props-table__def">
                                    <span class="props-table__def-text" id="allSum_wVAT_FORMATED"><?php if (isset($_SESSION['basketSum'])) echo number_format($_SESSION['basketSum'], 0, '.', ' ') . ' ' ?> руб.</span>
                                </dd>
                            </div>
                            <div class="props-table__item">
                                <dt class="props-table__ter">
                                    <span class="props-table__ter-text props-table__ter-text--big">Итого:</span>
                                </dt>
                                <dd class="props-table__def">
                                    <span id="allSum" style="display: none"></span>
                                    <span class="props-table__def-text props-table__def-text--big" id="allSum_FORMATED"><?php if (isset($_SESSION['basketSum'])) echo number_format($_SESSION['basketSum'], 0, '.', ' ') . ' ' ?> руб.</span>
                                </dd>
                            </div>
                        </div>
                        <a href="orders.php" class="button-basket">Оформить заказ</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require_once('footer.php');
        ?>
    </div>
</body>

<script src="script/basket.js"></script>

</html>