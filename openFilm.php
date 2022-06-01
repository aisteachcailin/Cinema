<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Фильм</title>
</head>
<body>
    <div class="all">
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="index.php?page=index"><i class="fa fa-home"></i>Главная</a>
                        <a href="index.php?page=films">Фильмы</a>
                        <a href="#">Фильм "<?php echo $flm['name'].'"';?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <section class="film-details spad">
        <div class="container">
            <div class="film__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="film__details__pic set-bg"><img src="<?php echo $flm['imgs'];?>" width="100%"/>
                        </div>                    
                    </div>
                    <div class="col-lg-9">
                        <div class="film__details__text">
                            <div class="film__details__title">
                                <h3><?php echo $flm['name'];?>
                                </h3>
                            </div>
                            <div class="film__details__rating">
                                   <p>Рейтинг</p> <div class="ep"><?php echo $flm['rating']."/10";?></div>  
                            </div>
                            <p><?php echo $flm['descr'];?></p>
                            <div class="film__details__widget">
                                <div class="row">
                                        <div class="film_info">
                                        <div class="first_info" style="width: 85%;">
                                        <ul>
                                            <li><span>Жанр:</span><?php
                                $sql_gen=$link->query("SELECT * FROM `genre`");
                                    foreach ($sql_gen as $gen):
                                            if ($gen['id_genre'] == $flm['genre'])
                                                {
                                                    echo $gen['name'];
                                                 }
                                    endforeach; ?></li>
                                            <li><span>Год выпуска:</span><?php echo $flm['year'];?></li>
                                            <li><span>Режиссёр:</span><?php echo $flm['director'];?></li>
                                            <li><span>Страна:</span><?php echo $flm['country'];?></li>
                                        </ul></div>
                                       <div class="second_info"> <ul>
                                            <li><span>Длительность:</span><?php echo $flm['lasting'];?></li>
                                            <li><span>Главные герои:</span><?php echo $flm['main_roles'];?></li>
                                        </ul></div>
                                    </div>
                                    </div>
                                </div>              
                              </div>
                              </div>

                             </div>
    <section class="product spad film">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="trending__product">
                        <div class="row">
                    <div class="video__player">
                    <div class="section-title">
                                <h4>Трейлер</h4>
                            </div>
                        <?php echo $flm['videos'];?>

                 </div>
                        </div>
                    </div>
                    <div class="schedule">
                    <div class="section-title">
                                <h4>Сеансы</h4>
                     <div class="openFilm_price"><img src="images/ticket.png"><?php echo $flm['price'].'₽';?></div>
                    </div>
                    <hr>
    <table id="sessions_day_time">
        <?php $idf = $_SESSION['id_film']; ?>
        <tr>
        <?php $sql_d=$link->query("SELECT DISTINCT `id_day` FROM `schedule` WHERE `id_film` = '$idf'");
            foreach($sql_d as $d):
                $idd = $d['id_day']; ?>

                <?php $sql_day=$link->query("SELECT * FROM `day`"); 
                    foreach ($sql_day as $day):
                        if ($d['id_day'] == $day['id_day']) { ?>
                        <td><div class="day"><?php echo date_format(date_create($day['day']), 'd-m-Y');
                        } 
                    endforeach; ?>
                        </div></td>  

                <?php $sql_time=$link->query("SELECT * FROM `films` f JOIN `schedule` s ON f.`id` = s.`id_film` JOIN `day` d ON s.`id_day` = d.`id_day` JOIN `time` t ON s.`id_time` = t.`id_time` WHERE `id_film` = '$idf' AND s.`id_day` = '$idd'");
                    foreach ($sql_time as $time): ?>
                        <td><div class="time"><a href="index.php?page=scheme&id_film=<?php echo $time['id_film']; ?>&id_day=<?php echo $time['id_day']; ?>&id_time=<?php echo $time['id_time']; ?>">
                            <?php echo date_format(date_create($time['time']), 'H:i'); ?>
                        </a></div></td>
                    <?php endforeach;?> 
                </tr>
            <?php endforeach; ?>   
    </table>
                    <hr>
                    </div>
                    <div class="facts">
                    <div class="section-title">
                                <h4>Интересные факты</h4>
                            </div>
                            <p><?php echo $flm['facts'];?></p>
                            </div>
                </div>

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
             
        </div>
    </div>
     </section>
</div>
</div>
</div>

    </body>

    </html>