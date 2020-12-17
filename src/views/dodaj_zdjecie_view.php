<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
    <link rel="stylesheet" href="static/css/global-styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&family=Ranchers&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="static/css/form.css">
    <title>BlogoStop</title>
</head>

<body class="no-padding">
    <div class="container">
        <?php include '../views/partials/navigation_view.php'; ?>

        <div class="form-container">
            <form action="dodaj_zdjecie" method="POST" enctype="multipart/form-data">
                <h1>Dodaj Zdjęcie</h1>
                <label for="photo">Wybierz zdjęcie</label>
                <input type="file" name="photo">
                <input type="submit" value="Prześlij">
            </form>
        </div>
    </div>

    <script src="static/js/global.js"></script>
</body>

</html>