<?php 
session_start();

function date_to ($date_to) 
{ 
  require('connect.php');

    $date_to = trim($date_to); 
    $date_to = mysqli_real_escape_string($link, $date_to);
    $date_to = htmlspecialchars($date_to);


    if (!empty($date_to)) 
    { 
              
                    $_SESSION['date_to'] = $date_to;


                    header('Location: index.php?page=date_to');
        
    } else {
        $text = '<p>Задан пустой поисковый запрос.</p>';
        header('Location: index.php?page=films');
    }

    return $text; 
} 

if (!empty($_POST['date_to'])) { 
    $search_result = date_to ($_POST['date_to']); 
    echo $search_result; 
}

?>