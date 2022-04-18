<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Профиль администратора</title>
<meta charset="UTF-8">
</head>
<body>
    <div class="all">
<form>
    <!-- Профиль администратора -->
   <div class="info">
   
        <img src="<?= $_SESSION['user']['avatar'] ?>" width="200" alt="Фото профиля">
        <h5><span>Имя: </span><?= $_SESSION['user']['full_name'] ?></h5>
        <h5><span>Email: </span><?= $_SESSION['user']['email'] ?></h5>

<p>Управление сеансами</p>
</div>
<div class="sessions">
<?php

    echo "<table><tr><th>Фильм</th><th>Цена</th><th></th></tr>";
    foreach($sql as $row){
        echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["price"] . "р" . "</td>";
            echo "<td><form action='delete_film.php' method='post'>
                        <input type='hidden' name='id' value='" . $row["id"] . "' />
                        <input type='submit' class='del' value='Удалить'>
                   </form></td>";
        echo "</tr>";
    }
    echo "</table>";
mysqli_free_result($sql);

?>

</div>
<div class="logout"><button class="site-btn"><a href="authorization/handler_form/logout.php" class="logout">Выход</a></button></div>
    </form>
   </div>
</body>
</html>