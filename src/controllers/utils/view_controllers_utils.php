<?php

function is_user_logged(&$model)
{
    if (isset(($_SESSION['user_id']))) {
        $model['is_logged'] = true;
        return true;
    } else {
        $model['is_logged'] = false;
        return false;
    }
}

function get_images_page_num($url)
{
    $url_components = parse_url($url);
    parse_str($url_components['query'], $params);
    return $params['strona'];
}
