<?php 
session_start();
require_once 'connect.php';
$add_film =  $_SESSION['add_film'];
$id_user = (int)$_SESSION['user']['id'];
  
if(isset($_SESSION['user'])){

	foreach($add_film as $key => $value){
			$id_film = $key;
			$number_tickets = (int)$value;

            mysqli_query($link, "INSERT INTO `tickets` (`id`, `id_user`, `id_film`, `number_tickets`) VALUES (NULL, '$id_user', '$id_film', '$number_tickets')");
			}
       			       
        		header('Location: index.php?page=profile');
    		}else {
        	$_SESSION['message'] = 'Для оформления заказа авторизуйтесь!';
			header("Location: index.php?page=authorization");
        }   			
?> 