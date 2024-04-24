<?php
require_once('connect.php');

$SliderList = mysqli_query($ConnectDatabase, "SELECT * FROM `slider`");
$SliderList = mysqli_fetch_all($SliderList, MYSQLI_ASSOC);

function addListSliderAdm($SliderList)
{
    foreach ($SliderList as $item) {
?>
        <div class="list-category-item">
            <div class="list-category-img">
                <img src="../<?= $item['SRC'] ?>" alt="">
            </div>
            <div class="list-category-name">
                <div class="list-category-name-text">
                    <?= $item['NAME'] ?>
                </div>
                <div class="list-slider-text">
                    <?= $item['DESCRIPTION'] ?>
                </div>
            </div>
            <a href="slider-upd.php?idSlide=<?= $item['ID'] ?>" class="button-upd">
                Изменить
            </a>
            <button class="button-del" type="button" onclick="delSlider(<?= $item['ID'] ?>)">Удалить</button>
        </div>

    <?php
    }
}

function addIndexSliderAdm($SliderList)
{
    ?>
    <div id="slider-photo">
        <div id="block-img">
            <?php
            foreach ($SliderList as $item) {
            ?>
                <div class="img-slide" style="background-image: url('../<?= $item['SRC'] ?>');"></div>
            <?php
            }
            ?>
        </div>
        <div id="block-info">
            <?php
            foreach ($SliderList as $item) {
            ?>
                <div class="info-item">
                    <div class="title-slider-img">
                        <?= $item['NAME'] ?>
                    </div>
                    <div class="desc-slider-img">
                        <?= $item['DESCRIPTION'] ?>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div id="block-tubs">
            <?php
            foreach ($SliderList as $key => $item) {
            ?>
                <div class="tubs-item">0<?= $key + 1 ?></div>
            <?php
            }
            ?>
        </div>
    </div>
<?php
}
function addIndexSlider($SliderList)
{
?>
    <div id="slider-photo">
        <div id="block-img">
            <?php
            foreach ($SliderList as $item) {
            ?>
                <div class="img-slide" style="background-image: url('<?= $item['SRC'] ?>');"></div>
            <?php
            }
            ?>
        </div>
        <div id="block-info">
            <?php
            foreach ($SliderList as $item) {
            ?>
                <div class="info-item">
                    <div class="title-slider-img">
                        <?= $item['NAME'] ?>
                    </div>
                    <div class="desc-slider-img">
                        <?= $item['DESCRIPTION'] ?>
                    </div>
                    <div class="link-slider-img">
                        <a class="main-top__slider-button" href="catalog-product.php?catId=<?= $item['CATID'] ?>">
                            <span>В каталог</span>
                            <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.0167 6.53933L8.97222 0.117105C8.82602 -0.0355172 8.57593 -0.0366506 8.4354 0.0993494C8.29184 0.237616 8.28164 0.491483 8.41764 0.636549L13.8599 6.42146H0.377778C0.169137 6.42146 0 6.5906 0 6.79924C0 7.00788 0.169137 7.17702 0.377778 7.17702H13.8599L8.41764 12.9615C8.28164 13.107 8.28996 13.3628 8.4354 13.4987C8.58047 13.6347 8.81431 13.6385 8.9726 13.481L15.017 7.05877C15.1606 6.88197 15.1228 6.6655 15.017 6.53933H15.0167Z" fill="white"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div id="block-tubs">
            <?php
            foreach ($SliderList as $key => $item) {
            ?>
                <div class="tubs-item">0<?= $key + 1 ?></div>
            <?php
            }
            ?>
        </div>
    </div>
<?php
}
