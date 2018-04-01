<?php
session_start();

$to      = 'webmaster@example.com';
$subject = 'ChessYes contact';
$message = $_POST['message'];
$headers = 'From: ' .$_POST['email']. "\r\n";

mail($to, $subject, $message, $headers);
$_SESSION['MailSent'] = true;
header('Location: ../contact.php');
?>
