<?php 
session_start();

// foreach ($_POST as $key => $value) {
//    echo 'ряд'.$key.'место'.$value;
// }
//$key - ряд $value - место
foreach ($_POST as $key => $value){
$places=array(
	'row' =>$key ,
	 'place'=>$value);}

$_SESSION['bron'][]=$places;

$redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'redirect-form.html';
header("Location: $redirect");

?>
<!-- выбираем места для бронирования -->