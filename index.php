<?php
require_once('config/gallery.php');
require_once('config/slider.php');
require_once('config/photos-category.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ironking</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div id="page">
        <?php
        require_once('header.php');
        ?>

        <div id="slider-block">
            <div class="inner">
                <?php
                addIndexSlider($SliderList);
                ?>
            </div>
        </div>

        <div id="category-img-block">
            <div class="inner">
                <div id="category-img">
                    <?php
                    addIndexPhotosCategory($PhotosCategoryList, $CategoryList);
                    ?>
                </div>
            </div>
        </div>

        <div id="project-block">
            <div class="inner">
                <div class="text-project-block">
                    <div class="title-project-block">
                        Наши проекты
                    </div>
                    <div class="button-project-block">
                        <div id="button-project-left"></div>
                        <div id="button-project-right"></div>
                    </div>
                </div>
                <div class="photos-project-block">
                    <div class="project-hidden-block">
                        <input type="hidden" id="count-sledes-photos" value="<?= countGallery($SlideGalaryrList) ?>">
                        <div id="sliders-photos-project-block">
                            <?php
                            addIndexGallery($SlideGalaryrList);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        require_once('footer.php');
        ?>
    </div>


    <svg style="visibility: hidden; position: absolute;" width="0" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1">
        <defs>
            <filter id="goo">
                <feGaussianBlur in="SourceGraphic" stdDeviation="4" result="blur"></feGaussianBlur>
                <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 7 -3" result="goo"></feColorMatrix>
                <feComposite in="SourceGraphic" in2="goo" operator="atop"></feComposite>
            </filter>
        </defs>
    </svg>

</body>

<script src="script/slider-img.js"></script>
<script src="script/slider-photos-project.js"></script>

</html>