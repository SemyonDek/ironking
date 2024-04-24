<?php
require_once('../config/orders.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ</title>
    <link rel="stylesheet" href="../css/catalog.css">
    <link rel="stylesheet" href="../css/orders-admin.css">
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
                    Заказы
                </div>
                <div id="list-orders-block">
                    <table>
                        <thead>
                            <tr>
                                <td class="number-order">Заказ</td>
                                <td class="client-order">Клиент</td>
                                <td class="amount-order">Сумма</td>
                                <td class="status-order">Статус</td>
                                <td class="info-order"></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            addTableOrdersAdmin($OrdersList);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>