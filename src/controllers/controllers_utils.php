<?php

function is_user_logged(&$model)
{
    if (isset(($_SESSION['user_id']))) {
        $model['is_logged'] = true;
        return true;
    } else {
        $model['is_logged'] = false;
        return false;
    }
}

function is_register_form_correct(&$model)
{
    if (strlen($_POST['username']) < 5 || strlen($_POST['username']) > 20)
        $model['form_error'] = "Nazwa użytkownika jest nieprawidłowa (musi zawierać od 5 do 20 znaków)";
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        $model['form_error'] = "Adres email jest niepoprawny";
    if (strlen($_POST['password1']) < 5 || strlen($_POST['password1']) > 20)
        $model['form_error'] = "Hasło jest nieprawidłowe (musi zawierać od 5 do 20 znaków)";
    if (strcmp($_POST['password1'], $_POST['password2']) !== 0)
        $model['form_error'] = "Podane hasła nie są takie same";

    if (isset($model['form_error']))
        return false;

    return true;
}

function determine_what_form_should_view(&$model)
{
    if (strcmp($_SERVER['REQUEST_URI'], '/rejestracja') === 0 || strcmp($_SERVER['REQUEST_URI'], '/rejestruj_uzytkownika') === 0)
        $model['form_type'] = 'registration_form';

    if (strcmp($_SERVER['REQUEST_URI'], '/logowanie') === 0 || strcmp($_SERVER['REQUEST_URI'], '/loguj_uzytkownika') === 0)
        $model['form_type'] = 'login_form';
}

function get_file_mime_type($file)
{
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $file_name = $file['tmp_name'];
    return finfo_file($finfo, $file_name);
}

function is_file_mime_type_allowed($file)
{
    $allowed_mime_types = ["image/jpeg", "image/png"];
    $file_mime_type = get_file_mime_type($file);
    return in_array($file_mime_type, $allowed_mime_types);
}

function get_file_extension($file)
{
    $file_mime_type = get_file_mime_type($file);
    switch ($file_mime_type) {
        case 'image/jpeg':
            return '.jpg';
        case 'image/png':
            return '.png';
        default:
            return '';
    }
}
