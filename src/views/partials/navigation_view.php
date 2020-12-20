<div class="navigation" id="navigation">
    <a class="page-title" href="/">
        <h1><span>Blogo</span>Stop</h1>
        <img alt="Logo Strony" class="page-logo" src="static/resources/images/siteLogo.png">
    </a>
    <nav id="navigationNav">
        <a href="/galeria">
            <p>Galeria</p>
            <img src="static/resources/images/navGallery.png" alt="Galeria Ikona">
            <div class="nav-divider"></div>
        </a>
        <a href="/kierunki">
            <p>Kierunki</p>
            <img src="static/resources/images/navDestinations.png" alt="Kierunki Ikona">
            <div class="nav-divider"></div>
        </a>
        <a href="/plecak">
            <p>Plecak</p>
            <img src="static/resources/images/navBackpack.png" alt="Plecak Ikona">
            <div class="nav-divider"></div>
        </a>
        <div id="userMenu">
            <img src="static/resources/images/navUser.png" alt="Uzytkownik Ikona" />
            <div class="nav-divider"></div>
            <div id="userMenuOptions" class="not-visible">
                <a href="/formularz_zdjecia">
                    <p>Dodaj zdjęcie</p>
                    <img src="static/resources/images/addPhotoIcon.png" alt="Dodaj Zdjęcie Ikona">
                </a>
                <?php if (!$is_logged) : ?>
                    <a href="/rejestracja">
                        <p>Rejestracja</p>
                        <img src="static/resources/images/registrationIcon.png" alt="Rejestracja Ikona">
                    </a>
                    <a href="/logowanie">
                        <p>Logowanie</p>
                        <img src="static/resources/images/loginIcon.png" alt="Logowanie Ikona">
                    </a>
                <?php endif; ?>
                <?php if ($is_logged) : ?>
                    <a href="/wyloguj_uzytkownika">
                        <p>Wyloguj</p>
                        <img src="static/resources/images/logoutIcon.png" alt="Wyloguj Ikona">
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</div>