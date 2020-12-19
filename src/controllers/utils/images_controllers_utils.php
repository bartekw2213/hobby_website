<?php

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

function check_photo_form(&$model, $photo_title, $photo)
{
    if (empty($photo_title))
        array_push($model['photo_form_errors'], "Musisz nadać zdjęciu tytuł");
    else if (!is_photo_title_free($photo_title))
        array_push($model['photo_form_errors'], "Istnieje obraz o podanym tytule");

    if ($photo['size'] > MAX_SIZE)
        array_push($model['photo_form_errors'], "Plik nie może być większy niż 1MB");

    if (!is_file_mime_type_allowed($photo))
        array_push($model['photo_form_errors'], "Dozwolone są tylko pliki formatu JPG lub PNG");

    if (empty($_POST['water_mark']))
        array_push($model['photo_form_errors'], "Dodanie znaku wodnego jest obowiązkowe");
}

function create_stamp($text)
{
    $stamp = imagecreatetruecolor(strlen($text) * 25, 80);
    imagefilledrectangle($stamp, 0, 0, strlen($text) * 40, 80, 0xcc4452);
    imagettftext($stamp, 32, 0, 10, 50, 0xf9e4ad, "static/resources/fonts/Ranchers-Regular.ttf", $text);

    return $stamp;
}

function merge_stamp($stamp, &$image)
{
    $marge_right = 50;
    $marge_bottom = 50;
    $sx = imagesx($stamp);
    $sy = imagesy($stamp);

    imagecopymerge($image, $stamp, imagesx($image) - $sx - $marge_right, imagesy($image) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 60);
}

function create_image_copy($photo_extension, $path_to_file)
{
    if ($photo_extension === ".jpg")
        return imagecreatefromjpeg($path_to_file);
    else
        return imagecreatefrompng($path_to_file);
}

function create_watermark_image($photo_title, $path_to_file, $photo_extension, $water_mark_text)
{
    $water_mark_image = create_image_copy($photo_extension, $path_to_file);

    $stamp = create_stamp($water_mark_text);
    merge_stamp($stamp, $water_mark_image);

    if ($photo_extension === ".jpg")
        imagejpeg($water_mark_image, "/var/www/dev/src/web/images/" . $photo_title . "_water_mark.jpg");
    else
        imagepng($water_mark_image, "/var/www/dev/src/web/images/" . $photo_title . "_water_mark.png");
}

function create_miniature_image($photo_title, $path_to_file, $photo_extension)
{
    $resized_image = create_image_copy($photo_extension, $path_to_file);
    $resized_image = imagescale($resized_image, 250, 125);

    if ($photo_extension === ".jpg")
        imagejpeg($resized_image, "/var/www/dev/src/web/images/" . $photo_title . "_miniature.jpg");
    else
        imagepng($resized_image, "/var/www/dev/src/web/images/" . $photo_title . "_miniature.png");
}
