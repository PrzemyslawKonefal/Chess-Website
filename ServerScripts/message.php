<?php session_start(); ?>
<?php
$to      = 'smeagol65@gmail.com';
$subject = 'ChessYes contact';
$message = $_POST['message'];
$headers = 'From: ' .$_POST['email']. "\r\n";

if(mail($to, $subject, $message, $headers)){
$_SESSION['MailSent'] = true;
header('Location: ../contact.php');
}
?>
