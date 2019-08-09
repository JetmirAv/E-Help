<?php


$token = $_SESSION['token'];

$header = "Authorization: Bearer "  . $_SESSION['token'];
$response = json_decode(callAPI('GET', '/api/chat', false, $header), true);

$contacts = $response['contacts'];
$chats = $response['chats'];
$lastContact = null;

foreach ($contacts as $cont) {
    if ($cont['id']=== $response['otherContact'])
        $lastContact = $cont;
}

$last_chat = end($chats);
// $otherContacts = array_filter($contacts, function($e) use ($cont){
//     return $e !== $cont;
// });



require('chat.php');
