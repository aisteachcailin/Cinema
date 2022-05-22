<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Схема кинозала</title>
	<link rel="stylesheet" href="scheme/css/scheme.css">

</head>

<body>
    <!-- модальное окно оплаты билетов -->
<div class="modal fade" id="pay_tickets" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        ...
      </div>
    </div>
  </div>
</div>

	 <div class="scheme">

<div class="places">
	<?php
      $sql_place=$link->query("SELECT * FROM `place`");
			foreach ($sql_place as $place): ?> 

<button onclick="style.backgroundColor='#ff5722'" class="place" id="btl_pl"><div class="number_place"><?php echo $place['place'];?></div></button>
			<?php endforeach; ?>

</div>

</div>
    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#pay_tickets">Забронировать билеты</button>
    <a href="#pay_tickets"><button type="button" class="btn btn-light" >Оплатить билеты</button></a>

</body>
</html>