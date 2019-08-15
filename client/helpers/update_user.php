<?php


if (isset($_POST['user'])) {


    $_SESSION['user_id'] = $_POST['user']['id'];
    $_SESSION['user_name'] = $_POST['user']['name'];
    $_SESSION['user_role'] = $_POST['user']['role_id'];

    echo true;
}
