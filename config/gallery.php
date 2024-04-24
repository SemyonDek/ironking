<?php

require_once('connect.php');

$SlideGalaryrList = mysqli_query($ConnectDatabase, "SELECT * FROM `gallery`");
$SlideGalaryrList = mysqli_fetch_all($SlideGalaryrList, MYSQLI_ASSOC);


function addListGalleryAdm($SliderList)
{
    foreach ($SliderList as $item) {
?>
        <div class="list-category-item">
            <div class="list-category-img">
                <img src="../<?= $item['SRC'] ?>" alt="">
            </div>
            <button class="button-del" type="button" onclick="delGallery(<?= $item['ID'] ?>)">Удалить</button>
        </div>
    <?php
    }
}

function addIndexGalleryAdm($SliderList)
{
    foreach ($SliderList as $item) {
    ?>
        <div class="item-slider-photos-project" style="background-image: url('../<?= $item['SRC'] ?>');"></div>
    <?php
    }
}

function addIndexGallery($SliderList)
{
    foreach ($SliderList as $item) {
    ?>
        <div class="item-slider-photos-project" style="background-image: url('<?= $item['SRC'] ?>');"></div>
<?php
    }
}

function countGallery($SliderList)
{
    $countGallery = count($SliderList);
    if ($countGallery > 8) {
        $countGallery -= 8;
        $countGallery =  1 + intval($countGallery / 2) + ($countGallery % 2);
        return $countGallery;
    } else {
        return 1;
    }
}
