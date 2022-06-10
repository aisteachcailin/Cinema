<?php
    session_start();
    require_once '../../connect.php';

    $full_name = $_POST['full_name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    //проверяем есть ли пользователь в БД с таким логином
    $check_user = mysqli_query($link, "SELECT * FROM `users` WHERE `login` = '$login' ");
    //mysqli_num_rows() - возвращает число рядов в результирующей выборке
  
    if (mysqli_num_rows($check_user) > 0) {
        $_SESSION['message'] = 'Введите другой логин';
        header('Location: ../../index.php?page=register');
    } elseif ($password != $password_confirm) {

        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../../index.php?page=register');
    }

    if ($password === $password_confirm) {
        $path = 'avatars/' . time() . $_FILES['avatar']['name'];


        $password = md5($password);
        $path2='authorization/'.$path;

        mysqli_query($link, "INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `avatar`, `role`) VALUES (NULL, '$full_name', '$login', '$email', '$password', '$path2', '2')");

        $check_user = mysqli_query($link, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
        //mysqli_num_rows() - возвращает число рядов в результирующей выборке
  
            if (mysqli_num_rows($check_user) > 0) {
            //mysqli_fetch_assoc - Обрабатывает ряд результата запроса и возвращает ассоциативный массив
                $user = mysqli_fetch_assoc($check_user);
            //при успешной авторизации запоминается данные об этом пользователи в сессию 'user'
                $_SESSION['user'] = [
                    "id" => $user['id'],
                    "full_name" => $user['full_name'],
                    "avatar" => $user['avatar'],
                    "login" => $user['login'],
                    "email" => $user['email'],
                    "role" => $user['role']
                ];
}
        header('Location: ../../index.php?page=profile');


    } 

?>