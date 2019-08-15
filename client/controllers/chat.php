<?php

if (!isset($_SESSION['token'])) {
	?>
<script>
	window.location.replace("login");
</script>
<?php
	die();
}


$token = $_SESSION['token'];

$header = "Authorization: Bearer "  . $_SESSION['token'];
$response = json_decode(callAPI('GET', '/api/chat', false, $header), true);


$contacts = $response['contacts'];
$chats = $response['chats'];
$role = $response['this_role'];
$lastContact = null;
if ($contacts) {

	if ($role === 2) {
		foreach ($contacts as $cont) {
			if ($cont['id'] === $response['otherContact'])
				$lastContact = $cont;
		}
		if($lastContact === null){
			$lastContact = reset($contacts);
		}
	} else {
		$lastContact = $contacts;
	}
}
if ($chats) {
	$last_chat = end($chats);
}


if (!isset($lastContact)) {
	$_SESSION['no_contact'] = true;
}


// $otherContacts = array_filter($contacts, function($e) use ($cont){
//     return $e !== $cont;
// });



require('./view/chat.php');
