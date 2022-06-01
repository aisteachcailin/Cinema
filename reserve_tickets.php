<?php 
session_start();
require_once 'connect.php';

$id_user = (int)$_SESSION['user']['id'];
$id_film = (int)$_SESSION['id_film'];

$id_day = (int)$_SESSION['id_day'];
$id_time = (int)$_SESSION['id_time'];

// проверка вывода выбранных мест
/*foreach ($_SESSION['bron'] as $ticket){
           echo 'ряд'.$ticket['row'].'место'.$ticket['place'].'<br>';
    }*/
// конец проверки выбранных мест

if ($id_user == 0) {
    $_SESSION['message'] = "Пожалуйста авторизуйтесь";
    header("Location: ../index.php?page=register");
    }else{

// добавить в БД выбранный билет
foreach ($_SESSION['bron'] as $ticket) {
        $row = $ticket['row'];//ряд
        $place = $ticket['place'];//место

        mysqli_query($link, "INSERT INTO `tickets` (`id`, `id_user`, `id_film`, `number_row`, `number_place`, `day`, `time`, `status`, `date_added`) VALUES (NULL, '$id_user', '$id_film', '$row', '$place', '$id_day', '$id_time', 'Б', CURRENT_TIMESTAMP)"); 
         
    }

unset($_SESSION['bron']);

$redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'redirect-form.html';
header("Location: $redirect");

    }
?> 