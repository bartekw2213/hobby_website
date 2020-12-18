<?php

require_once 'controllers_utils.php';
require_once '../business/images_business.php';

// @TODO change this file path after pushing to production 
const IMAGE_DIR = "/var/www/dev/src/web/images/";
const MAX_SIZE = 1000000;

function add_photo(&$model)
{
    $photo = $_FILES['photo'];
    $photo_title = $_POST['title'];
    $photo_extension = get_file_extension($photo);
    $target = IMAGE_DIR . $photo_title . $photo_extension;
    $tmp_path = $photo['tmp_name'];

    $model['photo_form_errors'] = [];

    if (!is_photo_title_free($photo_title))
        array_push($model['photo_form_errors'], "Istnieje obraz o podanym tytule");

    if ($photo['size'] > MAX_SIZE)
        array_push($model['photo_form_errors'], "Plik nie może być większy niż 1MB");

    if (!is_file_mime_type_allowed($photo))
        array_push($model['photo_form_errors'], "Dozwolone są tylko pliki formatu JPG lub PNG");

    if (!move_uploaded_file($tmp_path, $target))
        array_push($model['photo_form_errors'], "Nie udało się przesłać pliku");
    else
        $model['photo_upload_successful'] = true;

    return show_add_photo_view($model);
}
