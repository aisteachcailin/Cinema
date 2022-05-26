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

    } elseif (empty($full_name)) {

        $_SESSION['message'] = 'Введены не все данные';
        header('Location: ../../index.php?page=register');

    } elseif (empty($email)) {

        $_SESSION['message'] = 'Введены не все данные';
        header('Location: ../../index.php?page=register');

    } elseif (empty($login)) {

        $_SESSION['message'] = 'Введены не все данные';
        header('Location: ../../index.php?page=register');

      } elseif (empty($password)) {

        $_SESSION['message'] = 'Введены не все данные';
        header('Location: ../../index.php?page=register');

    } elseif (empty($password_confirm)) {

        $_SESSION['message'] = 'Введены не все данные';
        header('Location: ../../index.php?page=register');

    } else {

    if ($password === $password_confirm) {

    $path = 'avatars/' . time() . $_FILES['avatar']['name'];
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
            $_SESSION['message'] = 'Ошибка при загрузке сообщения';
            header('Location: index.php?page=register');

        }

        $password = md5($password);
        $path2='authorization/'.$path;

        mysqli_query($link, "INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `avatar`, `role`) VALUES (NULL, '$full_name', '$login', '$email', '$password', '$path2', '2')");

        $_SESSION['message'] = 'Регистрация прошла успешно!';

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


    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../../index.php?page=register');
    }
}

?>