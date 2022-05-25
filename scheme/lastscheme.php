<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Схема кинозала</title>
    <link rel="stylesheet" href="scheme/css/scheme.css">

</head>

<body>
    <!-- модальное окно оплаты билетов -->
<div class="modal fade" id="pay_tickets" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Билеты</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
    <div class="modal-body">
        <table>
            <tr>
                <td><b>Фильм</b></td>
                <td><b>Дата</b></td>
                <td><b>Количество</b></td>
                <td><b>Цена</b></td>
            </tr>

<?php
        $sql_sch= $link->query("SELECT * FROM `schedule`");
        $Sum = 0;
        $add_film = $_SESSION['add_film'];
        if(isset($add_film)){
       foreach($add_film as $key => $value){
            $a = $key;  //id фильма
            $kol =  $_SESSION['add_film'][$a];
            $flm_m = [];
            foreach ($sql_sch as $film_m) {
                if($film_m['id_film'] == $a){
                $flm_m = $film_m;
                break;  
                }   
            }
            ?>

                <tr>
                    <td><?php
                        $sql_film=$link->query("SELECT * FROM `films`");
                            foreach ($sql_film as $film):
                                if ($film['id'] == $flm_m['id_film'])
                                {
                                echo $flm_m['name'];
                                }
                            endforeach; 
                           var_dump($film['name']); ?>
                              
                    </td>
                    <td><?php
                        $sql_day=$link->query("SELECT * FROM `day`");
                            foreach ($sql_day as $day):
                                if ($day['id_day'] == $flm_m['id_day'])
                                {
                                echo $day['day'];
                                }
                            endforeach; ?></td>
                    <td><input type="number" step="1" min="1" max="10" id="num_count" name="quantity" value="<?php echo $kol; ?>" title="Qty"></td>
                    <td><?php echo $kol*$film['price'].'р'; ?></td>
                </tr>
           
        <?php
        $Sum +=$kol*$film['price'];
        }   
        }        

        ?>

        <tr>
             <td align="right" colspan="5"><b> <?php echo 'Всего: '.$Sum ?></b></td>
         </tr> 
        <tr>
          <td align="right" colspan="4"><b><a href="pay_tickets.php"><button type="button" class="btn btn-light" >Оплатить билеты</button></a></b></td>
        </tr>         
                   <!-- <td><a href="<?php unset($_SESSION['add_film']); ?>">очистить</a></td>  -->      
        </table>
          </div>
      <div class="modal-footer">
        ...
      </div>
    </div>
  </div>
</div>
 <!-- модальное окно оплаты билетов -->



<div class="scheme">

    <div class="places">
        <?php
          $sql_place=$link->query("SELECT * FROM `place`");
                foreach ($sql_place as $place): ?> 

    <button onclick="style.backgroundColor='#ff5722'" class="place" id="btl_pl"><div class="number_place"><?php echo $place['place'];?></div></button>
                <?php endforeach; ?>


    </div>

    <!-- счетчик количество товаров -->
    <form id="form1" name="form1" action="./add_cart.php" method="post">
          
        <div class="input-group quantity_flms">
            <input type="button" value="-" id="button_minus">
            <input type="number" step="1" min="1" max="10" id="num_count" name="quantity" value="1" title="Qty" >
            <input type="button" value="+" id="button_plus">
        </div>
        <!-- начало невидимой части формы -->
        <input type="hidden"  name="film_id" value="<?php echo $flm['name']; ?>" />
        <!-- конец невидимой части формы -->
            <div id="openedProduct-price">
            <?php echo $flm['price'].'p';?>
            </div>
      
    <input class='add_to_cart' type="submit" value="В корзину" name="submit">
    </form>
    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#pay_tickets">Оплатить билеты</button>
</div >

<script>
    var numCount = document.getElementById('num_count');
    var plusBtn = document.getElementById('button_plus');
    var minusBtn = document.getElementById('button_minus');
    plusBtn.onclick = function() {
        var qty = parseInt(numCount.value);
        qty = qty + 1;
        numCount.value = qty;
    }
    minusBtn.onclick = function() {
        var qty = parseInt(numCount.value);
        if(qty>1){
            qty = qty - 1;
        }
        numCount.value = qty;
    }
</script>
</body>
</html>



