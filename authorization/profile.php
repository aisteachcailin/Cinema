<?php
session_start();
$id_user = $_SESSION['user']['id'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Профиль пользователя</title>
</head>
<body>

<section class="profile-detail">
    <form>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="profile-detail__personal">
                    <div>
                        <img src="images/kot.jpg" width="200vh" height="200vh" alt="">
                    </div>
                        <div class="profile-text">
                        <div class="profile-title">
                            <h2><?= $_SESSION['user']['full_name'] ?></h2>
                        </div>
                        <div class="profile-email">
                            <i class="fa fa-envelope"></i>
                            <a href="#"><?= $_SESSION['user']['email'] ?></a>
                        </div>
                        </div>
                </div>
                            
                <div class="profile-detail__info">
                        <p>Билеты</p>
                    <table class="ticket-info">
                            <?php
        $sql_m= $link->query("SELECT * FROM `films`");
        $Sum = 0;
        $sql_tickets= $link->query("SELECT * FROM `tickets`");
        
        if(isset($sql_tickets)){
       foreach($sql_tickets as $tickets ){
            if($tickets['id_user'] == $id_user){
            $a = $tickets['id_film'];
            $kol =  $tickets['number_tickets']; 
            $flm_m = [];
            foreach ($sql_m as $film_m) {
                if($film_m['id'] == $a){
                $flm_m= $film_m;
                break;  
                }   
            }

            ?> 
                        <tbody>
                            <tr>
                                <td>
                                    <em><?php echo '"'.$flm_m['name'].'"'; ?></em>
                                </td>
                                <td>
                                    <?php echo $flm_m['daytime']; ?>
                                </td>
                                <td>
                                   <?php echo $flm_m['daytime']; ?>
                                </td>
                                <td>
                                <?php echo $kol; ?>
                                </td>
                                <td>
                                <?php echo $kol*$flm_m['price'].'₽'; ?>
                                </td>
                            </tr>
                               <?php
        $Sum +=$kol*$flm_m['price'];
        }   
        }        
        }
        ?>
        <tr>
             <td align="right" colspan="5"><b> <?php echo 'Всего: '.$Sum.'₽' ?></b></td>
         </tr>
                        </tbody>
                    </table>

                </div>
           
            </div>


 </div>
            </div>
            <div class="logout"><button class="site-btn"><a href="authorization/handler_form/logout.php" class="logout">Выход</a></button></div>
            </form>
</section>
 </body>
</html>