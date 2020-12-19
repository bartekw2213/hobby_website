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
