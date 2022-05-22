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
    <div class="container">
        <div class="row_profile">
            <form action="./correct_profile.php" method="post" enctype="multipart/form-data">
                <div class="profile-detail__personal">
                    <div>
                        <img src="authorization/avatars/default.png" width="200vh" height="200vh" alt="">
                    </div>
                       <div class="profile-text">
                        <div class="profile-title">
                            <h2><input type="text" name="full_name" value="<?php echo $_SESSION['user']['full_name'] ?>"></h2>
                        </div>
                        <div class="profile-email">
                            <i class="fa fa-envelope"></i>
                            <a href="#"><?= $_SESSION['user']['email'] ?></a>
                        </div>
                        <div>
                        <button type="submit" id="btncheck"><img width="25vh" id="check_profile" src="images/check.png"></button>
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
            $kol =  $tickets['number_tickets']; 
            $flm_m = [];
            foreach ($sql_m as $film_m) {
                if($film_m['id'] == $a){
                $flm_m= $film_m;
                break;  
                }  
            }

            ?>    
                        <tr>                  <div class="section-title">
                        <h4>Билеты</h4>
                    </div>
                            <td><img id="img_ticket" src="<?php echo $flm_m['imgs'];?>"></td>
                            <td><div class="film_ticket"><?php echo $flm_m['name']; ?></div>
                                <div class="day_ticket"><span>Дата и время сеанса:</span><?php $sql_sch= $link->query("SELECT * FROM `schedule`");
                                      $sql_day= $link->query("SELECT * FROM `day`");
                                foreach($sql_sch as $sch):
                                    if ($sch['id_film'] == $flm_m['id']) {
                                        foreach($sql_day as $day):
                                    if ($sch['id_day'] == $day['id_day']) {
                                        echo $day['day'];
                                    }
                                endforeach;
                                    }
                                endforeach;
                        ?></div>
                                <div class="lasting_ticket"><span>Длительность:</span><?php echo $flm_m['lasting'] ?></div>
                                <div class="place_ticket"><span>Место:</span></div>
                                <div class="row_ticket"><span>Ряд:</span></div>
                                <div class="kol_ticket"><span>Количество билетов:</span><?php echo $kol.'шт.'; ?></div>
                                <div class="price_ticket"><span>Стоимость:</span><?php echo $kol*$flm_m['price'].'₽'; ?></div>
                                <div class="status_ticket"><span>Статус:</span></div>
                            </td>
                        </tr>
                    <?php $Sum +=$kol*$flm_m['price'];
                    }   
                    }?>   

                    <div class="empty"><?php
                        if ($kol == 0) {
                            echo 'У вас пока нет билетов';?>
                            <img id="empty" src="images/empty.png" alt=""><?php  
                        }  
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