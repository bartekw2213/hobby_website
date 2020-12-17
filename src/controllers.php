<?php
require_once 'controllers_utils.php';
require_once 'business.php';

function show_home_view(&$model)
{

    return 'home_view';
}

function show_kierunki_view(&$model)
{


    return 'kierunki_view';
}

function show_plecak_view(&$model)
{

    return 'plecak_view';
}

function show_register_form(&$model)
{


    return 'rejestracja_view';
}

function register_user(&$model)
{
    if (!is_form_correct($model))
        return 'rejestracja_view';

    if (!is_email_free($_POST['email'])) {
        $model['form_error'] = "Podany email jest już zarejestrowany";
        return 'rejestracja_view';
    }

    if (!is_username_free($_POST['username'])) {
        $model['form_error'] = "Podana nazwa użytkownika jest już zajęta";
        return 'rejestracja_view';
    }

    save_user_to_db($_POST['email'], $_POST['username'], $_POST['password1']);

    return 'redirect:/';
}
