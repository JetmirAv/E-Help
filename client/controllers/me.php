<?php
$token = $_SESSION['token'];

$header = "Authorization: Bearer "  . $_SESSION['token'];
$response = json_decode(callAPI('POST', '/api/auth/me', false, $header), true);

// print_r($header);

require('./view/profile.php');
