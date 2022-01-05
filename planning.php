<?php
    include 'header.php';
    $bdd= mysqli_connect('localhost','root','','reservationsalles');
    mysqli_set_charset($bdd,'utf8');

$reque2 = mysqli_query($bdd, "SELECT `titre`, `login` FROM `reservations` INNER JOIN `utilisateurs` ON utilisateurs.id = reservations.id");

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


<h1>PLANNING DE RESERVATION</h1>
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
                    $reque = "SELECT reservations.id, titre, description, DATE_FORMAT(debut,'%d/%m/%Y à %Hh%imin%ss') as debut,
                    DATE_FORMAT(fin,'%d/%m/%Y à %Hh%imin%ss') as fin, id_utilisateur,login
                    FROM reservations INNER JOIN utilisateurs ON utilisateurs.id=reservations.id_utilisateur
                    WHERE debut = '$event'";
                    $creneau = mysqli_query($bdd, $reque);
                    $fetch = mysqli_fetch_all($creneau, MYSQLI_ASSOC);
                    if(mysqli_num_rows($creneau)){
                         echo "<a href='reservation.php'>".$fetch[0]['login'].' '.$fetch[0]['titre']."</a>";  
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

<?php
    include 'footer.php';
?>