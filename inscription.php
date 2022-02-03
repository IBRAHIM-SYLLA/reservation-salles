<?php
include 'header.php';
require_once ('controller/c_utilisateur.php');
// $login = $_POST['login'];
// $password = $_POST['password'];
// $utilisateur->utilisateur_connect();
// $utilisateur->inscription('login', 'password');
// $error = $utilisateur->inscription($_POST);
?>

<h1>INSCRIPTION</h1>
            <!-- <p>//$error</p> -->
        <div class="form">
            <form action="" method="post">
                <label for="login">Login:</label>
                <input id = "input" type="text" name="login" id="login">
                <label for="password">Mot de passe:</label>
                <input id = "input" type="password" name="password" id="password">
                <label for="password2">Confirmez votre mot de passe:</label>
                <input id = "input" type="password" name="password2" id="password2">
                <input type="submit" value="submit" name="submit">
            </form>
        </div>
        <a href="connexion.php">Déjà inscrit?</a>

<?php
include 'footer.php'
?>