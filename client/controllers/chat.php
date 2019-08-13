<?php

if (!isset($_SESSION['token'])) {
	?>
<script>
	window.location.replace("login");
</script>
<?php
	die();
}


if (!isset($lastContact)) {

	$token = $_SESSION['token'];

	$header = "Authorization: Bearer "  . $_SESSION['token'];
	$response = json_decode(callAPI('GET', '/api/chat', false, $header), true);


	$contacts = $response['contacts'];
	$chats = $response['chats'];
	$lastContact = null;
	if($contacts){
		foreach ($contacts as $cont) {
			if ($cont['id'] === $response['otherContact'])
				$lastContact = $cont;
		}
		$last_chat = end($chats);
	}

}


if(!isset($lastContact)){
	$_SESSION['no_contact'] = true;
}


// $otherContacts = array_filter($contacts, function($e) use ($cont){
//     return $e !== $cont;
// });



require('./chat.php');
