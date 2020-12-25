<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/global-styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&family=Ranchers&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="static/css/koszyk-zdjec.css">
    <link rel="stylesheet" href="static/css/photos.css">
    <link rel="icon" type="image/png" href="static/resources/images/siteLogo.png" />
    <title>Blogostop</title>
</head>

<body>
    <?php include '../views/partials/navigation_view.php'; ?>

    <div class="container">
        <header class="photos-cart-introduction">
            <h1>Koszyk zdjęć</h1>
        </header>
    </div>

    <div class="container no-shadow">
        <form action="usun_zdjecia_sesji" method="POST" class="photos-cart-form">
            <input type="submit" value="Zapomnij odznaczone zdjęcia" class="save-photos-btn" />

            <?php include '../views/partials/photos_view.php' ?>
        </form>
    </div>

    <script src="static/js/global.js"></script>
</body>

</html>