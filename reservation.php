<?php
include 'header.php';
require_once ('controller/c_affiche_reservation.php');
?>
<h1>RESERVATION ACTUELLE</h1>
<div class=fetch>
    <?php
        echo " Reservataire: ",$fetch[0]['login'],"&nbsp","<br>";
        echo "Titre: ",$fetch[0]['titre'],"&nbsp","<br>";
        echo "Description: ",$fetch[0]['description'],"&nbsp","<br>";
        echo "Debut: ",$fetch[0]['debut'],"&nbsp","<br>";
    ?>
    </div>
    <?php
include 'footer.php';
?>
