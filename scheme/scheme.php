<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Схема кинозала</title>
    <link rel="stylesheet" href="scheme/css/scheme.css">
</head>

<body>


<!-- форма оплаты -->

<div class="modal fade" id="pay" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Оплата</h3>
      </div>
    <div class="modal-body">
        <table>
    <tr id="card_data1">
      <td><input type="text" class="card_name" placeholder="Your name" autofocus></td>
      <td><input type="text" class="mm" placeholder="MM"></td>
      <td><input type="text" class="yy" placeholder="YY"></td>
    </tr>
    <tr id="card_data2">
      <td><input type="text" class="card_number" placeholder="XXXX XXXX XXXX XXXX"></td>
      <td><input type="text" class="cvc" placeholder="CVC"></td>
    </tr> 
    <tr>
        <td><a href="pay_tickets.php"><button type="submit" class="data_pay" data-bs-dismiss="modal">Оплатить</button></a></td>
    </tr>
    </table>
    </div>
     </div>
   </div>
</div>

     <div class="scheme">
    <div class="session_info">
<?php  
    $id_f = $_SESSION['id_film'];
    $id_d = $_SESSION['id_day'];
    $id_t = $_SESSION['id_time'];

    $sql_films=$link->query("SELECT `name`, `id` FROM `films`");
        foreach($sql_films as $films):
            if ($id_f == $films['id']) { ?>
                <div class="film_name"><?php echo 'Фильм: "'.$films['name'].'"'; ?></div>
            <?php }
        endforeach;
?>
    </div>
<div class="places">
    <form action="bron_place.php" method="post" style="margin-left: 100px;">
<table >
<?php
    for ($i=1;$i<=5;$i++):  ?> 
                <tr>
                    <td> <?php echo 'Ряд '.$i ?> </td>
                 <?php  for ($j=1;$j<=10;$j++):?>

                    <td>
                        <?php
                         
                       $sql=$link->query("SELECT * FROM `tickets` WHERE `number_row` = '$i' AND `number_place` = '$j' AND `id_film` = '$id_f' AND `day` = '$id_d' AND `time` = '$id_t'");
                       $color = '#19bfb9';
                       foreach($sql as $ticket):
                        if ($ticket['status'] == 'Б') {
                            $color = '#ff5722';
                        }
                        elseif ($ticket['status'] == 'В') {
                            $color = '#22ff57';
                        }
                       endforeach;?>

                       <button class="place" style="background-color: <?php echo $color; ?>" id="btn" name="<?php echo $i;?>" value="<?php echo $j;?>" ></button>
                     </td>

                <?php 
                    endfor;
                ?>
                </tr>


            <?php 
     
         endfor;
?>
</table> 
<div class="bronpay" style="margin-top: 20px; margin-left: 25px;">
    <a href="reserve_tickets.php"><button type="button" class="bron">Забронировать билеты</button></a>
    <button type="button" data-bs-toggle="modal" data-bs-target="#pay" style="margin-left: 10px;" class="pay" >Оплатить билеты</button>
</div>
 </form>
        <div class="color_place">
            <div class="bron"><div class="square_bron"></div><p> забронированные места</p></div>
            <div class="pay"><div class="square_pay"></div><p> оплаченные места</p></div>
        </div>
 </div>

    </div>
</body>
</html>