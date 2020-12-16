<?php

function is_form_correct(&$model)
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
