<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cinema Universe</title>

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

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="hero__slider owl-carousel">
                <div class="hero__items set-bg" data-setbg="images/titan.jpg">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <h2>Титан</h2>
                                <p>После автоаварии, в которую Алекса попала в детстве, в голове у неё титановая пластина. 15 лет спустя она работает стриптизёршей, а когда беременеет совершенно невероятным образом, это провоцирует у девушки всплеск неконтролируемой агрессии.</p>
                                <a href="index.php?page=openFilm&id=13"><span>Купить билет</span> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                                <div class="hero__items set-bg" data-setbg="images/oxygen.jpg">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <h2>Кислород</h2>
                                <p>Женщина приходит в себя в криогенной камере и понимает, что не может вспомнить ни кто она такая, ни как здесь оказалась. Единственное, что может ей помочь — виртуальный помощник МИЛО, но он отказывается выполнять некоторые команды без пароля. А уровень кислорода тем временем неумолимо падает.</p>
                                <a href="index.php?page=openFilm&id=14"><span>Купить билет</span> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero__items set-bg" data-setbg="images/duna.jpg">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <h2>Дюна</h2>
                                <p>Новая экранизация одноимённого романа Фрэнка Герберта о том как наследник рода Атрейдесов отправляется на безжизненную планету Арракис, где обитают гигантские песчаные черви.</p>
                                <a href="index.php?page=openFilm&id=12"><span>Купить билет</span> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>В тренде</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="index.php?page=films" class="primary-btn">Посмотреть все <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>


                        <div class="row">
         <?php

         foreach ($sql as $flm): 
            $sql=$link->query("SELECT * FROM `films`");?>

                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg"><a href="index.php?page=openFilm&id=<?php echo $flm['id']; ?>"><img src="<?php echo $flm['imgs'];?>"></a>
                                        <div class="ep"><?php echo $flm['rating']."/10";?></div>
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
</div>
 <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar">
                        <div class="product__sidebar__view">
                            <div class="section-title">
                                <h5>Самый высокий рейтинг</h5>
                            </div>
                            <ul class="filter__controls">
                                <li class="active" data-filter="*">День</li>
                                <li data-filter=".week">Неделя</li>
                                <li data-filter=".month">Месяц</li>
                                <li data-filter=".years">Год</li>
                            </ul>
</div>
</section>


</div>
</body>

</html>