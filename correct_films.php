<?php
session_start();
    require_once 'connect.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $rating = $_POST['rating'];
    $descr = $_POST['descr'];
    $year = $_POST['year'];
    $director = $_POST['director'];
    $country = $_POST['country'];
    $lasting = $_POST['lasting'];
    $main_roles = $_POST['main_roles'];
    $price = $_POST['price'];

    $cor = mysqli_query($link, "UPDATE `films` SET `name` = '$name', `rating` = '$rating', `descr` = '$descr', `year` = '$year', `director` = '$director', `country` = '$country', `lasting` = '$lasting', `main_roles` = '$main_roles', `price` = '$price' WHERE `films`.`id` = '$id'");

      header('Location: index.php?page=admin');
 ?>


