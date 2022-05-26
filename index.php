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
    $_SESSION['sql'] = "SELECT * FROM `films`, `schedule`";
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
    $_SESSION['id_film'] = $idf ;//запоминаем id выбранного фильма
    $flm = [];
    foreach ($sql as $film) {
        if($film['id'] == $idf) {
            $flm=$film;
            break;
        }
    }
    
    require('openFilm.php');

} elseif ($page == 'scheme') {

    $idd = $_GET['id_day'];
    $idt = $_GET['id_time'];

    $_SESSION['id_day'] = $idd;
    $_SESSION['id_time'] = $idt;


    require('scheme/scheme.php');

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

/*} elseif ($page == 'film_day') {
        $day=$_GET['day'];
        if ($day == 0) {
            $_SESSION['sql'] = "SELECT * FROM `day`";
        } else {
            $_SESSION['sql'] = "SELECT * FROM `day` WHERE `day` = $day";}
        $sql_text = $_SESSION['sql'];
        $sql = $link->query($sql_text);
        require('films.php');        */

//сортировка
} elseif ($page == 'sort') {
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
/*       if ($idf == 5) {
        $sql_text.= " WHERE `day` = $idf";
       }*/

    $sql = $link->query($sql_text);
    require ('films.php');
 


 //поиск по дате и времени
    
} elseif ($page == 'date_to') {

if (isset($_SESSION['date_to'])) {

$date_to = $_SESSION['date_to'];
$d1 = strtotime($date_to); // переводит из строки в дату
$date_to2 = date("Y-m-d", $d1);
$query_date_to2 = "SELECT `id_day` FROM `day` WHERE `day` = '$date_to2'";//id дня
$sql_date_to2 = $link ->query($query_date_to2);
$array_date_to2 = $sql_date_to2->fetch_assoc();
$str_date_to2 = $array_date_to2['id_day'];

$id_film = "SELECT `id_film` FROM `schedule` WHERE `id_day` = '$str_date_to2'";//id филма
$sql_id_film=$link->query($id_film);
$array_id_film = $sql_id_film->fetch_assoc();
$str_id_film = $array_id_film['id_film'];

/*$sql=$link->query("SELECT * FROM `films` WHERE `id` = '$str_id_film'");*/






/*$sql_day=$link->query("SELECT * FROM `day`");

foreach ($sql_day as $day)
    $b = $day['id_day'];
    $sql_sch=$link->query("SELECT * FROM `schedule` WHERE `id_day` = '$b'");

        foreach($sql_sch as $sch) 
        $a = $sch['id_film'];
        $sql_films=$link->query("SELECT * FROM `films` WHERE `id` = '$a'");

        endforeach;
            
endforeach;*/


/*
$sql_date=$link->query($sql_date_to2);
$sql_date_2 = mysqli_fetch_assoc($sql_date);
$id_day_str = $sql_date_2['id_day'];

$id_film = "SELECT `id_film` FROM `schedule` WHERE `id_day` = '$id_day_str'";
$sqll=$link->query($sql_film);
$sqll_array = mysqli_fetch_assoc($sqll);
$sql_str = $sqll['id_film'];
var_dump($sql_str);


$sql_film_2 = mysqli_fetch_assoc($sql_film);

/*$film = "SELECT * FROM `films` WHERE `id` = '$id_film'";

$film = "SELECT `name`, `day` FROM `films` f JOIN `schedule` s ON f.`id` = s.`id_film` JOIN `day` d ON s.`id_day` = d.'$sql_date_to2'";*/

    /*unset($_SESSION['date_to']);*/
}
require('films.php');    
}   

?>   
</div>

<?php 
require('footer.php');
?>