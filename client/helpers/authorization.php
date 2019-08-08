<?php
session_start();

if (isset($_POST['token'])) {
    $_SESSION['token'] = $_POST['token']['access_token'];
    $_SESSION['user_id'] = $_POST['token']['user_id'];
    $_SESSION['user_name'] = $_POST['token']['user_name'];
    $_SESSION['user_role'] = $_POST['token']['user_role'];
    echo true;
} 

if(isset($_POST['logout'])){
    unset($_POST['token']);
    unset($_SESSION['token']);
    echo true;
}