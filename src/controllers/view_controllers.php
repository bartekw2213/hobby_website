<?php

require_once 'controllers_utils.php';

function show_home_view(&$model)
{
    is_user_logged($model);
    return 'home_view';
}

function show_kierunki_view(&$model)
{
    is_user_logged($model);
    return 'kierunki_view';
}

function show_plecak_view(&$model)
{
    is_user_logged($model);
    return 'plecak_view';
}

function show_register_or_login_form(&$model)
{
    if (is_user_logged($model))
        return 'redirect:/';

    determine_what_form_should_view($model);
    return 'rejestracja_lub_login_view';
}

function show_add_photo_view(&$model)
{
    is_user_logged($model);
    return 'dodaj_zdjecie_view';
}
