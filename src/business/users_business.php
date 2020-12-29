<?php

use MongoDB\BSON\ObjectID;

function get_users_collection()
{
    $mongo = new MongoDB\Client(
        "mongodb://localhost:27017/wai",
        [
            'username' => 'wai_web',
            'password' => 'w@i_w3b',
        ]
    );

    $db = $mongo->wai;

    return $db->users;
}

function is_email_free($email)
{
    $users = get_users_collection();
    return empty($users->findOne(["email" => $email]));
}

function is_username_free($username)
{
    $users = get_users_collection();
    return empty($users->findOne(["username" => $username]));
}

function save_user_to_db($email, $username, $password)
{
    $users = get_users_collection();

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $users->insertOne(["email" => $email, 'username' => $username, 'password' => $hashed_password]);
}

function is_password_correct($email, $password)
{
    $users = get_users_collection();

    $hashed_password = $users->findOne(["email" => $email])->password;
    return password_verify($password, $hashed_password);
}

function save_id_to_session($email)
{
    $users = get_users_collection();
    $user_id = (string)($users->findOne(["email" => $email])->_id);
    $_SESSION['user_id'] = $user_id;
}

function get_user_by_id($id)
{
    return get_users_collection()->findOne(['_id' => new ObjectID($id)], ["projection" => ['password' => 0]]);
}
