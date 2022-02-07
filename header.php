<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reservation.css">
    <title>Reservation de salles</title>
</head>
<body>
    <header>
        <?php
            if(!$_SESSION)
            {
                echo '<a href="connexion.php">CONNEXION</a>';
                echo '<a href="inscription.php">INSCRIPTION</a>';
            }
            else
            {
                echo '<a href="planning.php">PLANNING</a>';
                echo '<a href="reservation-form.php">RESERVATION</a>';
                echo '<a href="profil.php">PROFIL</a>';
                echo '<a href="index.php">ACCUEIL</a>';
                echo '<a href="deconnexion.php">DECONNEXION</a>';
            }
        ?>
    </header>
    <main>