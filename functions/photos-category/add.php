<?php
require_once('../../config/connect.php');

$PhotosCategoryList = mysqli_query($ConnectDatabase, "SELECT * FROM `category_img`");
$PhotosCategoryList = mysqli_fetch_all($PhotosCategoryList, MYSQLI_ASSOC);

if (count($PhotosCategoryList) < 4) {
    $idCat = $_POST['idCat'];
    $imgCategory = $_FILES['category-img'];
    $srcImgCategory = '';

    $typeFIle = substr($imgCategory['name'], strrpos($imgCategory['name'], '.') + 1);

    $prov = True;
    while ($prov) {
        $fileName = uniqid() . '.' . $typeFIle;
        $fileUrl = '../../img/category-img/' . $fileName;
        $srcImgCategory = 'img/category-img/' . $fileName;

        if (!file_exists($fileUrl)) {
            move_uploaded_file($imgCategory['tmp_name'], $fileUrl);

            $prov = False;
        }
    }

    mysqli_query($ConnectDatabase, "INSERT INTO `category_img` (`ID`, `CATID`, `SRC`) VALUES (NULL, '$idCat', '$srcImgCategory')");

    require_once('../../config/photos-category.php');

?>

    <div id="list-category-block">
        <?php
        addListPhotosCategoryAdm($PhotosCategoryList, $CategoryList);
        ?>
    </div>

<?php
}
