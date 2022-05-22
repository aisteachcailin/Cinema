<!-- <?php
session_start();
    require_once 'connect.php';

    $id_genre = $_POST['id_genre'];
    $genre = $_POST['genre'];

    $correct_genre = mysqli_query($link, "UPDATE `genre` SET `name` = '$genre' WHERE `genre`.`id_genre` = '$id_genre'");

      header('Location: index.php?page=admin');
 ?>


<td><div class="filminfo"> -->