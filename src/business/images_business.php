<?php

use MongoDB\BSON\ObjectID;

const IMAGES_PER_PAGE_LIMIT = 8;

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

function save_img_info_to_db($photo_title, $author, $photo_extension, $user_id, $is_private)
{
    if (!$user_id) {
        $user_id = 0;
        $is_private = 'false';
    }

    $images = get_images_collection();
    $original_path = IMAGE_DIR . $photo_title . $photo_extension;
    $water_mark_path = IMAGE_DIR . $photo_title . "_water_mark" . $photo_extension;
    $miniature_path = IMAGE_DIR . $photo_title . "_miniature" . $photo_extension;

    $images->insertOne([
        'title' => $photo_title,
        'author' => $author,
        'original_path' => $original_path,
        'water_mark_path' => $water_mark_path,
        'miniature_path' => $miniature_path,
        'sent_by_id' => $user_id,
        'is_private' => $is_private
    ]);
}

function fetch_images_info($pageNum)
{
    $skip = IMAGES_PER_PAGE_LIMIT * ($pageNum - 1);

    $images = get_images_collection()->find([], ['skip' => $skip, 'limit' => IMAGES_PER_PAGE_LIMIT])->toArray();
    return $images;
}

function check_if_next_page_exists($current_page_num)
{
    $skip = IMAGES_PER_PAGE_LIMIT * $current_page_num;
    $image = get_images_collection()->findOne([], ['skip' => $skip, 'limit' => IMAGES_PER_PAGE_LIMIT]);

    if ($image)
        return true;

    return false;
}

function fetch_images_info_by_ids($idsArray)
{
    foreach ($idsArray as $i => $id)
        $idsArray[$i] = new ObjectID($id);

    return get_images_collection()->find(["_id" => ['$in' => array_values($idsArray)]])->toArray();
}
