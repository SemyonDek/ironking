<?php

require_once('connect.php');
require_once('product.php');

$OrdersList = mysqli_query($ConnectDatabase, "SELECT * FROM `orders`");
$OrdersList = mysqli_fetch_all($OrdersList, MYSQLI_ASSOC);


function addTableOrdersAdmin($OrdersList)
{
    foreach ($OrdersList as $item) {
?>
        <tr>
            <td class="number-order">№<?= $item['ID'] ?></td>
            <td class="client-order"><?= $item['NAME'] ?></td>
            <td class="amount-order"><?= number_format($item['SALEAMOUNT'], 0, '.', ' ') ?> руб</td>
            <td class="status-order"><?php if ($item['STATUS'] == 1) echo 'В обработке';
                                        elseif ($item['STATUS'] == 2) echo 'Собирается';
                                        elseif ($item['STATUS'] == 3) echo 'В доставке';
                                        elseif ($item['STATUS'] == 4) echo 'Выполнен'; ?></td>
            <td class="info-order"><a href="orders-item.php?idOrder=<?= $item['ID'] ?>">Подробнее</a></td>
        </tr>
        <?php
    }
}

function addTableOrders($OrdersList, $idUser)
{
    foreach ($OrdersList as $item) {
        if ($item['IDUSER'] == $idUser) {
        ?>
            <tr>
                <td class="number-order">№<?= $item['ID'] ?></td>
                <td class="client-order"><?= $item['NAME'] ?></td>
                <td class="amount-order"><?= number_format($item['SALEAMOUNT'], 0, '.', ' ') . ' ' ?> руб</td>
                <td class="status-order"><?php if ($item['STATUS'] == 1) echo 'В обработке';
                                            elseif ($item['STATUS'] == 2) echo 'Собирается';
                                            elseif ($item['STATUS'] == 3) echo 'В доставке';
                                            elseif ($item['STATUS'] == 4) echo 'Выполнен'; ?></td>
                <td class="info-order"><a href="orders-item.php?idOrder=<?= $item['ID'] ?>">Подробнее</a></td>
            </tr>
<?php
        }
    }
}
