<?php
include 'header.php';
$idresa = $_GET['resa'];
$bdd = mysqli_connect('localhost', 'root', '', 'reservationsalles');
mysqli_set_charset($bdd, 'utf8');
$reque2= mysqli_query($bdd, "SELECT reservations.id, `titre`, `description`, `login`, DATE_FORMAT(debut,'%d/%m/%Y à %Hh%imin%ss') as `debut`,
DATE_FORMAT(fin,'%d/%m/%Y à %Hh%imin%ss') as `fin`, `id_utilisateur`,`login`
FROM `reservations` INNER JOIN utilisateurs ON utilisateurs.id=reservations.id_utilisateur WHERE reservations.id='$idresa'");
$fetch = mysqli_fetch_all($reque2, MYSQLI_ASSOC);
?>
<h1>RESERVATION ACTUELLE</h1>
<div class=fetch>
    <?php
        echo " Reservataire: ",$fetch[0]['login'],"&nbsp","<br>";
        echo "Titre: ",$fetch[0]['titre'],"&nbsp","<br>";
        echo "Description; ",$fetch[0]['description'],"&nbsp","<br>";
        echo "Debut: ",$fetch[0]['debut'],"&nbsp","<br>";
        echo "Fin: ",$fetch[0]['fin'],"&nbsp","<br>";
    ?>
    </div>
    <?php
include 'footer.php';
?>
