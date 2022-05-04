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
    
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg"><img src="<?php echo $flm['imgs'];?>" width="100%"/>
                        </div>                    
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3><?php echo $flm['name'];?></h3>
                            </div>
                            <div class="anime__details__rating">
                                   <p>Рейтинг</p> <div class="ep"><?php echo $flm['rating']."/10";?></div>  
                            </div>
                            <p><?php echo $flm['descr'];?></p>
                            <div class="anime__details__widget">
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
                                            <li><span>Длительность:</span><?php echo $flm['lasting']." мин.";?></li>
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
                    <div class="anime__video__player">
                    <div class="section-title">
                                <h4>Трейлер</h4>
                            </div>
                        <?php echo $flm['videos'];?>

                 </div>
                        </div>
                    </div>
                    <div class="schedule">
                    <div class="section-title">
                                <h4>Расписание</h4>
                    </div>
                    <hr>
                    <form id="form1" name="form1" action="add_cart.php" method="post">
                    <table>
                        <td><p><?php
                                $sql_fday=$link->query("SELECT * FROM `films_day`");
                                $sql_day=$link->query("SELECT * FROM `day`");
                                    foreach ($sql_fday as $fday):
                                            if ($fday['id_film'] == $flm['id'])
                                                {

                                                foreach ($sql_day as $day):
                                                     if ($day['id_day'] == $fday['id_day'])
                                                {
                                                    echo $day['day'];
                                                }
                                                endforeach; 
                                                 }
                                    endforeach; 

                                    ?>
                                    
                                    </p></td>
                        <td><p><?php echo $flm['price'].'₽';?></p></td>
                        <td><p><div class="input-group quantity_flms">
                        <input type="button" value="-" id="button_minus">
                        <input type="number" step="1" min="1" max="10" id="num_count" name="quantity" value="1" title="Qty" >
                        <input type="button" value="+" id="button_plus">
                              </div>
                        <!-- начало невидимой части формы -->
                        <input type="hidden"  name="film_id" value="<?php echo $flm['id']?>" />
                        <!-- конец невидимой части формы --></p></td>
                        <td><p>
                            <input class='add_to_cart' type="submit" value="В корзину" name="submit"></p></td>
                    </table>
                    <hr>
                      </form>
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
         foreach ($sql as $flm): 
            $sql=$link->query("SELECT * FROM `films` ORDER BY `rating` DESC");
            $i++;
            if ($i > 3) {
                break;
            }
                ?>
                            <div class="filter__gallery">
                                <div class="product__sidebar__view__item set-bg mix day years"
                                data-setbg="<?php echo $flm['imgs'];?>">
                                <div class="ep"><?php echo $flm['rating']."/10";?></div>
                                <div class="view"><?php echo $flm['year'];?></div>
                                <h5><a href="index.php?page=openFilm&id=<?php echo $flm['id']; ?>"><?php echo $flm['name'];?></a></h5>
                                <!-- <div class="descr"><?php echo $flm['descr'];?></div> -->
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
             
        </div>
    </div>
     </section>

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
</div>
</div>
</div>

    </body>

    </html>