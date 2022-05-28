<?php
session_start();
    require_once 'connect.php';

    $id_ticket = $_POST['id_ticket'];
    
    $cancel_bron = mysqli_query($link, "DELETE FROM `tickets` WHERE `tickets`.`id` = '$id_ticket'");
    header('Location: index.php?page=profile');
 ?>


