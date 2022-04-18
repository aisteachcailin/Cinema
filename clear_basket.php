<?php 
session_start();
       unset($_SESSION['add_film']);   
       header("Location: index.php?page=index");            
?> 