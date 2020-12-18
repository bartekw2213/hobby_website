<?php

function get_users_db()
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
    $db = get_users_db();
    return empty($db->findOne(["email" => $email]));
}

function is_username_free($username)
{
    $db = get_users_db();
    return empty($db->findOne(["username" => $username]));
}

function save_user_to_db($email, $username, $password)
{
    $db = get_users_db();

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $db->insertOne(["email" => $email, 'username' => $username, 'password' => $hashed_password]);
}

function is_password_correct($email, $password)
{
    $db = get_users_db();

    $hashed_password = $db->findOne(["email" => $email])->password;
    return password_verify($password, $hashed_password);
}

function save_id_to_session($email)
{
    $db = get_users_db();
    $user_id = (string)($db->findOne(["email" => $email])->_id);
    $_SESSION['user_id'] = $user_id;
}
