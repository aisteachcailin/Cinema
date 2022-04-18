<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сеанс</title>
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
                        <span>Сеанс</span>
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
                                <div class="rating">
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star-half-o"></i></a>
                                </div>
                            </div>
                            <p><?php echo $flm['descr'];?></p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Жанр:</span><?php echo $flm['genre'];?></li>
                                            <li><span>Год выпуска:</span><?php echo $flm['year'];?></li>
                                            <li><span>Режиссёр:</span><?php echo $flm['director'];?></li>
                                        </ul>
                                    </div>
                                </div>
                                <table>
    <!-- счетчик количество товаров -->
    <form id="form1" name="form1" action="add_cart.php" method="post">
        
        <tr>
            <td>
        <div class="input-group quantity_flms">
            <input type="button" value="-" id="button_minus">
            <input type="number" step="1" min="1" max="10" id="num_count" name="quantity" value="1" title="Qty" >
            <input type="button" value="+" id="button_plus">
        </div>
        <!-- начало невидимой части формы -->
        <input type="hidden"  name="film_id" value="<?php echo $flm['id']?>" />
        <!-- конец невидимой части формы -->
            </td>
            <td>
            <div class="openedProduct-price">
            <?php echo $flm['price'].'p';?>
            </div>
            </td>
        </tr>
    <tr><td><input class='add_to_cart' type="submit" value="В корзину" name="submit"></td></tr>
    </form>
    </table>    
          </div>
          </div>
         </div>
        </div>
    </div> 
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
    </body>

    </html>