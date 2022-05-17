<?php
session_start();
    require_once 'connect.php';

    $full_name = $_POST['full_name'];
    $login = $_SESSION['user']['login'];

      $_SESSION['user']['full_name'] = $full_name;

      $correct_name = mysqli_query($link, "UPDATE `users` SET `full_name` = '$full_name' WHERE `login` = '$login'");
      
if ($_SESSION['user']['role'] == 1) {
    header('Location: index.php?page=admin');}
if ($_SESSION['user']['role'] == 2) {
    header('Location: index.php?page=profile');}
?>

