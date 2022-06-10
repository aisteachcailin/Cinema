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
      <td><input type="text" class="card_name" placeholder="Your name" pattern="^\S{2,16}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Имя должно быть не менее двух символов' : '');" required></td>
      <td><input type="text" class="mm" placeholder="MM" pattern="[0-9]{2,2}" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Месяц должен состоять из 2-х цифр' : '');" required></td>
      <td><input type="text" class="yy" placeholder="YY" pattern="[0-9]{2,2}" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Год должен состоять из 2-х цифр' : '');" required></td>
    </tr>
    <tr id="card_data2">
      <td><input type="text" class="card_number" placeholder="XXXX XXXX XXXX XXXX" pattern="[0-9]{16,16}" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Номер карты должен состоять из 16-и цифр' : '');" required></td>
      <td><input type="text" class="cvc" placeholder="CVC" pattern="[0-9]{3,3}" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'CVC код должен состоять из 3-х цифр' : '');" required></td>
    </tr> 
    </table>
            <div class="buttons_yn" style="margin-top: 20px;">
        <a href="pay_tickets.php"><button type="submit" id="save" class="btn btn-dark" data-bs-dismiss="modal">Оплатить</button></a>
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Отменить</button>
        </div>
    </div>
     </div>
   </div>
</div>
    <div class="scheme">
<?php  
    $id_f = $_SESSION['id_film'];
    $id_d = $_SESSION['id_day'];
    $id_t = $_SESSION['id_time'];

    $sql_films=$link->query("SELECT `name`, `id` FROM `films`");
    $sql_day=$link->query("SELECT * FROM `day`");
    $sql_time=$link->query("SELECT * FROM `time`");
        foreach($sql_films as $films):
            if ($id_f == $films['id']) { 
                foreach($sql_day as $day):
                    if ($id_d == $day['id_day']) { 
                        foreach($sql_time as $time):
                             if ($id_t == $time['id_time']) { ?>
                                <table id="session_info">
                                    <tr><td><div class="film_name"><span><?php echo 'Фильм: ';?></span><?php echo ' "'.$films['name'].'"'; ?></div></td><td></td></tr>
                                    <tr><td><div class="film_day"><span><?php echo 'Дата: ';?></span><?php echo date_format(date_create($day['day']), 'd-m-Y'); ?></div></td><td></td></tr>
                                    <tr><td><div class="film_time"><span><?php echo 'Время: ';?></span><?php echo date_format(date_create($time['time']), 'H:i'); ?></div></td><td></td></tr>
                                </table>
            
                       <?php }
                        endforeach;
                    }
                endforeach;
                 }
        endforeach;
?>

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
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
            <?php 
     
         endfor;
?>
</table> 
<div class="bronpay" style="margin-top: 20px; margin-left: 25px;">
    <a href="reserve_tickets.php"><button type="button" class="bron">Забронировать билеты</button></a>
    <button type="button" data-bs-toggle="modal" data-bs-target="#pay" style="margin-left: 10px;" class="pay" >Оплатить билеты</button>
</div>
 </form>
 `      <hr>
        <div class="color_place">    
            <div class="bron"><div class="square_bron"></div><p> забронированные места</p></div>
            <div class="pay"><div class="square_pay"></div><p> оплаченные места</p></div>    
        </div>
        <hr>
 </div>

    </div>
</body>
</html>