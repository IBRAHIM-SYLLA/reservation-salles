<?php
    include 'header.php';
?>

<!----- main ------>
<h1>RESERVATION DE SALLES</h1>
<p>Bonjour et bienvenue, <?php if($_SESSION){echo$_SESSION['utilisateurs']['login'];}?></p>
<p>Vous trouverez ici le planning de réservation de la salle de ibra et Fredok.</p>
<p>La salle de ibra et Fredok est une salle d’environ 130 m² et d’une capacité d’accueil de 130 personnes assises.</p>
<p>Elle comprend :</p>
<p>20 tables rectangulaires de 8 personnes</p>
<p>130 chaises plastiques</p>
<p>Elle ne comprend pas :</p>
<p>Pas de cuisine, vous trouverez uniquement un évier ainsi qu’un réfrigérateur.</p>
<p>Les reservations démarrent a pratir de 8h00 et se terminent a 19h00</p>
<div class="tarif">
    <table>
        <thead>
            <th>TARIFS :</th>
            <th>1 Heure</th>
            <th>Heure supp.</th>
        </thead>
        <tbody>
            <tr>
                <td>Particulier</td>
                <td>50 €</td>
                <td>40 €</td>
            </tr>
            <tr>
                <td>Associations</td>
                <td>70€</td>
                <td>60€</td>
            </tr>
        </tbody>
    </table>
</div>
<?php
    include 'footer.php';
?>