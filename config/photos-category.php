<?php
require_once('connect.php');
require_once('category.php');

$PhotosCategoryList = mysqli_query($ConnectDatabase, "SELECT * FROM `category_img`");
$PhotosCategoryList = mysqli_fetch_all($PhotosCategoryList, MYSQLI_ASSOC);

function addListPhotosCategoryAdm($PhotosCategoryList, $CategoryList)
{
    foreach ($PhotosCategoryList as $itemPhotos) {
        foreach ($CategoryList as $itemCat) {
            if ($itemCat['ID'] == $itemPhotos['CATID']) {
?>
                <div class="list-category-item">
                    <div class="list-category-img">
                        <img src="../<?= $itemPhotos['SRC'] ?>" alt="">
                    </div>
                    <div class="list-category-name">
                        <div class="list-category-name-text">
                            <?= $itemCat['NAME'] ?>
                        </div>
                    </div>
                    <button class="button-del" type="button" onclick="delPhotosCategory(<?= $itemPhotos['ID'] ?>)">Удалить</button>
                </div>
            <?php
            }
        }
    }
}
function addIndexPhotosCategoryAdm($PhotosCategoryList, $CategoryList)
{
    foreach ($PhotosCategoryList as $itemPhotos) {
        foreach ($CategoryList as $itemCat) {
            if ($itemCat['ID'] == $itemPhotos['CATID']) {
            ?>
                <div class="category-img-item">
                    <a href="">
                        <div class="category-img-div" style="background-image: url('../<?= $itemPhotos['SRC'] ?>');"></div>
                        <div class="block-category-img-text">
                            <div class="category-img-text"><?= $itemCat['NAME'] ?></div>
                        </div>
                    </a>
                </div>
            <?php
            }
        }
    }
}
function addIndexPhotosCategory($PhotosCategoryList, $CategoryList)
{
    foreach ($PhotosCategoryList as $itemPhotos) {
        foreach ($CategoryList as $itemCat) {
            if ($itemCat['ID'] == $itemPhotos['CATID']) {
            ?>
                <div class="category-img-item">
                    <a href="catalog-product.php?catId=<?= $itemPhotos['CATID'] ?>">
                        <div class="category-img-div" style="background-image: url('<?= $itemPhotos['SRC'] ?>');"></div>
                        <div class="block-category-img-text">
                            <div class="category-img-text"><?= $itemCat['NAME'] ?></div>
                        </div>
                    </a>
                </div>
<?php
            }
        }
    }
}
