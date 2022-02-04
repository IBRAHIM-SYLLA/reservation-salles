<?php
include 'header.php';
require_once ('controller/c_utilisateur_profil.php');
?>
<h1>PROFIL</h1>
<p>ici vous pouvez le modifier </p>
    <div class="form">
        <form action="profil.php" method="POST">
            <label for="login">Login:</label>
            <input id = "input" type="text" name="login" id="login" value="<?php echo $_SESSION['utilisateurs']['login'] ?>">
            <label for="password">Mot de passe:</label>
            <input id = "input" type="password" name="password" id="password" value="<?php echo $_SESSION['utilisateurs']['password'] ?>">
            <label for="password2">Confirmez votre mot de passe:</label>
            <input id = "input" type="password" name="password2" id="password2" value="<?php echo $_SESSION['utilisateurs']['password'] ?>">
            <input type="submit" value="submit" name="submit">
        </form>
    </div>

<?php
include 'footer.php';
?>