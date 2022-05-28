<?php
session_start();
    require_once 'connect.php';

    $id_time = $_POST['id_time'];
    $time = $_POST['time'];

    $correct_time = mysqli_query($link, "UPDATE `time` SET `time` = '$time' WHERE `time`.`id_time` = '$id_time'");

    header('Location: index.php?page=admin');
?>