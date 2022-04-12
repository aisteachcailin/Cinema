<?php
session_start();
$id_user = $_SESSION['user']['id'];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Профиль</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="all">
    <!-- Профиль -->
          <h3>Оплаченные билеты</h3>
    <form>
        <img src="<?= $_SESSION['user']['avatar'] ?>" width="200" alt="">
        <h2 style="margin: 10px 0;"><?= $_SESSION['user']['full_name'] ?></h2>
        <a href="#" ><?= $_SESSION['user']['email'] ?></a>
         <table>
            <tr>
                <td></td>
                <td><b>Фильм</b></td>
                <td><b>Дата и время</b></td>
                <td><b>Количество</b></td>
                <td><b>Цена</b></td>
            </tr>

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

                <tr>
                    <td><img width="200px" src="<?php echo $flm_m['imgs']; ?>" /></td>
                    <td><?php echo $flm_m['name']; ?></td>
                    <td><?php echo $flm_m['daytime']; ?></td>
                    <td> <?php echo $kol; ?> </td>
                    <td><?php echo $kol*$flm_m['price'].'р'; ?></td>
                </tr>
        <?php
        $Sum +=$kol*$flm_m['price'];
        }   
        }        
        }

        ?>
        <tr>
             <td align="right" colspan="5"><b> <?php echo 'Всего: '.$Sum ?></b></td>
         </tr> 
        </table>
        <a href="authorization/handler_form/logout.php" class="logout">Выход</a>
    </form>
</div>

 </body>
</html>