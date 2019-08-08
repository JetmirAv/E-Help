<?php
$token = $_SESSION['token'];

$header = "Authorization: Bearer "  . $_SESSION['token'];
$response = json_decode(callAPI('POST', '/api/auth/me', false, $header), true);

require('profile.php');
