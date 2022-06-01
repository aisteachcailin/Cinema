<?php
session_start();
    require_once 'connect.php';

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $login = $_SESSION['user']['login'];

      $correct_profile = mysqli_query($link, "UPDATE `users` SET `full_name` = '$full_name', `email` = '$email' WHERE `login` = '$login'");

      
if ($_SESSION['user']['role'] == 1) {
    header('Location: index.php?page=admin');}
if ($_SESSION['user']['role'] == 2) {
    header('Location: index.php?page=profile');}
?>

