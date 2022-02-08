<?php
include 'header.php';
require_once ('controller/c_reservation.php');
if(!$_SESSION)
{
    header('location: connexion.php');
        exit();
}
// $jourpost à  $dateheure[1]

?>
<h1>FORMULAIRE DE RESERVATION</h1>
<div class= form>
    <form action="" method="POST">
        <label for="titre">Titre:</label>
        <input id="input" type="text" name="titre" id="titre">
        <label for="description">Description:</label>
        <input id="input" type="text" name="description" id="description">
        <p> Vous voulez réservé le <?= $jourpost ?></p>
        <label for="datedebut">Date:</label>
        <input id="input" type="date" name="datedebut" value="fff" required>
        <label for="heuredebut">Heure:</label>
        <select id="heuredebut" name="heuredebut" required>
        <option value="">
            <?php if (!empty($_GET['date']) && isset($_GET['date'])){
            echo $dateheure[1];
            }
            else{
                echo "L'heure de debut";
            } ?></option>
            <option value=""></option>
            <option value="08:00:00">08h:00</option>
            <option value="09:00:00">09h:00</option>
            <option value="10:00:00">10h:00</option>
            <option value="11:00:00">11h:00</option>
            <option value="12:00:00">12h:00</option>
            <option value="13:00:00">13h:00</option>
            <option value="14:00:00">14h:00</option>
            <option value="15:00:00">15h:00</option>
            <option value="16:00:00">16h:00</option>
            <option value="17:00:00">17h:00</option>
            <option value="18:00:00">18h:00</option>

        </select>

        <input type="submit" value="submit" name="submit">
    </form>
</div>
<?php
include 'footer.php';
?>