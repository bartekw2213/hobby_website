<?php
require_once 'controllers_utils.php';
require_once 'business.php';

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

function register_user(&$model)
{
    if (!is_register_form_correct($model)) {
        return show_register_or_login_form($model);
    }

    if (!is_email_free($_POST['email'])) {
        $model['form_error'] = "Podany email jest już zarejestrowany";
        return show_register_or_login_form($model);
    }

    if (!is_username_free($_POST['username'])) {
        $model['form_error'] = "Podana nazwa użytkownika jest już zajęta";
        return show_register_or_login_form($model);
    }

    save_user_to_db($_POST['email'], $_POST['username'], $_POST['password1']);
    save_id_to_session($_POST['email']);

    return 'redirect:/';
}

function login_user(&$model)
{
    if (is_email_free($_POST['email'])) {
        $model['form_error'] = "Podany email nie jest zarejestrowany";
        return show_register_or_login_form($model);
    }

    if (!is_password_correct($_POST['email'], $_POST['password1'])) {
        $model['form_error'] = "Podane hasło jest nie poprawne";
        return show_register_or_login_form($model);
    }

    save_id_to_session($_POST['email']);
    return 'redirect:/';
}

function logout_user()
{
    session_destroy();
    return 'redirect:/';
}

function show_add_photo_view(&$model)
{
    is_user_logged($model);
    return 'dodaj_zdjecie_view';
}
