<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_POST['token_register'])) {

    // unset($_SESSION['token']);
    // unset($_SESSION['user_id']);
    // unset($_SESSION['user_name']);
    // unset($_SESSION['user_role']);

    $arr = json_decode($_POST['token_register']);

    print_r($arr);
    $_SESSION['token'] = $arr->access_token;
    $_SESSION['user_id'] = $arr->user_id;
    $_SESSION['user_name'] = $arr->user_name;
    $_SESSION['user_role'] = $arr->user_role;
    echo true;
}


if (isset($_POST['token_login'])) {

    // unset($_SESSION['token']);
    // unset($_SESSION['user_id']);
    // unset($_SESSION['user_name']);
    // unset($_SESSION['user_role']);


    $_SESSION['token'] = $_POST['token_login']['access_token'];
    $_SESSION['user_id'] = $_POST['token_login']['user_id'];
    $_SESSION['user_name'] = $_POST['token_login']['user_name'];
    $_SESSION['user_role'] = $_POST['token_login']['user_role'];
    echo true;
}
if (isset($_POST['logout'])) {
    unset($_POST['token']);
    unset($_SESSION['token']);
    echo true;
}
