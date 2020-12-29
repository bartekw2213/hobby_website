<?php

// @TODO change this file path after pushing to production 
const IMAGE_DIR = "images/";
const MAX_SIZE = 1000000;

require_once realpath(dirname(__FILE__) . '/utils/images_controllers_utils.php');
require_once realpath(dirname(__FILE__) . '/utils/view_controllers_utils.php');
require_once '../business/images_business.php';

function add_photo(&$model)
{
    $photo = $_FILES['photo'];
    $photo_title = $_POST['title'];
    $author = $_POST['author'];
    $photo_extension = get_file_extension($photo);
    $target = IMAGE_DIR . $photo_title . $photo_extension;
    $tmp_path = $photo['tmp_name'];

    $model['photo_form_errors'] = [];
    check_photo_form($model, $photo_title, $photo);
    change_author_if_needed($author);

    if (!isset($_POST['user_id']))
        $_POST['user_id'] = 0;

    if (!isset($_POST['is_private']))
        $_POST['is_private'] = "false";

    if (count($model['photo_form_errors']) < 1) {
        if (!move_uploaded_file($tmp_path, $target))
            array_push($model['photo_form_errors'], "Nie udało się przesłać pliku");
        else {
            $model['photo_upload_successful'] = true;
            create_watermark_image($photo_title, $target, $photo_extension, $_POST['water_mark']);
            create_miniature_image($photo_title, $target, $photo_extension);
            save_img_info_to_db($photo_title, $author, $photo_extension, $_POST['user_id'], $_POST['is_private']);
        }
    }

    return show_add_photo_view($model);
}

function save_new_photos_to_session(&$session_photos_array, &$new_selected_photos)
{
    foreach ($new_selected_photos as $id)
        if (!in_array($id, $session_photos_array))
            array_push($session_photos_array, $id);
}

function delete_unchecked_photos_from_session(&$session_photos_array, $selected_photos, $photos_on_current_page)
{
    foreach ($session_photos_array as $i => $id_val)
        if (!in_array($id_val, $selected_photos) && in_array($id_val, $photos_on_current_page)) {
            unset($session_photos_array[$i]);
        }
}

function save_photos_to_session(&$model)
{
    if (!isset($_POST['change_photo_privacy']))
        $_POST['change_photo_privacy'] = [];

    if (!isset($_POST['private_photos_on_page']))
        $_POST['private_photos_on_page'] = [];

    handle_privacy_of_photos($_POST['change_photo_privacy'], $_POST['private_photos_on_page']);

    $session_photos_ids_string = 'session_photos_ids';

    if (!isset($_SESSION[$session_photos_ids_string]))
        $_SESSION[$session_photos_ids_string] = [];

    if (isset($_POST[$session_photos_ids_string])) {
        save_new_photos_to_session($_SESSION[$session_photos_ids_string], $_POST[$session_photos_ids_string]);
        delete_unchecked_photos_from_session($_SESSION[$session_photos_ids_string], $_POST[$session_photos_ids_string], $_POST['photos_on_page_ids']);
    } else
        delete_unchecked_photos_from_session($_SESSION[$session_photos_ids_string], [], $_POST['photos_on_page_ids']);


    return show_galeria_view($model);
}

function delete_photos_from_session(&$model)
{
    $session_photos_ids_string = 'session_photos_ids';

    if (!isset($_SESSION[$session_photos_ids_string]))
        $_SESSION[$session_photos_ids_string] = [];

    if (isset($_POST[$session_photos_ids_string])) {
        save_new_photos_to_session($_SESSION[$session_photos_ids_string], $_POST[$session_photos_ids_string]);
        delete_unchecked_photos_from_session($_SESSION[$session_photos_ids_string], $_POST[$session_photos_ids_string], $_POST['photos_on_page_ids']);
    } else
        delete_unchecked_photos_from_session($_SESSION[$session_photos_ids_string], [], $_POST['photos_on_page_ids']);

    return show_photos_cart_view($model);
}

// Functions that handles privacy of photos

function find_public_photos($ids_of_private_photos, $ids_of_all_users_photos_on_page)
{
    $public_photos = [];

    foreach ($ids_of_all_users_photos_on_page as $photo_id)
        if (!in_array($photo_id, $ids_of_private_photos))
            array_push($public_photos, $photo_id);

    return $public_photos;
}

function handle_privacy_of_photos($ids_of_private_photos, $ids_of_all_users_photos_on_page)
{
    if (!$ids_of_private_photos)
        $ids_of_private_photos = [];

    if (!$ids_of_all_users_photos_on_page)
        return;

    make_this_photos_private($ids_of_private_photos);
    make_this_photos_public(find_public_photos($ids_of_private_photos, $ids_of_all_users_photos_on_page));
}
