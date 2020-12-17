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
    determine_what_form_should_view($model);
    return 'rejestracja_lub_login_view';
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
    save_user_email_to_session($_POST['email']);

    return 'redirect:/';
}

function logout_user()
{
    session_destroy();
    return 'redirect:/';
}
