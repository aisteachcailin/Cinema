<?php
session_start();
    require_once 'connect.php';

    $id_ticket = $_POST['id_ticket'];

      $pay_bron = mysqli_query($link, "UPDATE `tickets` SET `status` = 'В' WHERE `id` = '$id_ticket'");

    header('Location: index.php?page=profile');
?>

