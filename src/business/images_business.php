<?php

function get_images_collection()
{
    $mongo = new MongoDB\Client(
        "mongodb://localhost:27017/wai",
        [
            'username' => 'wai_web',
            'password' => 'w@i_w3b',
        ]
    );

    $db = $mongo->wai;

    return $db->images;
}

function is_photo_title_free($title)
{
    $images = get_images_collection();
    return empty($images->findOne(["title" => $title]));
}

function save_img_info_to_db($photo_title, $author, $photo_extension)
{
    $images = get_images_collection();
    $original_path = IMAGE_DIR . $photo_title . $photo_extension;
    $water_mark_path = IMAGE_DIR . $photo_title . "_water_mark" . $photo_extension;
    $miniature_path = IMAGE_DIR . $photo_title . "_miniature" . $photo_extension;

    $images->insertOne([
        'title' => $photo_title,
        'author' => $author,
        'original_path' => $original_path,
        'water_mark_path' => $water_mark_path,
        'miniature_path' => $miniature_path
    ]);
}
