<?php
session_start();
    require_once 'connect.php';

    $avatar = $_POST['avatar'];
    $login = $_SESSION['user']['login'];
        

    $path = 'authorization/avatars/' . time() . $_FILES['avatar']['name'];
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], './' . $path)) {
         $_SESSION['message'] = 'Ошибка при загрузке сообщения';
            header('Location: index.php?page=profile');

        }
        $avatar = $path;

      $correct_profile = mysqli_query($link, "UPDATE `users` SET `avatar` = '$avatar' WHERE `login` = '$login'");

      
if ($_SESSION['user']['role'] == 1) {
    header('Location: index.php?page=admin');}
if ($_SESSION['user']['role'] == 2) {
    header('Location: index.php?page=profile');}
?>

