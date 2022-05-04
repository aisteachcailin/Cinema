<?php 
session_start();
require('header.php');
?>
<div id="content" style="width: 100%">

<?php  
//соединение с бд
require('connect.php');
//подключение к бд

if (!isset($_SESSION['sql'])) {
    $_SESSION['sql'] = "SELECT * FROM `films`, `films_day`";
}

$sql_text = $_SESSION['sql'];
$sql=$link->query($sql_text);

$page=$_GET['page'];

if (!isset($page)) {
   require('main.php');
} elseif ($page == 'index') {
    require('main.php');
} elseif ($page == 'films') {
    require('films.php');
 } elseif ($page == 'profile') {
    require('authorization/profile.php');
} elseif ($page == 'authorization') {
    require('authorization/index.php');
} elseif ($page == 'register') {
    require('authorization/register.php');
} elseif ($page == 'admin') {
    require('authorization/admin.php');
} elseif ($page == 'openFilm') {
    $idf = $_GET['id'];
    $idd = $_GET['id_day'];
    $flm = [];
    $days = [];
    foreach ($sql as $film) {
        if($film['id'] == $idf) {
            $flm=$film;
            break;
        }
    }

    foreach ($sql as $day) {
        if($day['id_day'] == $idd) {
            $days=$day;
            break;
        }
    }
    require('openFilm.php');

} elseif ($page == 'film_genre') {
        $idf=$_GET['id_genre'];
        if ($idf == 0) {
            $_SESSION['sql'] = "SELECT * FROM `films`";
        } else {
            $_SESSION['sql'] = "SELECT * FROM `films` WHERE `genre` = $idf";}
        $sql_text = $_SESSION['sql'];
        $sql = $link->query($sql_text);
        require('films.php');

} elseif ($page == 'film_age') {
        $idf=$_GET['id_age'];
        if ($idf == 0) {
            $_SESSION['sql'] = "SELECT * FROM `films`";
        } else {
            $_SESSION['sql'] = "SELECT * FROM `films` WHERE `age` = $idf";}
        $sql_text = $_SESSION['sql'];
        $sql = $link->query($sql_text);
        require('films.php');

} 
//сортировка
elseif ($page == 'sort') {
        $idf=$_GET['id_sort'];
       if ($idf == 1) {
        $sql_text.= " ORDER BY `name`";
       }
       if ($idf == 2) {
        $sql_text.= " ORDER BY `name` DESC";
       }
       if ($idf == 3) {
        $sql_text.= " ORDER BY `price` ASC";
       }
       if ($idf == 4) {
        $sql_text.= " ORDER BY `price` DESC";
       }
       if ($idf == 5) {
        $sql_text.= " ORDER BY `day` ASC";
       }
       if ($idf == 6) {
        $sql_text.= " ORDER BY `day` DESC";
       }

    $sql = $link->query($sql_text);
    require ('films.php');
}
?>   
</div>

<?php 
require('footer.php');
?>