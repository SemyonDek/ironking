<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оформление заказа</title>
    <link rel="stylesheet" href="css/orders.css">
</head>

<body>
    <div id="page">
        <?php
        $order = 1;
        require_once('header.php');
        require_once('config/basket.php');
        ?>
        <?php
        if (isset($_SESSION['accountName']) && $_SESSION['accountName'] == 'user') {
            $idUser = $_SESSION['accountId'];
            $usersData = mysqli_query($ConnectDatabase, "SELECT * FROM `users` WHERE ID = '$idUser'");
            $usersData = mysqli_fetch_assoc($usersData);
        }
        ?>
        <div id="crumbs">
            <div class="inner">
                <a href="index.php" class="link-crumbs-active">Главная</a>
                <a href="basket.php" class="link-crumbs-active">Корзина</a>
                <p class="link-crumbs">Оформление</p>
            </div>
        </div>

        <div id="order-main-blovk">
            <div class="inner">
                <div class="left-order-block">
                    <div class="basket-table-block">
                        <div class="basket-table">
                            <div class="title-left-order-block">
                                Товары в заказе
                            </div>
                            <table>
                                <tbody>

                                    <?php
                                    addTableBassketOrder($BasketTable, $TableProdAll, $PhotosProdList);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="basket-table-block">
                        <div class="basket-table">
                            <div class="title-left-order-block">
                                Покупатель
                            </div>

                            <div class="input-info-block-orders">
                                <form action="" id="clientForm">
                                    <div class="line-input">
                                        <lable for="name-client" class="lable-orders-client">
                                            Ф.И.О.
                                        </lable>
                                        <div class="block-input-orders-item">
                                            <input value="<?php if (isset($idUser)) echo $usersData['NAME'] ?>" name="name-client" id="name-client" class="input-orders-item" type="text">
                                        </div>
                                    </div>
                                    <div class="line-input">
                                        <lable for="mail-client" class="lable-orders-client">
                                            E-Mail
                                        </lable>
                                        <div class="block-input-orders-item">
                                            <input value="<?php if (isset($idUser)) echo $usersData['MAIL'] ?>" name="mail-client" id="mail-client" class="input-orders-item" type="text">
                                        </div>
                                    </div>
                                    <div class="line-input">
                                        <lable for="number-client" class="lable-orders-client">
                                            Телефон
                                        </lable>
                                        <div class="block-input-orders-item">
                                            <input value="<?php if (isset($idUser)) echo $usersData['NUMBER'] ?>" name="number-client" id="number-client" class="input-orders-item" type="text">
                                        </div>
                                    </div>
                                    <div class="line-input">
                                        <lable for="addres-client" class="lable-orders-client">
                                            Адрес доставки
                                        </lable>
                                        <div class="block-input-orders-item">
                                            <input value="<?php if (isset($idUser)) echo $usersData['ADDRESS'] ?>" name="addres-client" id="addres-client" class="input-orders-item" type="text">
                                        </div>
                                    </div>
                                    <div class="line-input">
                                        <lable for="comm-client" class="lable-orders-client">
                                            Комментарии к заказу:
                                        </lable>
                                        <div class="block-input-orders-item">
                                            <textarea class="input-orders-item" name="comm-client" id="comm-client"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="right-order-block">
                    <div class="info-order-block">
                        <div class="bx-soa-cart-total-line">
                            <input value="<?= $_SESSION['basketSum'] ?>" type="hidden" id="amount-sum-basket">
                            <span class="bx-soa-cart-t">Товаров на:</span>
                            <span class="bx-soa-cart-d"><?= number_format($_SESSION['basketSum'], 0, '.', ' ') . ' ' ?> руб.</span>
                        </div>

                        <div class="order-bonus <?php if (!isset($idUser)) echo 'disabled-bonus-block' ?>">
                            <div class="order-bonus__header">
                                <div class="order-bonus__header-balans">
                                    Бонусный счет: <?php if (isset($idUser)) echo $usersData['BONUS'];
                                                    else echo 0; ?> баллов
                                </div>
                            </div>

                            <div class="order-bonus__body">
                                <ul class="order-bonus__select">
                                    <li class="order-bonus__checkbox checkbox" data-entity="b-save-wrapper">
                                        <input class="checkbox__input" type="radio" id="order-bonus-save" data-entity="b-save-checkbox" value="save" name="order-bonus-type" checked="checked">
                                        <label class="checkbox__label" for="order-bonus-save" id="order-bonus-save-label">
                                            <div class="checkbox__mark"></div>
                                            <div class="checkbox__content">
                                                <div class="order-bonus__checkbox-title">Копить бонусы</div>
                                                <div class="order-bonus__checkbox-descr" data-entity="b-save-descr">
                                                    <b><?= number_format(substr($_SESSION['basketSum'], 0, -2), 0, '.', ' ') . ' '  ?> балл</b> будет начислен на бонусную карту после оплаты данного заказа
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <li class="order-bonus__checkbox checkbox <?php if (!isset($idUser) || $usersData['BONUS'] <= 0) echo 'disabled' ?>" data-entity="b-pay-wrapper">
                                        <input class="checkbox__input" type="radio" id="order-bonus-pay" data-entity="b-pay-checkbox" value="pay" name="order-bonus-type">
                                        <label class="checkbox__label" for="order-bonus-pay" id="order-bonus-pay-label">
                                            <div class="checkbox__mark"></div>
                                            <div class="checkbox__content">
                                                <div class="order-bonus__checkbox-title">Списать бонусы</div>
                                                <div class="order-bonus__checkbox-descr" data-entity="b-pay-descr">
                                                    <b><?php if (isset($idUser)) echo $usersData['BONUS'];
                                                        else echo 0; ?> баллов</b> можно потратить
                                                </div>
                                                <div class="order-bonus__input">
                                                    <input id="value-prod" class="form-control bx-soa-customer-input bx-ios-fix input-value-input" type="number" max="<?php if (isset($idUser)) echo $usersData['BONUS'];
                                                                                                                                                                        else echo 0; ?>" value="1" onkeypress='validate(event)'>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="bx-soa-cart-total-line bx-soa-cart-total-line-total"><span class="bx-soa-cart-t">Товаров на:</span><span class="bx-soa-cart-d" style="font-size: 27px;"><span><?= number_format($_SESSION['basketSum'], 0, '.', ' ') . ' ' ?></span> руб.</span></div>
                        <button class="button-basket" type="button" onclick="addOrders()">Оформить заказ</button>
                    </div>
                </div>
            </div>
        </div>

        <?php
        require_once('footer.php');
        ?>
    </div>
</body>

<script src="script/value-bonus.js"></script>
<script src="script/orders.js"></script>

</html>