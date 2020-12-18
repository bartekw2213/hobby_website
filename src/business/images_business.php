<?php

function get_images_db()
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
    $db = get_images_db();
    return empty($db->findOne(["title" => $title]));
}
