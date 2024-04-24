<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Аккаунт</title>
    <link rel="stylesheet" href="css/orders.css">
    <link rel="stylesheet" href="css/orders-admin.css">
    <link rel="stylesheet" href="css/account.css">
</head>

<body>
    <div id="page">
        <?php
        $account = 1;
        require_once('header.php');
        require_once('config/connect.php');
        $idUser = $_SESSION['accountId'];
        $usersData = mysqli_query($ConnectDatabase, "SELECT * FROM `users` WHERE ID = '$idUser'");
        $usersData = mysqli_fetch_assoc($usersData);
        require_once('config/orders.php');
        ?>
        <div id="crumbs">
            <div class="inner">
                <a href="index.php" class="link-crumbs-active">Главная</a>
                <p class="link-crumbs">Аккаунт</p>
            </div>
        </div>
        <div id="main-account-block">
            <div class="inner">
                <div class="title-account">
                    Аккаунт
                </div>
                <div class="left-order-block">
                    <div class="basket-table-block">
                        <div class="basket-table">
                            <div class="title-left-order-block">
                                Данные пользователя
                            </div>
                            <div class="input-info-block-orders">
                                <form action="" id="accountForm">
                                    <div class="line-input">
                                        <lable for="nameUser" class="lable-orders-client">
                                            Ф.И.О.
                                        </lable>
                                        <div class="block-input-orders-item">
                                            <input value="<?= $usersData['NAME'] ?>" name="nameUser" id="nameUser" class="input-orders-item" type="text">
                                        </div>
                                    </div>
                                    <div class="line-input">
                                        <lable for="mailUser" class="lable-orders-client">
                                            E-Mail
                                        </lable>
                                        <div class="block-input-orders-item">
                                            <input value="<?= $usersData['MAIL'] ?>" name="mailUser" id="mailUser" class="input-orders-item" type="text">
                                        </div>
                                    </div>
                                    <div class="line-input">
                                        <lable for="numberUser" class="lable-orders-client">
                                            Телефон
                                        </lable>
                                        <div class="block-input-orders-item">
                                            <input value="<?= $usersData['NUMBER'] ?>" name="numberUser" id="numberUser" class="input-orders-item" type="text">
                                        </div>
                                    </div>
                                    <div class="line-input">
                                        <lable for="addressUser" class="lable-orders-client">
                                            Адрес доставки
                                        </lable>
                                        <div class="block-input-orders-item">
                                            <input value="<?= $usersData['ADDRESS'] ?>" name="addressUser" id="addressUser" class="input-orders-item" type="text">
                                        </div>
                                    </div>
                                    <button class="button-basket" type="button" onclick="updAccount()">Обновить</button>

                                </form>
                            </div>
                            <div id="list-orders-block">
                                <table>
                                    <thead>
                                        <tr>
                                            <td class="number-order">Заказ</td>
                                            <td class="client-order">Имя</td>
                                            <td class="amount-order">Сумма</td>
                                            <td class="status-order">Статус</td>
                                            <td class="info-order"></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        addTableOrders($OrdersList, $idUser);
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        require_once('footer.php');
        ?>
    </div>

</body>

<script src="script/account.js"></script>

</html>