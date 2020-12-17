<?php

require_once 'controllers_utils.php';
require_once '../business/users_business.php';

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
