<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="static/resources/images/siteLogo.png" />
    <link rel="stylesheet" href="static/css/global-styles.css">
    <link rel="stylesheet" href="static/css/registration-form.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&family=Ranchers&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&display=swap" rel="stylesheet">
    <title>BlogoStop</title>
</head>

<body class="no-padding">
    <div class="container ">
        <?php include '../views/partials/navigation_view.php'; ?>

        <div class="registration-container">
            <form action="register_user" method="post">
                <h1>Rejestracja</h1>
                <label for="email">Twój email:</label>
                <input type="email" name="email">
                <label for="email">Nazwa użytkownika:</label>
                <input type="text" name="login">
                <label for="email">Hasło:</label>
                <input type="password" name="password1">
                <label for="email">Powtórz hasło:</label>
                <input type="password" name="password2">
                <input type="submit" value="Kontynuuj">
            </form>
        </div>
    </div>
</body>

<script src="static/js/global.js"></script>

</html>