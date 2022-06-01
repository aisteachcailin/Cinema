<?php
    session_start();
    $id_user = $_SESSION['user']['id'];
    if ($_SESSION['user']) {
        header('Location: index.php?page=profile');
    }
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>

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
                                <input type="text" name="full_name" placeholder="Имя" pattern="^\S{2,16}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Имя должно быть не менее двух символов' : '');" required>
                                <span class="icon_profile"></span>
                            </div>
                             <div class="input__item">
                                <input type="text" name="login" placeholder="Логин" pattern="^\S{5,16}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Логин должен быть не менее 6 символов' : '');" required>
                                <span class="icon_profile"></span>
                            </div>
                            <div class="input__item">
                                <input type="email" name="email" placeholder="Электронная почта">
                                <span class="icon_mail"></span>
                            </div>
                            <div class="input__item">
                                <input type="password" name="password" placeholder="Пароль" pattern="^\S{5,16}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Пароль должен быть не менее 6 символов' : '');" required>
                                <span class="icon_lock"></span>
                            </div>
                            <div class="input__item">
                                <input type="password" name="password_confirm" placeholder="Подтверждение пароля">
                                <span class="icon_lock"></span>
                            </div>
                            
                                <div class="file-input">
                                <input type="file" name="avatar" id="file" class="file">
                                  <label for="file">
                                    Выбрать аватар
                                    <p class="file-name"></p>
                                  </label>                             
                                </div>
                            
                            <button type="submit" class="site-btn" value="create">Зарегистрироваться</button>
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
                    <div class="have_account"><h3>У вас уже есть аккаунт?</h3>
                        <button class="site-btn" id="login_btn"><a href="index.php?page=authorization">Войти</a></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Signup Section End -->

    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="js/main.js"></script>
    <script>
        const file = document.querySelector('#file');
file.addEventListener('change', (e) => {
  // Get the selected file
  const [file] = e.target.files;
  // Get the file name and size
  const { name: fileName, size } = file;
  // Convert size in bytes to kilo bytes
  const fileSize = (size / 1000).toFixed(2);
  // Set the text content
  const fileNameAndSize = `${fileName} - ${fileSize}KB`;
  document.querySelector('.file-name').textContent = fileNameAndSize;
});
    </script>

</body>

</html>