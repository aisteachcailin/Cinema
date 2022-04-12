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
    <div class="admin">
    <!-- Профиль администратора -->
    <form >
        <img src="<?= $_SESSION['user']['avatar'] ?>" width="200" alt="">
        <h2 style="margin: 10px 0;"><?= $_SESSION['user']['full_name'] ?></h2>
</form>

<?php

    echo "<table><tr><th>Фильм</th><th>Цена</th><th></th></tr>";
    foreach($sql as $row){
        echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["price"] . "</td>";
            echo "<td><form action='delete.php' method='post'>
                        <input type='hidden' name='id' value='" . $row["id"] . "' />
                        <input type='submit' class='butreg' value='Удалить'>
                   </form></td>";
        echo "</tr>";
    }
    echo "</table>";
mysqli_free_result($sql);

?>

        <a href="authorization/handler_form/logout.php" class="logout">Выход</a>
    </form>
   </div>
</body>
</html>