<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="css/basket.css" type="text/css">
<!--Модальное окно-->
<div class="modal fade" id="tickets" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Билеты</h3>
    </div>
    <div class="modal-body">
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
        $add_film =  $_SESSION['add_film'];
        if(isset($add_film)){
       foreach($add_film as $key => $value){
            $a = $key;  //id товара
            $kol =  $_SESSION['add_film'][$a];
            $flm_m = [];
            foreach ($sql_m as $film_m) {
                if($film_m['id'] == $a){
                $flm_m = $film_m;
                break;  
                }   
            }
            ?> 

                <tr>
                    <td><img width="50px" src="images/ticket.png"/></td>
                    <td><?php echo $flm_m['name']; ?></td>
                    <td><?php echo $flm_m['daytime']; ?></td>
                    <td><input type="number" step="1" min="1" max="10" id="num_count" name="quantity" value="<?php echo $kol; ?>" title="Qty"></td>
                    <td><?php echo $kol*$flm_m['price'].'₽'; ?></td>
                    
                </tr>
           
        <?php
        $Sum +=$kol*$flm_m['price'];
        }   
        }        

        ?>
<td><b><a href="clear_basket.php">очистить корзину</a></b></td>

        <tr>
             <td align="right" colspan="5"><b> <?php echo 'Всего: '.$Sum.'₽' ?></b></td>
         </tr> 
        <tr>
          <span><td align="left" colspan="3"><b><button type="button" class="btn btn-dark" data-bs-dismiss="modal">Продолжить просмотр</button></b></td>
          <td><a href="reserve_tickets.php"><button type="button" class="btn btn-dark">Забронировать билеты</button></td>
          <td align="right" colspan="4"><b><a href="pay_tickets.php"><button type="button" class="btn btn-light" >Оплатить билеты</button></a></b></td></span>
        </tr>         
                  
        </table>
          </div>
        </div>
      </div>
      </div>

<footer class="footer">
    <div class="page-up">
        <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer__logo">
                    <a href="index.php?page=index"><img src="images/logo1.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer__nav">
                    <ul>
                        <li><a href="index.php?page=index">Главная</a></li>
                        <li><a href="index.php?page=films">Фильмы</a></li>
                        <li><a href="#">Расписание</a></li>
                        <li><a href="#">Контакты</a></li>    

                    </ul>

                </div>
            </div>

          </div>

      </div>

  </footer>
  <!-- Footer Section End -->

  <!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/player.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/mixitup.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>