<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Схема кинозала</title>
    <link rel="stylesheet" href="scheme/css/scheme.css">
</head>

<body style="background-color: #05060b">
     <div class="scheme" style="margin-left: 130px;">
        <div class="places">
<table >
<?php
    for ($i=1;$i<=5;$i++):  ?> 
                <tr>
                    <td style="color: #fff; padding-right: 10px;"> <?php echo 'Ряд '.$i ?> </td>
                 <?php  for ($j=1;$j<=10;$j++):?>

                    <td>
                       <button class="place" style="background-color: #19bfb7;" id="btn" name="<?php echo $i;?>" value="<?php echo $j;?>" ></button>
                     </td>

                <?php 
                    endfor;
                ?>
                </tr>


            <?php 
     
         endfor;
?>
</table> 

        </div>
    </div>
</body>
</html>