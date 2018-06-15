<?php
ini_set("include_path", '/home/blurhync/php:' . ini_get("include_path") );
require_once "Mail.php";


$name       = @trim(stripslashes($_POST['name'])); 
$from       = @trim(stripslashes($_POST['email'])); 
$subject    = @trim(stripslashes($_POST['subject'])); 
$message    = @trim(stripslashes($_POST['message'])); 
$to   		= 'info@blurhyn.com';//This will be replaced with your email



$host = "ssl://mail.blurhyn.com";
$port = "465";
$username = "info@blurhyn.com";
$password = "blurhyn2018!@#";
$headers = array ('From' => $from,
	'To' => $to,
	'From' => $from,
	'Subject' => "Client: ".$name);
$smtp = Mail::factory('smtp',
	array ('host' => $host,
		'port' => $port,
		'auth' => true,
		'username' => $username,
		'password' => $password));
$mail = $smtp->send($to, $headers, $message);
if (PEAR::isError($mail)) {
	echo("<p>" . $mail->getMessage() . "</p>");
} else {
	header("location: message.html");
}

die;
?>