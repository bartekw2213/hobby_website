<?php

require_once realpath(dirname(__FILE__) . '/utils/images_controllers_utils.php');
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
    check_photo_form($model, $photo_title, $photo);

    if (count($model['photo_form_errors']) < 1) {
        if (!move_uploaded_file($tmp_path, $target))
            array_push($model['photo_form_errors'], "Nie udało się przesłać pliku");
        else {
            $model['photo_upload_successful'] = true;
            create_watermark_image($photo_title, $target, $photo_extension, $_POST['water_mark']);
        }
    }


    return show_add_photo_view($model);
}
