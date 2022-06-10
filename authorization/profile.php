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
        <h4 class="modal-title" id="exampleModalLabel">Редактирование профиля</h4>
    </div>
    <div class="modal-body">
        <?php $sql=$link->query("SELECT * FROM `users` WHERE `id` = '$id_user'");
        foreach($sql as $users): ?>
        <form action="./correct_profile.php" method="post" enctype="multipart/form-data">
        <div class="input__items">
            <input type="text" name="full_name" id="full_name" value="<?php echo $users['full_name']; ?>" placeholder="Имя" pattern="^\S{2,16}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Имя должно быть не менее 2-х и не более 16 символов, не содержать пробелы' : '');" required>
        </div>
        <div class="input__items">
            <input type="email" name="email" id="email_correct" value="<?php echo $users['email']; ?>" placeholder="Email">
        </div>
        <div class="buttons_yn">
        <button type="submit" id="save" class="btn btn-dark" data-bs-dismiss="modal">Сохранить</button>
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Отменить</button>
        </div>
        </form>
    <?php endforeach; ?>
        </div>
          </div>
        </div>
      </div>

<!-- редактирование аватарки -->
<div class="modal fade" id="correct_avatar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Редактирование аватарки</h4>
    </div>
    <div class="modal-body">
        <?php 
        foreach($sql as $users): ?>
        <form action="./correct_avatar.php" method="post" enctype="multipart/form-data">
        <div class="edit_avatar">
            <img src="<?php echo $users['avatar']; ?>" width="200vh" height="200vh" alt="">
        <div class="input__items">
            <div class="file-input2">
            <input type="file" name="avatar" id="file" class="file" value="<?php echo $users['avatar']; ?>">
                <label for="file">
                Выбрать изображение
                <p class="file-name"></p>
                </label>                             
                        </div>
        </div>
        </div>
        <div class="buttons_yn">
        <button type="submit" id="save" class="btn btn-dark" data-bs-dismiss="modal">Сохранить</button>
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Отменить</button>
        </div>
        </form>
        </div>
          </div>
        </div>
      </div>


<section class="profile-detail">
    <div class="container">
        <div class="row_profile">
                <div class="profile-detail__personal">
                    <div class="avatars_profile">
                        <img src="<?php echo $users['avatar']; ?>" width="200vh" height="200vh" alt="">
                    <div>
                        <a data-bs-toggle="modal" data-bs-target="#correct_avatar"><img src="images/plus.png" id="upload" alt=""></a>
                    </div>
                    </div>
                       <div class="profile-text">
                        <div class="profile-title">
                            <h2><?php echo $users['full_name']; ?></h2>
                        </div>
                        <div class="profile-email">
                            <i class="fa fa-envelope"></i>
                            <a href="#"><?php echo $users['email']; ?></a>
                        </div>
                        <div>
                        <a data-bs-toggle="modal" data-bs-target="#correct_profile"><img width="25vh" id="edit_profile" src="images/edit.png"></a>
                        </div> 
                        <div>
                            <div class="logout"><a href="authorization/handler_form/logout.php" class="logout">Выход</a></div>
                        </div>
                       </div>  
                </div>
            <?php endforeach; ?>
        <div class="middle">
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar">
                        <div class="product__sidebar__view">
                            <div class="section-title">
                                <h4>Рекомендации</h4>
                            </div>
                                   <?php
        $i=0;
        $sql=$link->query("SELECT * FROM `films` ORDER BY `year` DESC");
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
                  <div class="card-body">
                      <table class="table">
                <div class="section-title">
                        <h4>Билеты</h4>
                 </div>
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
            $day =  $tickets['day'];
            $time =  $tickets['time'];
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
                                <div class="day_ticket"><span>Дата:</span>
                                <?php $sql_day= $link->query("SELECT * FROM `day`");
                                        foreach($sql_day as $day):
                                    if ($tickets['day'] == $day['id_day']) {
                                        $idd = $day['id_day'];
                                        echo date_format(date_create($day['day']), 'd-m-Y');
                                    }
                                endforeach; ?>
                                </div>
                                <div class="time_ticket"><span>Время:</span><?php
                                      $sql_time= $link->query("SELECT * FROM `time`");
                                foreach($sql_time as $time):
                                    if ($tickets['time'] == $time['id_time']) {
                                       echo date_format(date_create($time['time']), 'H:i');
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
                            <a data-toggle="collapse" href="javascript:void(0)" onclick="showHide('<?php echo $tickets['id'] ?>')" aria-expanded="false" aria-controls="multiCollapseExample1" style="font-size: 16px; color: #a4a4a4;"><img src="images/more.png" style="padding-top: 10px;" alt=""></a>


                            <div class="collapse multi-collapse" id="<?php echo $tickets['id'] ?>">
            <div class="cancel_bron"><a href="" data-bs-toggle="modal" data-bs-target="#cancel_bron">Отменить бронь</a></div>
            <div class="pay_bron"><a href="" data-bs-toggle="modal" data-bs-target="#pay_bron">Оплатить</a></div>

        </div>
                        
                                        

<!-- отмена бронирования -->

<div class="modal fade" id="cancel_bron" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Отмена бронирования</h4>
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

    
<!-- оплата забронированного билета -->

<div class="modal fade" id="pay_bron" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Оплата билета</h4>
      </div>
      <form action="./pay_bron.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_ticket" value="<?php echo $tickets['id']; ?>">
    <div class="modal-body">
        <table id="pay_form">
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
        <div class="buttons_yn">
        <button type="submit" id="save" class="btn btn-dark" data-bs-dismiss="modal">Оплатить</button>
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Отменить</button>
        </div>  
    </div>
</form>
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
        <h4 class="modal-title" id="exampleModalLabel">Возврат билета</h4>
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
                            echo 'У вас пока нет билетов :('; ?>
<lord-icon
    src="https://cdn.lordicon.com/tdxypxgp.json"
    trigger="loop-on-hover"
    colors="primary:#ffffff,secondary:#ff5722"
    style="width:110px;height:110px; margin-left: 120px;">
</lord-icon>
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
<script type="text/javascript">
            function showHide(element_id) {
                //Если элемент с id-шником element_id существует
                if (document.getElementById(element_id)) { 
                    //Записываем ссылку на элемент в переменную obj
                    var obj = document.getElementById(element_id); 
                    //Если css-свойство display не block, то: 
                    if (obj.style.display != "block") { 
                        obj.style.display = "block"; //Показываем элемент
                    }
                    else obj.style.display = "none"; //Скрываем элемент
                }
                //Если элемент с id-шником element_id не найден, то выводим сообщение
                else alert("Элемент с id: " + element_id + " не найден!"); 
            }   
</script>
 </body>
</html>