<?php
session_start();
    require_once 'connect.php';

    $id = $_POST['id'];

    $del=$link->query($link,"DELETE FROM `films` WHERE `films`.`id` = '$id'");
    header('Location: index.php?page=admin');
 ?>


