<?php
require_once('../../config/connect.php');

$imgGallery = $_FILES['img-gallery'];
$srcImgGallery = '';

$typeFIle = substr($imgGallery['name'], strrpos($imgGallery['name'], '.') + 1);

$prov = True;
while ($prov) {
    $fileName = uniqid() . '.' . $typeFIle;
    $fileUrl = '../../img/project-photos/' . $fileName;
    $srcImgGallery = 'img/project-photos/' . $fileName;

    if (!file_exists($fileUrl)) {
        move_uploaded_file($imgGallery['tmp_name'], $fileUrl);

        $prov = False;
    }
}

mysqli_query($ConnectDatabase, "INSERT INTO `gallery` (`ID`, `SRC`) VALUES (NULL, '$srcImgGallery')");

require_once('../../config/gallery.php');

?>

<div id="list-category-block">
    <?php
    addListGalleryAdm($SliderList);
    ?>
</div>