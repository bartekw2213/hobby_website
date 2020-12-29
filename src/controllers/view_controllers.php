<?php

require_once '../business/images_business.php';
require_once '../business/users_business.php';
require_once realpath(dirname(__FILE__) . '/utils/view_controllers_utils.php');

function show_home_view(&$model)
{
    is_user_logged($model);
    return 'home_view';
}

function show_galeria_view(&$model)
{
    $user_id = 0;
    if (isset($_SESSION['user_id']))
        $user_id = $_SESSION['user_id'];

    $pageNum = get_images_page_num("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
    $model['images_info'] = fetch_images_info($pageNum, $user_id);
    $model['current_page'] = $pageNum;
    $model['next_page_exists'] = check_if_next_page_exists($pageNum);
    is_user_logged($model);
    return 'galeria_view';
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
    if (is_user_logged($model)) {
        $model['user_username'] = get_user_by_id($_SESSION['user_id'])->username;
        $model['user_id'] = $_SESSION['user_id'];
    }

    return 'dodaj_zdjecie_view';
}

function show_photos_cart_view(&$model)
{
    if (isset($_SESSION['session_photos_ids']))
        $model['images_info'] = fetch_images_info_by_ids($_SESSION['session_photos_ids']);
    is_user_logged($model);
    return 'koszyk_zdjec_view';
}
