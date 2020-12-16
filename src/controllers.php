<?php
require_once 'controllers_utils.php';

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

    return 'redirect:/';
}
