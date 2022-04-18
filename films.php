<?php 
require('connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Фильмы</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/plyr.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
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
                                <div class="col-lg-8 col-md-8 col-sm-6">
                                    <div class="section-title">
                                        <h4>Фильмы</h4>
                                    </div>
                                </div>
                                        <div class="sort">
                    <forma action="">
                    <select class="selecter" onchange="location=value">
                        <option value="" selected="selected">Сортировка по названию</option>
                        <option value="index.php?page=sort&id_sort=1">А-Я</option>
                        <option value="index.php?page=sort&id_sort=2">Я-А</option>
                    </select>
                    </forma>

                </div>
                            </div>
                            </div>
                        </div>

                        <div class="row">
                              <?php 
                                foreach ($sql as $flm): ?>

                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg"><a href="index.php?page=openFilm&id=<?php echo $flm['id']; ?>"><img src="<?php echo $flm['imgs'];?>"></a>
                                        <div class="ep">18 / 18</div>
                                        <div class="view"><?php echo $flm['year'];?></div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li><div class="age"><?php echo "+", $flm['age'];?></div></li>
                                            <h5><a href="index.php?page=openFilm&id=<?php echo $flm['id']; ?>"><?php echo $flm['name'];?></a></h5>
                                        </ul>
                                        
                                    </div>
                                </div>
                            </div>

                                    <?php endforeach;?>
                    </div>
                   
                </div>
                <div class="filter" style="width: 17%;">
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
                        <a href="index.php?page=film_age&id_genre=<?php
                    echo $age['id_age'];?>"> <?php
                    echo "+",$age['age'];?>
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

<!-- Js Plugins -->
<script src="js/main.js"></script>
</body>

</html>