<!-- <?php
function getAvatar($login) {
    require ('cinema/connect.php');
    $result_set = $mysqli->query("SELECT `avatar` FROM `users` WHERE `login` = '$login' ");
    $row = $result_set->fetch_assoc();
    return $row["avatar"];
}


?> -->