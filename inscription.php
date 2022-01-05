<?php 
include 'header.php';
    $bdd=mysqli_connect('localhost','root','','reservationsalles');
    mysqli_set_charset($bdd, 'utf8');
    if($_SESSION)
    {
        header('location: index.php');
        exit();
    }
    if(!empty($_POST))
    {
        $login= $_POST['login'];
        $password=$_POST['password'];
        $passw2=$_POST['password2'];
        if(isset($login,$password) && !empty($login) &&  !empty($password))
        {
            $requete=mysqli_query($bdd,"SELECT * FROM `utilisateurs` WHERE `login`='$login'");
            // mysqli_num_rows($nomrequete)=verif si le pseudo existe
            if(mysqli_num_rows($requete))
            {
                echo "Ce pseudo  est déjà utilisé!";
            }
            elseif($password == $passw2)
            {
                $insert=mysqli_query($bdd,"INSERT INTO `utilisateurs`(`login`, `password`) VALUES ('$login','$password')");
                header('Location: connexion.php');
                exit();
            }
            else
            {
              echo "les mots de passes ne sont pas identiques";
            }
        }
        else
        {
                echo "un champs est vide.";
        }
    }
?>

<h1>INSCRIPTION</h1>
        <div class="form">
            <form action="" method="POST">
                <label for="login">Login:</label>
                <input type="text" name="login" id="login">
                <label for="password">Mot de passe:</label>
                <input type="password" name="password" id="password">
                <label for="password2">Confirmez votre mot de passe:</label>
                <input type="password" name="password2" id="password2">
                <input type="submit" value="submit" name="submit">
            </form>
        </div>
        <a href="connexion.php">Déjà inscrit?</a>

<?php
include 'footer.php'
?>