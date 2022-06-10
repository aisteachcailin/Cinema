<?php 
require_once('connect.php');
session_start();

// foreach ($_POST as $key => $value) {
//    echo 'ряд'.$key.'место'.$value;
// }
//$key - ряд $value - место

    $id_f = $_SESSION['id_film'];
    $id_d = $_SESSION['id_day'];
    $id_t = $_SESSION['id_time'];

$id_user = (int)$_SESSION['user']['id'];
if ($id_user == 0) {
    $_SESSION['message'] = "Пожалуйста авторизуйтесь";
    header("Location: index.php?page=authorization");
    }else{

foreach ($_POST as $key => $value){
$places=array(
    'row' =>$key,
     'place'=>$value);}

$_SESSION['bron'][]=$places;
/*запрет на бронирование занятых мест*/
$sql_tickets=$link->query("SELECT * FROM `tickets`" );
        foreach ($sql_tickets as $tickets) {
foreach ($_POST as $key => $value) {
            if($value == $tickets['number_place'] AND $key == $tickets['number_row'] AND $id_d == $tickets['day'] AND $id_t == $tickets['time'] AND $id_f == $tickets['id_film']) {
                $_SESSION['message'] = 'Выбранные места уже заняты';
                header("Location: index.php?page=scheme");
                unset($_SESSION['bron']); 
             break;

            }
        }


     }

$redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'redirect-form.html';
header("Location: $redirect");
}
?>