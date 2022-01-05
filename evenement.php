<?php
include 'header.php';
$bdd = mysqli_connect('localhost', 'root','','reservationsalles');
mysqli_set_charset($bdd, 'utf8');
$requete = mysqli_query($bdd, 'SELECT * FROM `reservations` WHERE 1');
$reservations = mysqli_fetch_all($requete, MYSQLI_ASSOC);
?>
<table>
        <thead>
            <tr>
                <th>id</th>
                <th>titre</th>
                <th>description</th>
                <th>debut</th>
                <th>fin</th>
                <th>id utilisateur</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($reservations as $reservation){
                    echo'<tr><td>'.$reservation['id'].'</td>';
                    echo'<td>'.$reservation['titre'].'</td>';
                    echo'<td>'.$reservation['description'].'</td>';
                    echo'<td>'.$reservation['debut'].'</td>';
                    echo'<td>'.$reservation['fin'].'</td>';
                    echo'<td>'.$reservation['id_utilisateur'].'</td>';
                }
            ?>
        </tbody>
</table>
<?php
include 'footer.php';
?>