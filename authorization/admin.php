<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Профиль администратора</title>
<meta charset="UTF-8">
</head>
<body>
<section class="profile-detail">
    <div class="container">
        <div class="row_profile">
            <form action="./correct_profile.php" method="post" enctype="multipart/form-data">
                <div class="profile-detail__personal">
                    <div>
                        <img src="<?= $_SESSION['user']['avatar'] ?>" width="200vh" height="200vh" alt="">
                    </div>
                       <div class="profile-text">
                        <div class="profile-title">
                            <h2><input type="text" name="full_name" value="<?php echo $_SESSION['user']['full_name'] ?>"></h2>
                        </div>
                        <div class="profile-email">
                            <i class="fa fa-envelope"></i>
                            <a href="#"><?= $_SESSION['user']['email'] ?></a>
                        </div>
                        <?php var_dump($_SESSION['user']['avatar']) ?>
                        <div>
                        <button type="submit" id="btncheck"><img width="25vh" id="check_profile" src="images/check.png"></button>
                        </div> 
                        <div>
                            <div class="logout"><a href="authorization/handler_form/logout.php" class="logout">Выход</a></div>
                        </div>
                       </div>  
                </div>
            </form>
            <div class="info_for_admin">
            <div class="cards">
           <div class="card">
                  <div class="card-body">
                    <div class="section-title">
                        <h4>Сеансы</h4>
                    </div>
                      <table class="table">
                        <tbody>
                            <?php 
                            $sql_sessions=$link->query("SELECT * FROM `schedule`");
                                foreach ($sql_sessions as $s): ?>
                        <tr>
                            <td><img src="images/tickets.png" alt=""></td>
                            <td><input type="text" id="nameses" name="nameses" value="<?php
                                $sql_film=$link->query("SELECT * FROM `films`");
                                    foreach ($sql_film as $f):
                                            if ($f['id'] == $s['id_film'])
                                                {
                                                    echo $f['name'];
                                                 }
                                    endforeach; ?>">
                            </td>
                            <form action="./correct_sessions.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_day" value="<?php
                                $sql_day=$link->query("SELECT * FROM `day`");
                                    foreach ($sql_day as $d):
                                            if ($d['id_day'] == $s['id_day'])
                                                {
                                                    echo $d['id_day'];
                                                 }
                                    endforeach; ?>">
                            <td><input type="text" id="date" name="date" value="<?php
                                $sql_day=$link->query("SELECT * FROM `day`");
                                    foreach ($sql_day as $d):
                                            if ($d['id_day'] == $s['id_day'])
                                                {
                                                    echo $d['day'];
                                                 }
                                    endforeach; ?>">
                            </td>
                            <td><button type="submit" id="btncheck-session"><img src="images/check.png" width="20vh"></td>
                            </form>
                            <form action="./delete_session.php" method="post" enctype="multipart/form-data">
                            <input type='hidden' name="id_session" value='<?php echo $s['id_session'] ?>'>
                            <td><input type='submit' id="del" name="del" value='удалить'></td>
                            </form>
                        </tr>
                            <?php endforeach;?>
                        </tbody>
                      </table>
                    </div>
                  </div>

<!--                 <div class="card">
                  <div class="card-body">
                    <div class="section-title">
                        <h4>Пользователи</h4>
                    </div>
                      <table class="table">
                        <tbody>
                            <?php 
                            $sql_users=$link->query("SELECT * FROM `users`");
                                foreach ($sql_users as $u): ?>
                        <tr>
                            <td><img src="<?php echo $u['avatar'];?>" alt=""></td>
                            <td><?php echo $u['full_name'];?></td>
                            <td><?php echo $u['email'];?></td>
                        </tr>
                            <?php endforeach;?>
                        </tbody>
                      </table>
                    </div>
                  </div>  -->
</div>
        <div class="films">
            <div class="section-title">
              <h4>Фильмы</h4>
            </div>
            <table class="table" style="width: auto;">
            <?php $sql=$link->query("SELECT * FROM `films`");
                foreach ($sql as $flm): ?>
                <form action="./correct_films.php" method="post" enctype="multipart/form-data">
                <tr>
                   <td><a href="index.php?page=openFilm&id=<?php echo $flm['id']; ?>"><img src="<?php echo $flm['imgs'];?>" width=240vh;></a></td>
                   <input type="hidden" name="id" value="<?php echo $flm['id'];?>">
                   <td><div class="filminfo">
                <div class="film__details__title">
                    <h3><input type="text" name="name" id="name" value="<?php echo $flm['name'];?>"><button type="submit" id="btncheck"><img src="images/check.png" width="20vh"></h3>
                </div>
                <div class="film_rating">
                    <div class="ep"><input type="text" id="rating" name="rating" value="<?php echo $flm['rating'];?>">/10</div>
                    <div class="pr"><input type="text" id="price" name="price" value="<?php echo $flm['price'];?>">₽</div>
                </div>
                    <p><input type="text" name="descr" id="descr" value="<?php echo $flm['descr'];?>"></p>
                <div class="film__details__widget">
                    <div class="row">
                     <div class="film_info">
                          <ul>
                            <li><span>Жанр:</span><input type="text" name="genre" id="genre" value="<?php
                                $sql_gen=$link->query("SELECT * FROM `genre`");
                            foreach ($sql_gen as $gen):
                            if ($gen['id_genre'] == $flm['genre']) {
                                echo $gen['name']; }
                            endforeach; ?>"></li>
                            <li><span>Год выпуска:</span><input type="text" id="year" name="year" value="<?php echo $flm['year'];?>"></li>
                            <li><span>Режиссёр:</span><input type="text" name="director" id="director" value="<?php echo $flm['director'];?>"></li>
                            <li><span>Страна:</span><input type="text" name="country" id="country" value="<?php echo $flm['country'];?>"></li>
                            <li><span>Длительность:</span><input type="text" name="lasting" id="lasting" value="<?php echo $flm['lasting'];?>"></li>
                            <li><span>Главные герои:</span><input type="text" name="main_roles" id="main_roles" value="<?php echo $flm['main_roles'];?>"></li>
                          </ul>
                        </div>
                    </div>
                </div>
                    </td>
                </tr>
                 </form>
                <?php endforeach;?>
            </table>

        </div>
</div>
                </div>
              </div>
</section>

</body>
</html>



