<?php
    session_start();
    if ($_SESSION['user']) {
        header('Location: index.php?page=profile');
    }
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>

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

    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="images/cinema.jpg">
    </section>
    <!-- Normal Breadcrumb End -->

    <!-- Signup Section Begin -->
    <section class="signup spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Регистрация</h3>
                        <form action="authorization/handler_form/signup.php" method="post" enctype="multipart/form-data">
                            <div class="input__item">
                                <input type="text" name="full_name" placeholder="ФИО">
                                <span class="icon_profile"></span>
                            </div>
                             <div class="input__item">
                                <input type="text" name="login" placeholder="Логин">
                                <span class="icon_profile"></span>
                            </div>
                            <div class="input__item">
                                <input type="email" placeholder="Электронная почта">
                                <span class="icon_mail"></span>
                            </div>
                            <div class="input__item">
                                <input type="password" name="password "placeholder="Пароль">
                                <span class="icon_lock"></span>
                            </div>
                            <div class="input__item">
                                <input type="password" name="password_confirm"placeholder="Подтверждение пароля">
                                <span class="icon_lock"></span>
                            </div>
                            <div class="input__item">
                                <input type="file" name="avatar">
                                <span class="icon_image"></span>
                            </div>
                            <button type="submit" class="site-btn">Зарегистрироваться</button>
                        <!-- </form> -->
                        <h5>У вас уже есть аккаунт? <a href="index.php?page=authorization">Войти</a></h5>
                                 <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?> 
    </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__social__links">
                        <h3>Вход с помощью:</h3>
                        <ul>
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i>Facebook</a>
                            </li>
                            <li><a href="#" class="google"><i class="fa fa-google"></i>Google</a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i>Twitter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Signup Section End -->

    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/player.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>