<?php 
require_once('connect.php');
session_start();

// foreach ($_POST as $key => $value) {
//    echo 'ряд'.$key.'место'.$value;
// }
//$key - ряд $value - место

foreach ($_POST as $key => $value){
$places=array(
    'row' =>$key,
     'place'=>$value);}

$_SESSION['bron'][]=$places;

$sql_tickets=$link->query("SELECT * FROM `tickets`" );
        foreach ($sql_tickets as $tickets) {
foreach ($_POST as $key => $value) {
            if($value == $tickets['number_place'] AND $key == $tickets['number_row']) {
                header("Location: ../index.php?page=scheme");
                unset($_SESSION['bron']); 
             break;

            }
        }
     }

$redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'redirect-form.html';
header("Location: $redirect");

?>