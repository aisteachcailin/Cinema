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

// запрет на бронирование занятых мест
if ($id_user == 0) {
    $_SESSION['message'] = "Пожалуйста авторизуйтесь";
    header("Location: ../index.php?page=register");
    }else{

$sql_tickets=$link->query("SELECT * FROM `tickets` WHERE `status` = 'Б' OR `status` = 'В'" );
        foreach ($sql_tickets as $tickets) {
            if($_SESSION['bron']['0']['place'] == $tickets['number_place'] AND $_SESSION['bron']['0']['row'] == $tickets['number_row']) {
                header("Location: ../index.php?page=scheme");
                unset($_SESSION['bron']);
                break;

            }
        }

// добавить в БД выбранный билет
foreach ($_SESSION['bron'] as $ticket) {
        $row = $ticket['row'];//ряд
        $place = $ticket['place'];//место

        mysqli_query($link, "INSERT INTO `tickets` (`id`, `id_user`, `id_film`, `number_row`, `number_place`, `day`, `time`, `status`, `date_added`) VALUES (NULL, '$id_user', '$id_film', '$row', '$place', '$id_day', '$id_time', 'В', CURRENT_TIMESTAMP)"); 
         
    }

unset($_SESSION['bron']);

$redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'redirect-form.html';
header("Location: $redirect");
 }  
?> 