<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_POST['token'])) {

    // unset($_SESSION['token']);
    // unset($_SESSION['user_id']);
    // unset($_SESSION['user_name']);
    // unset($_SESSION['user_role']);


    $_SESSION['token'] = $_POST['token']['access_token'];
    $_SESSION['user_id'] = $_POST['token']['user_id'];
    $_SESSION['user_name'] = $_POST['token']['user_name'];
    $_SESSION['user_role'] = $_POST['token']['user_role'];
    print_r($_SESSION);
}

if (isset($_POST['logout'])) {
    unset($_POST['token']);
    unset($_SESSION['token']);
    echo true;
}
