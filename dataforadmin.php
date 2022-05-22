                <div class="profile-detail__info">
                    <div class="paid_tickets">
                        <p>Оплаченые Билеты</p>
                    <table class="ticket-info">
                            <?php
        $sql_m= $link->query("SELECT * FROM `films`");
        $Sum = 0;
        $sql_tickets= $link->query("SELECT * FROM `tickets`");
        
        if(isset($sql_tickets)){
       foreach($sql_tickets as $tickets ){
            if($tickets['id_user'] == $id_user){
            $a = $tickets['id_film'];
            $kol =  $tickets['number_tickets']; 
            $flm_m = [];
            foreach ($sql_m as $film_m) {
                if($film_m['id'] == $a){
                $flm_m= $film_m;
                break;  
                }   
            }

            ?> 
                        <tbody>
                            <tr>
                                <td>
                                    <em><?php echo '"'.$flm_m['name'].'"'; ?></em>
                                </td>
                                <td>
                                    <?php echo $flm_m['daytime']; ?>
                                </td>
                                <td>
                                   <?php echo $flm_m['daytime']; ?>
                                </td>
                                <td>
                                <?php echo $kol.'шт.'; ?>
                                </td>
                                <td>
                                <?php echo $kol*$flm_m['price'].'₽'; ?>
                                </td>
                                <td></td>
                            </tr>
                               <?php
        $Sum +=$kol*$flm_m['price'];
        }   
        }        
        }
        ?>
        <tr>
             <td align="right" colspan="5"><b> <?php echo 'Всего: '.$Sum.'₽' ?></b></td>
         </tr>
                        </tbody>
                    </table>

                </div>
                            <div class="reserve_tickets">
                        <p>Забронированные Билеты</p>
                    <table class="ticket-info">
                            <?php
        $sql_m= $link->query("SELECT * FROM `films`");
        $Sum = 0;
        $sql_reserve= $link->query("SELECT * FROM `reserve`");
        
        if(isset($sql_reserve)){
       foreach($sql_reserve as $reserve ){
            if($reserve['id_user'] == $id_user){
            $a = $reserve['id_film'];
            $kol =  $reserve['number_tickets']; 
            $flm_m = [];
            foreach ($sql_m as $film_m) {
                if($film_m['id'] == $a){
                $flm_m= $film_m;
            ?>
                <?php break;  
                }   
            }

            ?> 
                        <tbody>
                            <tr>
                                <td>
                                    <em><?php echo '"'.$flm_m['name'].'"'; ?></em>
                                </td>
                                <td>
                                    <?php echo $flm_m['daytime']; ?>
                                </td>
                                <td>
                                   <?php echo $flm_m['daytime']; ?>
                                </td>
                                <td>
                                <?php echo $kol.'шт.'; ?>
                                </td>
                                <td>
                                <?php echo $kol*$flm_m['price'].'₽'; ?>
                                </td>
                                <td><script src="//megatimer.ru/get/ec30f003f1b6b3aed7cd53dc7ad44e1e.js"></script></td>
                            </tr>
                               <?php
        $Sum +=$kol*$flm_m['price']; 
        }   
        }        
        }
        ?>
        <tr>
             <td align="right" colspan="5"><b> <?php echo 'Всего: '.$Sum.'₽' ?></b></td>
             <td></td>
         </tr>
        <?php $sql_del_res= $link->query("DELETE FROM `reserve` WHERE date_added < now() - interval 60 second");
          ?>
                        </tbody>
                    </table>

                </div>
            </div>