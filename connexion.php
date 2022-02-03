<?php
include 'header.php';

require_once ('controller/c_utilisateur_connexion.php');
?>
    <h1>CONNEXION</h1>
        <div class="form">
            <form action="connexion.php" method="post">
                <label for="login">Login:</label>
                <input id="input" type="text" name="login" id="login">
                <label for="password">Mot de passe:</label>
                <input id="input" type="password" name="password" id="password">
                <input type="submit" value="submit" name="connexion">
            </form>
        </div>
        <?php var_dump($_POST); ?>
        <a href="inscription.php">Pas encore inscrit?</a





<?php
include 'footer.php';
?>