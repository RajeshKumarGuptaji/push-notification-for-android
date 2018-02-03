<?php

 
//write device token here 
$to="f_pDhKfSQp4:APA91bF55yc6vlwsiGJjTSGEqxOE2FbF3MaSfsNRJWeIzZ0qRG3DignN0wVAiBubHfch5mi6jzP0bAW58awGd7-R1n-Am1ti199OIaWZTQ7Jc5RRzMPapr4FR17HJ_DPA888Wv4TePBy";
$title="Invitation";//  
$message="Hi..  im abhishek . i am intrested in this property. i want to meet you  ";
sendPush($to,$title,$message);

function sendPush($to,$title,$message)
{
// API access key from Google API's Console
// replace API key here
	define( 'API_ACCESS_KEY','AIzaSyAA78Uyt_HiqP_GSLKRE32nMXOMUI6PgF0');


	$registrationIds = array($to);
	$msg = array
	(
		'message' => $message,
		'title' => $title,
		'vibrate' => 1,
		'sound' => 1

// you can also add images, additionalData
		);
	$fields = array
	(
		'registration_ids' => $registrationIds,
		'data' => $msg
		);

	$headers = array
	(
		'Authorization: key='.API_ACCESS_KEY,
		'Content-Type: application/json'
		);

	$ch = curl_init();
	curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
	curl_setopt( $ch,CURLOPT_POST, true );
	curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
	curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
	curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
	curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
	$result = curl_exec($ch );
	curl_close( $ch );
	echo $result;
}
?>