<?php 

$id = explode('/', trim($_SERVER['REQUEST_URI'], '/'))[1];


$token = $_SESSION['token'];

$header = "Authorization: Bearer "  . $_SESSION['token'];
$response = json_decode(callAPI('GET', '/api/doctor/' . $id, false, $header), true)['data'];
require('./profile.php');