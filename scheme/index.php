<?php 
require('../connect.php');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Схема кинозала</title>
	<meta name="description" content="">
	<meta name="keywords" content=" ">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/media.css">
	<link rel="stylesheet" href="css/fonts.css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>

<body>
	<div class="scheme">
		<svg>

		<?php
             $sql_place=$link->query("SELECT * FROM `place`");
                foreach ($sql_place as $place):
        ?> 
			<a href="#">
				<path class="part" d="<?php echo $place['d'];?>" fill="#fff" description-data="<?php echo 'Ряд '.$place['row'].' Место '.$place['id_place'];?>">
			</a>

		<?php endforeach;?>		
		</svg>

			<div class="description">
				
			</div>

			<img src="media/Drawing.svg" alt="">
	</div>



	<script src="libs/html5shiv/es5-shim.min.js"></script>
	<script src="libs/html5shiv/html5shiv.min.js"></script>
	<script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="libs/respond/respond.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>