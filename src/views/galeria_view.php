<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/global-styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&family=Ranchers&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="static/css/galeria.css">
    <link rel="icon" type="image/png" href="static/resources/images/siteLogo.png" />
    <title>Blogostop</title>
</head>

<body>
    <?php include '../views/partials/navigation_view.php'; ?>

    <div class="container">
        <header class="gallery-introduction">
            <h1>Galeria</h1>
        </header>
    </div>

    <div class="container no-shadow">
        <div class="gallery-images-container">
            <?php foreach ($images_info as $image) : ?>
                <div class="gallery-card">
                    <div class="top">
                        <?php echo "<a href=\"$image->water_mark_path\" target=\"_blank\" >" ?>
                        <?php echo "<img src=\"$image->miniature_path\" />" ?>
                        <?php echo "</a>" ?>
                    </div>
                    <div class="bottom">
                        <div class="bottom-row">
                            <span class="gallery-property-header">Tytuł: </span><span><?php echo $image->title ?></span>
                        </div>
                        <div class="bottom-row">
                            <span class="gallery-property-header">Autor: </span><span><?php echo $image->author ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>

        <div class="gallery-buttons">
            <?php if ($current_page > 1) : ?>
                <?php
                $previous_page = $current_page - 1;
                echo "<a href=\"galeria?strona=$previous_page\" ><<</a>"
                ?>
            <?php endif ?>
            <a href="#"><?php echo $current_page ?></a>
            <?php if ($next_page_exists) : ?>
                <?php
                $next_page = $current_page + 1;
                echo "<a href=\"galeria?strona=$next_page\" >>></a>"
                ?>
            <?php endif ?>
        </div>
    </div>

    <script src="static/js/global.js"></script>
</body>

</html>