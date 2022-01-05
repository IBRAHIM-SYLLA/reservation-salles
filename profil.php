<?php
include 'header.php';
    $bdd=mysqli_connect('localhost','root','','reservationsalles');
    mysqli_set_charset($bdd,'utf8');
    if(!empty($_POST))
    {
        $login= $_POST['login'];
        $password=$_POST['password'];
        $passw2=$_POST['password2'];
        $id=$_SESSION['utilisateurs']['id'];
        $requete=mysqli_query($bdd, "UPDATE `utilisateurs` SET `login`= '$login', `password`= '$password' WHERE `id`= '$id'");
        $_SESSION['utilisateur']['password']=$password;
        $_SESSION['utilisateur']['login']=$login;
    }
    elseif(!$_SESSION)
    {
        header('Location: connexion.php');
        exit();
    }
?>
<h1>PROFIL</h1>
<p>ici vous pouvez le modifier </p>
    <div class="form">
        <form action="profil.php" method="POST">
            <label for="login">Login:</label>
            <input id = "input" type="text" name="login" id="login" value="<?php echo $_SESSION['utilisateur']['login'] ?>">
            <label for="password">Mot de passe:</label>
            <input id = "input" type="password" name="password" id="password" value="<?php echo $_SESSION['utilisateur']['password'] ?>">
            <label for="password2">Confirmez votre mot de passe:</label>
            <input id = "input" type="password" name="password2" id="password2" value="<?php echo $_SESSION['utilisateur']['password'] ?>">
            <input type="submit" value="submit" name="submit">
        </form>
    </div>

<?php
include 'footer.php';
?>