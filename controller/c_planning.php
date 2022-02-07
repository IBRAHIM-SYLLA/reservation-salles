<?php
require_once('./model/m_Reservations.php');
$reservation = new Reservationpdo;

        $lundi = date('Y-m-d', strtotime('monday this week'));
        $mardi = date('Y-m-d', strtotime('tuesday this week'));
        $mercredi = date('Y-m-d', strtotime('wednesday this week'));
        $jeudi = date('Y-m-d', strtotime('thursday this week'));
        $vendredi = date('Y-m-d', strtotime('friday this week'));
        $samedi = date('Y-m-d', strtotime('saturday this week'));
        $dimanche = date('Y-m-d', strtotime('sunday this week'));

        $week = [$lundi, $mardi, $mercredi, $jeudi, $vendredi];


        $time1 = '08:00:00';
        $time2 = '09:00:00';
        $time3 = '10:00:00';
        $time4 = '11:00:00';
        $time5 = '12:00:00';
        $time6 = '13:00:00';
        $time7 = '14:00:00';
        $time8 = '15:00:00';
        $time9 = '16:00:00';
        $time10 = '17:00:00';
        $time11 = '18:00:00';
        $time12 = '19:00:00';

        $times = [$time1, $time2, $time3, $time4, $time5, $time6, $time7, $time8, $time9, $time10, $time11, $time12];
        ?>

    <table id="plan">
    <thead>
        <th>lundi</th>
        <th>mardi</th>
        <th>mercedi</th>
        <th>jeudi</th>
        <th>vendredi</th>
    </thead>
        <?php
            foreach($times as $value){
        ?>
        <tr>
            <?php
                foreach($week as $values){
            ?>
                <td>
                <?php
                    $event= $values." ".$value;
                   $creneau = $reservation->affiche_reservation($event);
                //    var_dump($creneau);
                    if (!empty($creneau)){
                        $id = $creneau['id'];
                    }
                    if(!empty($creneau)){
                        ?>
                         <a href="reservation.php?resa=<?=$id?>">
                         <div>
                             <?=$creneau['login']?><br>
                             <?=$creneau['titre']?>
                        </div>
                         </a>
                         <?php
                    }
                    else {
                        echo "<a href='reservation-form.php'>$event</a>";
                    }
                ?>
                </td>
            <?php
            }
            ?>
        </tr>
        <?php
    }
    ?>
</table>
