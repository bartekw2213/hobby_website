<?php

function get_db()
{
    $mongo = new MongoDB\Client(
        "mongodb://localhost:27017/wai",
        [
            'username' => 'wai_web',
            'password' => 'w@i_w3b',
        ]
    );

    $db = $mongo->wai;

    return $db;
}

function is_email_free($email)
{
    $db = get_db();
    return empty($db->users->findOne(["email" => $email]));
}

function is_username_free($username)
{
    $db = get_db();
    return empty($db->users->findOne(["username" => $username]));
}

function save_user_to_db($email, $username, $password)
{
    $db = get_db();

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $db->users->insertOne(["email" => $email, 'username' => $username, 'password' => $hashed_password]);
}

function is_password_correct($email, $password)
{
    $db = get_db();

    $hashed_password = $db->users->findOne(["email" => $email])->password;
    return password_verify($password, $hashed_password);
}
