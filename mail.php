<?php
$name = $_POST['name'];
$email = $_POST['email'];
$mes = $_POST['message'];

$headers = "From: $email \r\n";
$to ="9977qwerty@gmail.com \r\n";
$subject ="$name \r\n";
$message ="$mes \r\n";
mail($to, $subject, $message, $headers.'Content-type:text/plain; charset=urf-8');
?>