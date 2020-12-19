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
        <?php if (isset($photo_form_errors) && count($photo_form_errors) > 0) : ?>
            <div id="photoFormErrorsContainer" class="photo-form-errors-container">
                <?php foreach ($photo_form_errors as $error) : ?>
                    <div class="form-error-container">
                        <div class="form-error-inner-container">
                            <h3><?php echo $error ?></h3>
                            <div class="close-form-error-btn">X</div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        <?php endif; ?>

        <?php if (isset($photo_upload_successful)) : ?>
            <div id="successAlertFormContainer" class="success-alert-form-container">
                <h3>Zdjęcie zostało przesłane</h3>
                <img src="static/resources/images/sentIcon.png" alt="Przesłano Ikona">
            </div>
        <?php endif ?>

        <div class="form-container">
            <form action="dodaj_zdjecie" method="POST" enctype="multipart/form-data">
                <h1>Dodaj Zdjęcie</h1>
                <label for="photo">Wybierz zdjęcie</label>
                <input type="file" name="photo">
                <label for="author">Autor</label>
                <input type="text" name="author">
                <label for="title">Tytuł *</label>
                <input type="text" name="title">
                <label for="water_mark">Znak Wodny *</label>
                <input type="text" name="water_mark">
                <input type="submit" value="Prześlij">
            </form>
        </div>
    </div>

    <script src="static/js/global.js"></script>
    <script>
        const photoFormErrorsContainer = document.getElementById('photoFormErrorsContainer');
        const successAlertFormContainer = document.getElementById('successAlertFormContainer');

        if (successAlertFormContainer)
            window.addEventListener('load', deleteSuccessAlertAfter5Sec)

        if (photoFormErrorsContainer)
            attachListenersToFormErrors();

        function attachListenersToFormErrors() {
            const errorsElementsarray = Array.from(photoFormErrorsContainer.children);

            errorsElementsarray.forEach(error => {
                const removeErrorBtn = error.firstElementChild.lastElementChild;
                removeErrorBtn.addEventListener('click', () => error.style.display = 'none')
            })
        };

        function deleteSuccessAlertAfter5Sec() {
            setTimeout(() => successAlertFormContainer.style.display = 'none', 2000);
        }
    </script>
</body>

</html>