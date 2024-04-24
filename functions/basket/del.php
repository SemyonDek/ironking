<?php
session_start();

$id = $_POST['id'];
unset($_SESSION['basket'][$id]);

$sum = 0;
$countBasket = 0;
$_SESSION['basketSum'] = 0;
foreach ($_SESSION['basket'] as $value) {
    $countBasket += $value['VALUE'];
    $sum += $value['AMOUNT'];
}

$_SESSION['basketSum'] = $sum;
$_SESSION['countBasket'] = $countBasket;

require_once('../../config/basket.php');

?>

<div id="basket-button">
    <a href="basket.php">
        <?php
        if (isset($_SESSION['basket']) && $_SESSION['basket'] !== [] && isset($_SESSION['countBasket']) && $_SESSION['countBasket'] > 0) {
        ?>
            <span class="aside__link_count">
                <span id="value_basket_number"><?= $_SESSION['countBasket'] ?></span>
            </span>
        <?php
        }
        ?>
        <svg width="26" height="23" viewBox="0 0 26 23" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1.53481 0.500021C1.3852 0.500021 1.24171 0.559453 1.13592 0.665243C1.03014 0.771032 0.970703 0.914514 0.970703 1.06412C0.970703 1.21373 1.03014 1.35721 1.13592 1.463C1.24171 1.56879 1.3852 1.62823 1.53481 1.62823H4.46108L7.43136 15.678C7.42378 15.7587 7.43363 15.84 7.46026 15.9165C7.48689 15.993 7.52967 16.0629 7.58569 16.1214C7.64172 16.18 7.70967 16.2257 7.78495 16.2557C7.86023 16.2856 7.94107 16.299 8.02198 16.2949H22.1245C22.2741 16.2949 22.4176 16.2354 22.5234 16.1297C22.6292 16.0239 22.6886 15.8804 22.6886 15.7308C22.6886 15.5812 22.6292 15.4377 22.5234 15.3319C22.4176 15.2261 22.2741 15.1667 22.1245 15.1667H8.48031L8.00421 12.9103H23.2527C23.3802 12.9093 23.5036 12.8652 23.6028 12.7852C23.702 12.7051 23.7712 12.5938 23.7991 12.4694L25.7734 4.00789C25.7918 3.92572 25.7916 3.84048 25.7728 3.75841C25.7539 3.67635 25.7169 3.59954 25.6646 3.53362C25.6122 3.4677 25.5457 3.41435 25.47 3.37748C25.3943 3.34061 25.3113 3.32115 25.2271 3.32053H5.97711L5.47478 0.940867C5.44659 0.814951 5.37608 0.702504 5.27502 0.62228C5.17396 0.542056 5.04845 0.498904 4.91942 0.500021H1.53481ZM6.21516 4.44874H24.522L22.8031 11.7821H7.76644L6.21516 4.44874ZM11.1245 17.4231C9.72923 17.4231 8.58608 18.5662 8.58608 19.9615C8.58608 21.3568 9.72923 22.5 11.1245 22.5C12.5198 22.5 13.663 21.3568 13.663 19.9615C13.663 18.5662 12.5198 17.4231 11.1245 17.4231ZM19.022 17.4231C17.6267 17.4231 16.4835 18.5662 16.4835 19.9615C16.4835 21.3568 17.6267 22.5 19.022 22.5C20.4173 22.5 21.5604 21.3568 21.5604 19.9615C21.5604 18.5662 20.4173 17.4231 19.022 17.4231ZM11.1245 18.5513C11.9101 18.5513 12.5348 19.176 12.5348 19.9615C12.5348 20.7471 11.9101 21.3718 11.1245 21.3718C10.939 21.3729 10.7551 21.3372 10.5835 21.2667C10.4119 21.1963 10.256 21.0924 10.1248 20.9612C9.99366 20.8301 9.88982 20.6742 9.81935 20.5025C9.74887 20.3309 9.71316 20.1471 9.71428 19.9615C9.71428 19.176 10.339 18.5513 11.1245 18.5513ZM19.022 18.5513C19.8075 18.5513 20.4322 19.176 20.4322 19.9615C20.4322 20.7471 19.8075 21.3718 19.022 21.3718C18.8365 21.3729 18.6526 21.3372 18.481 21.2667C18.3094 21.1963 18.1534 21.0924 18.0223 20.9612C17.8911 20.8301 17.7872 20.6742 17.7168 20.5025C17.6463 20.3309 17.6106 20.1471 17.6117 19.9615C17.6117 19.176 18.2365 18.5513 19.022 18.5513Z" fill="black"></path>
        </svg>
    </a>
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