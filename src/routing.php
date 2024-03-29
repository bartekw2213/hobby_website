<?php

$routing = [
    '/' => 'show_home_view',
    '/galeria' => 'show_galeria_view',
    '/kierunki' => 'show_kierunki_view',
    '/plecak' => 'show_plecak_view',
    '/rejestracja' => 'show_register_or_login_form',
    '/logowanie' => 'show_register_or_login_form',
    '/rejestruj_uzytkownika' => 'register_user',
    '/loguj_uzytkownika' => 'login_user',
    '/wyloguj_uzytkownika' => 'logout_user',
    '/formularz_zdjecia' => 'show_add_photo_view',
    '/koszyk_zdjec' => 'show_photos_cart_view',
    '/dodaj_zdjecie' => 'add_photo',
    '/zachowaj_zdjecia_sesji' => 'save_photos_to_session',
    '/usun_zdjecia_sesji' => 'delete_photos_from_session'
];
