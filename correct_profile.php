<?php
session_start();
    require_once 'connect.php';

    $full_name = $_POST['full_name'];
    $avatar = $_POST['avatar'];
    $email = $_POST['email'];
    $login = $_SESSION['user']['login'];

    $path = 'avatars/' . time() . $_FILES['avatar']['name'];
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
         $_SESSION['message'] = 'Ошибка при загрузке сообщения';
            header('Location: index.php?page=profile');

        }

        $path2='authorization/'.$path;
        $avatar = $path2;
        
      $_SESSION['user']['full_name'] = $full_name;
      $_SESSION['user']['avatar'] = $avatar;
      $_SESSION['user']['email'] = $email;

      $correct_profile = mysqli_query($link, "UPDATE `users` SET `full_name` = '$full_name', `email` = '$email', `avatar` = '$avatar' WHERE `login` = '$login'");


      
if ($_SESSION['user']['role'] == 1) {
    header('Location: index.php?page=admin');}
if ($_SESSION['user']['role'] == 2) {
    header('Location: index.php?page=profile');}
?>

