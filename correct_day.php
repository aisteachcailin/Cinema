<?php
session_start();
    require_once 'connect.php';

    $id_day = $_POST['id_day'];
    $date = $_POST['date'];
    
    $correct_date = mysqli_query($link, "UPDATE `day` SET `day` = '$date' WHERE `day`.`id_day` = '$id_day'");

    header('Location: index.php?page=admin');
?>