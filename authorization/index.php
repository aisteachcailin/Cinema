<?php
if ($_SESSION['user']['role'] == 1) {
    header('Location: index.php?page=admin');}
if ($_SESSION['user']['role'] == 2) {
    header('Location: index.php?page=profile');}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
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

    <!-- Login Section Begin -->
    <section class="login spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Авторизация</h3>
                        <form action="authorization/handler_form/signin.php" method="post">
                            <div class="input__item">
                                <input type="text" name="login"placeholder="Логин">
                                <span class="icon_profile"></span>
                            </div>
                            <div class="input__item">
                                <input type="password" name="password" placeholder="Пароль">
                                <span class="icon_lock"></span>
                            </div>
                            <button type="submit" class="site-btn">Войти</button>
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
                    <div class="login__register">
                        <h3>У вас нет аккаунта?</h3>
                        <a href="index.php?page=register" class="primary-btn">Зарегистрироваться</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>

    <!-- Js Plugins -->
    <script src="js/main.js"></script>

</body>

</html>