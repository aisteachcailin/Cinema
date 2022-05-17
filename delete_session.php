<?php
session_start();
    require_once 'connect.php';

    $id_session = $_POST['id_session'];
    
    $del=$link->query("DELETE FROM `schedule` WHERE `schedule`.`id_session` = '$id_session'");
    header('Location: index.php?page=admin');
 ?>
