<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Схема кинозала</title>
	<link rel="stylesheet" href="scheme/css/scheme.css">

</head>

<body>

	 <div class="scheme">

<div class="places">
	<?php
      $sql_place=$link->query("SELECT * FROM `place`");
			foreach ($sql_place as $place): ?> 

<button onclick="style.backgroundColor='#ff5722'" class="place" id="btl_pl"><div class="number_place"><?php echo $place['place'];?></div></button>
			<?php endforeach; ?>

</div>

</div>
 
		<a href="reserve_tickets.php"><button type="submit" class="btn btn-dark">Забронировать билеты</button>
      <a href="pay_tickets.php"><button type="button" class="btn btn-light" >Оплатить билеты</button></a>
<!-- 
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
</script> -->

</body>
</html>