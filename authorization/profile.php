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

<!-- редактирование профиля -->

<div class="modal fade" id="correct_profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Редактирование профиля</h3>
    </div>
    <div class="modal-body">
        <form action="./correct_profile.php" method="post" enctype="multipart/form-data">
        <div class="input__items">
            <input type="text" name="full_name" id="full_name" value="<?php echo $_SESSION['user']['full_name'] ?>" placeholder="Имя">
        </div>
        <div class="input__items">
            <input type="email" name="email" id="email_correct" value="<?php echo $_SESSION['user']['email'] ?>" placeholder="Email">
        </div>
        <div class="input__items">
            <input type="file" name="avatar" value="<?php echo $path2; ?>">
        </div>
        <button type="submit" id="save" class="btn btn-dark" data-bs-dismiss="modal">Сохранить изменения</button>
        </form>
        </div>
          </div>
        </div>
      </div>

<section class="profile-detail">
    <div class="container">
        <div class="row_profile">
            <form action="./correct_profile.php" method="post" enctype="multipart/form-data">
                <div class="profile-detail__personal">
                    <div>
                        <img src="<?php echo $_SESSION['user']['avatar']; ?>" width="200vh" height="200vh" alt="">
                    </div>
                       <div class="profile-text">
                        <div class="profile-title">
                            <h2><?php echo $_SESSION['user']['full_name']; ?></h2>
                        </div>
                        <div class="profile-email">
                            <i class="fa fa-envelope"></i>
                            <a href="#"><?= $_SESSION['user']['email']; ?></a>
                        </div>
                        <div>
                        <a data-bs-toggle="modal" data-bs-target="#correct_profile"><img width="25vh" id="edit_profile" src="images/edit.png"></a>
                        </div> 
                        <div>
                            <div class="logout"><a href="authorization/handler_form/logout.php" class="logout">Выход</a></div>
                        </div>
                       </div>  
                </div>
                </form>
        <div class="middle">
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar">
                        <div class="product__sidebar__view">
                            <div class="section-title">
                                <h4>Рекомендации</h4>
                            </div>
                                   <?php
        $i=0;
        $sql=$link->query("SELECT * FROM `films`");
         foreach ($sql as $flm): 
            $i++;
            if ($i > 3) {
                break;
            }
                ?>
                            <div class="filter__gallery">
                                <div class="product__sidebar__view__item set-bg"
                                data-setbg="<?php echo $flm['imgs'];?>">
                                <div class="ep"><?php echo $flm['rating']."/10";?></div>
                                <div class="view"><?php echo $flm['year'];?></div>
                                <h5><a href="index.php?page=openFilm&id=<?php echo $flm['id']; ?>"><?php echo $flm['name'];?></a></h5>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
           <div class="card_profile">
                <div class="section-title">
                        <h4>Билеты</h4>
                 </div>
                  <div class="card-body">
                      <table class="table">
                        <tbody>
                            <?php
        $sql_m= $link->query("SELECT * FROM `films`");
        $Sum = 0;
        $sql_tickets= $link->query("SELECT * FROM `tickets`");
        
        if(isset($sql_tickets)){
       foreach($sql_tickets as $tickets ){
            if($tickets['id_user'] == $id_user){
            $a = $tickets['id_film'];
            $row =  $tickets['number_row'];
            $place =  $tickets['number_place'];
            $status =  $tickets['status']; 
            $flm_m = [];
            foreach ($sql_m as $film_m) {
                if($film_m['id'] == $a){
                $flm_m= $film_m;
                break;  
                }  
            }

            ?>    
                        <tr>
                            <td><img id="img_ticket" src="<?php echo $flm_m['imgs'];?>"></td>
                            <td><div class="film_ticket"><?php echo $flm_m['name']; ?></div>
                                <div class="day_ticket"><span>Дата:</span><?php $sql_sch= $link->query("SELECT * FROM `schedule`");
                                      $sql_day= $link->query("SELECT * FROM `day`");
                                foreach($sql_sch as $sch):
                                    if ($sch['id_film'] == $flm_m['id']) {
                                        foreach($sql_day as $day):
                                    if ($sch['id_day'] == $day['id_day']) {
                                        echo date_format(date_create($day['day']), 'd-m-Y');
                                    }
                                endforeach;
                                    }
                                endforeach;
                        ?></div>
                                <div class="time_ticket"><span>Время:</span><?php
                                      $sql_time= $link->query("SELECT * FROM `time`");
                                foreach($sql_sch as $sch):
                                    if ($sch['id_film'] == $flm_m['id']) {
                                        foreach($sql_time as $time):
                                    if ($sch['id_time'] == $time['id_time']) {
                                       echo date_format(date_create($time['time']), 'H:i');
                                    }
                                endforeach;
                                    }
                                endforeach;
                        ?></div>
                                <div class="lasting_ticket"><span>Длительность:</span><?php echo $flm_m['lasting'] ?></div>
                                <div class="place_ticket"><span>Место:</span><?php echo $place; ?></div>
                                <div class="row_ticket"><span>Ряд:</span><?php echo $row; ?></div>
                                <div class="price_ticket"><span>Стоимость:</span><?php echo $flm_m['price'].'₽'; ?></div>
                                <div class="status_ticket">
                                    <?php if ($status == 'Б') { ?>
                                <div class="bron_status"><?php echo 'Забронировано'; ?>
                                </div> 
                            <a data-toggle="collapse" href="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1" style="font-size: 16px; color: #a4a4a4;"><img src="images/more.png" style="padding-top: 10px;" alt=""></a>

                            <div class="collapse multi-collapse" id="multiCollapseExample1">
                                        <div class="cancel_bron"><a href="" data-bs-toggle="modal" data-bs-target="#cancel_bron">Отменить бронь</a></div>

<!-- отмена бронирования -->

<div class="modal fade" id="cancel_bron" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Отмена бронирования</h3>
      </div>
    <div class="modal-body">
        <div class="ticket_message">Вы действительно хотите отменить бронирование?</div>
    <div class="inside_modal">
        <form action="./cancel_bron.php" method="post" enctype="multipart/form-data">    
        <input type="hidden" name="id_ticket" value="<?php echo $tickets['id']; ?>">
        <button type="submit" class="btn btn-light">Да</button>
        </form>
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Нет</button>
    </div>
        </div>
          </div>
        </div>
      </div>

                                        <div class="pay_bron"><a href="" data-bs-toggle="modal" data-bs-target="#pay_bron">Оплатить</a></div>
<!-- оплата забронированного билета -->

<div class="modal fade" id="pay_bron" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Оплата</h3>
      </div>
    <div class="modal-body">
        <table id="pay_form">
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
        <td><form action="./pay_bron.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_ticket" value="<?php echo $tickets['id']; ?>">
        <button type="submit" class="data_pay">Оплатить</button></form></td>
    </tr>
    </table>
        </div>
          </div>
        </div>
      </div>
                            </div>
                                
                                    <?php } elseif ($status == 'В') { ?>
                                <div class="pay_status"><?php echo 'Оплачено'; ?></div>

                            <a data-toggle="collapse" href="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2" style="font-size: 16px; color: #a4a4a4;"><img src="images/more.png" style="padding-top: 10px;" alt=""></a>

                            <div class="collapse multi-collapse" id="multiCollapseExample2">
                                        <div class="cancel_pay"><a href="" data-bs-toggle="modal" data-bs-target="#cancel_pay">Возврат</a></div>
<!-- возврат -->

<div class="modal fade" id="cancel_pay" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Возврат</h3>
      </div>
    <div class="modal-body">
        <div class="ticket_message">Вы действительно хотите вернуть билет?</div>
        <div class="inside_modal">
        <form action="./cancel_pay.php" method="post" enctype="multipart/form-data">    
        <input type="hidden" name="id_ticket" value="<?php echo $tickets['id']; ?>">
        <button type="submit" class="btn btn-light">Да</button>
        </form>
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Нет</button>
        </div>
          </div>
          </div>
        </div>
      </div>
                            </div>
                                    <?php } ?>
                                </div>
                            </td>
                        </tr>
                    <?php 
                    }   
                    }
                    ?>   

                    <div class="empty"><?php
                        if ($a == 0) {
                            echo 'У вас пока нет билетов'; ?>
                            <img id="empty" src="images/empty.png" alt="">
                <?php  }  
                    ?>
                    </div>

                    <?php }
                    ?>
                        </tbody>
                      </table>
                  </div>
            </div> 
            </div>
        </div>
    </div>
</section>

 </body>
</html>