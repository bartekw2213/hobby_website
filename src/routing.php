<?php

$routing = [
    '/' => 'show_home_view',
    '/kierunki' => 'show_kierunki_view',
    '/plecak' => 'show_plecak_view',
    '/rejestracja' => 'show_register_or_login_form',
    '/logowanie' => 'show_register_or_login_form',
    '/rejestruj_uzytkownika' => 'register_user',
    '/loguj_uzytkownika' => 'login_user',
    '/wyloguj_uzytkownika' => 'logout_user',
    '/formularz_zdjecia' => 'show_add_photo_view'
];
