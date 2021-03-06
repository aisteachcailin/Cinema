<?php 
require('connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Фильмы</title>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="index.php?page=index"><i class="fa fa-home"></i>Главная</a>
                        <a href="index.php?page=films">Фильмы</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Section Begin -->
    <section class="product-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product__page__content">
                        <div class="product__page__title">
                            <div class="row">
                                    <div class="section-title">
                                        <h4>Фильмы</h4>
                                    </div>
                    <div class="sort">
                        <div class="sort_text"><a href="index.php?page=film_genre&id_genre=0"><img src="images/loading.png" id="reset" alt=""></a>Сортировать:</div>
                        <forma action="" method="get">
                    <select class="selecter" onchange="location=value">
                        <option value="" selected="selected">По названию</option>
                        <option value="index.php?page=sort&id_sort=1">А-Я</option>
                        <option value="index.php?page=sort&id_sort=2">Я-А</option>
                    </select>
                    <select class="selecter" onchange="location=value">
                        <option value="" selected="selected">По цене</option>
                        <option value="index.php?page=sort&id_sort=3">по возрастанию</option>
                        <option value="index.php?page=sort&id_sort=4">по убыванию</option>
                    </select>
                    </forma>

                    </div>
                    <form name="date_to" method="post" action="date.php">
                      <div class="form-group">
                        <input type="date" name="date_to" id="datepicker" class="form-control">
                        <button type="submit" id="btncheck"><img src="images/check.png" width="20vh">
                      </div>
                    </form>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                              <?php 
                                foreach ($sql as $flm): ?>

                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg"><a href="index.php?page=openFilm&id=<?php echo $flm['id']; ?>"><img src="<?php echo $flm['imgs'];?>"></a>
                                        <div class="ep"><?php echo $flm['rating']."/10";?></div>
                                        <div class="view"><?php echo $flm['year'];?></div>
                                        <div class="price"><img src="images/ticket.png"><?php echo $flm['price'].'₽';?></div>
                                    </div>
                                    <div class="product__item__text">
                              <p>  <?php
                                $sql_gen=$link->query("SELECT * FROM `genre`");
                                    foreach ($sql_gen as $gen):
                                            if ($gen['id_genre'] == $flm['genre'])
                                                {
                                                    echo "Жанр: ".$gen['name'];
                                                 }
                                    endforeach; ?></p>
                                        <ul>
                                            <li><div class="age"><?php echo "+", $flm['age'];?></div></li>
                                            <h5><a href="index.php?page=openFilm&id=<?php echo $flm['id']; ?>"><?php echo $flm['name'];?></a></h5>
                                        </ul>
                                        
                                    </div>
                                </div>
                            </div>
                                    <?php endforeach;?>
                    </div>
                    <div class="empty_request">
                        <?php 
                         if ($flm['id'] == "") { ?>
                            <lord-icon
                            src="https://cdn.lordicon.com/msoeawqm.json"
                            trigger="loop"
                            colors="primary:#ffffff,secondary:#ff5722"
                            style="width:60px;height:60px">
                            </lord-icon>
                         <?php  echo "К сожалению, по вашему запросу ничего не найдено"; } ?>
                    </div>
                </div>
                <div class="filter_genre" style="width: 17%;">
            <div class="cat">
            
            <div class="section-title">
                <h4>Жанры</h4>
            </div>
            </div>
            <nav>
                <ul>
                    <?php
                    $sql_gen=$link->query("SELECT * FROM `genre`");
                    foreach ($sql_gen as $gen):
                    ?>

                    <li>
                        <a href="index.php?page=film_genre&id_genre=<?php
                    echo $gen['id_genre'];?>"> <?php
                    echo $gen['name'];?>
                         </a>
                        
                    </li>
                <?php endforeach; ?>
                 <li><a href="index.php?page=film_genre&id_genre=0">Все</a></li>

                </ul>
            </nav>

            <div class="cat">
            
            <div class="section-title">
                <h4>Возраст</h4>
            </div>
            </div>
            <nav>
                <ul>
                    <?php
                    $sql_age=$link->query("SELECT * FROM `age`");
                    foreach ($sql_age as $age):
                    ?>

                    <li>
                        <a href="index.php?page=film_age&id_age=<?php
                    echo $age['id_age'];?>"> <?php
                    echo "+".$age['age'];?>
                         </a>
                        
                    </li>
                <?php endforeach; ?>
                 <li><a href="index.php?page=film_age&id_age=0">Все</a></li>

                </ul>
            </nav>
            </div>
</div>
</div>
</section>
<!-- Product Section End -->
<script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
</body>

</html>