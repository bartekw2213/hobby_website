<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
    <link rel="stylesheet" href="static/css/global-styles.css">
    <link rel="stylesheet" href="static/css/plecak.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&family=Ranchers&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="icon" type="image/png" href="static/resources/images/siteLogo.png" />
    <title>BlogoStop</title>
</head>

<body>
    <div class="container">
        <?php include '../views/partials/navigation_view.php'; ?>

        <header id="backpackLanding" class="backpack-landing">
            <h1>Wirtualny plecak</h1>
            <p>Tutaj możesz stworzyć swoją wirtualną listę rzeczy które zabierzesz na kolejny wyjazd. Do listy będziesz miał dostęp
                za każdym razem gdy odwiedzisz stronę!
            </p>
            <img id="leftArrow" class="arrow" src="static/resources/images/backpackArrow.svg" alt="Arrow">
            <img id="rightArrow" class="arrow" src="static/resources/images/backpackArrow.svg" alt="Arrow">
        </header>

    </div>

    <div class="container no-shadow">
        <table id="backpackTable" cellspacing=0>
            <thead>
                <tr>
                    <th>Nazwa</th>
                    <th>Waga</th>
                    <th>Priorytet</th>
                    <th>Czy już spakowane?</th>
                    <th>Ilość</th>
                    <th>Kolor</th>
                    <th>Dodatkowe notatki</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="tableBody">

            </tbody>
        </table>

        <form id="backpackForm" class="backpack-form">
            <div class="row">
                <div class="col">
                    <input type="text" id="name" placeholder="Nazwa przedmiotu...">
                    <input type="number" id="weight" placeholder="Waga przedmiotu...">
                    <label for="priority">Wybierz priorytet:</label>
                    <select name="priority" id="priority">
                        <option value="1">1</option>
                        <option value="2" selected>2</option>
                        <option value="3">3</option>
                    </select>
                    <p>Czy przedmiot został spakowany?</p>
                    <div class="radio-section">
                        <div class="radio-choice">
                            <input type="radio" id="packed1" name="packed" value="Tak">
                            <label for="packed1">Tak</label><br>
                        </div>
                        <div class="radio-choice">
                            <input type="radio" id="packed2" name="packed" value="Nie">
                            <label for="packed2">Nie</label><br>
                        </div>
                    </div>
                    <input type="reset" value="Wyczyść Formularz">
                </div>
                <div class="col">
                    <input type="number" id="quantity" placeholder="Ilość">
                    <div class="color-section">
                        <label for="color">Kolor przedmiotu: </label>
                        <input type="color" id="color" placeholder="Kolor">
                    </div>
                    <textarea id="notes" cols="30" rows="10">Dodatkowe notatki</textarea>
                </div>
            </div>
            <button type="submit">Dodaj przedmiot</button>
        </form>
        <div id="dialog" title="Formularz">Dialog Tekst</div>
    </div>

    <script src="static/js/plecak.js"></script>
    <script src="static/js/global.js"></script>
</body>

</html>