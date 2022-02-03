<?php
include 'header.php';
// $bdd=mysqli_connect('localhost','root','','reservationsalles');
// mysqli_set_charset($bdd,'utf8');
//         if($_SESSION)
//         {
//             header('Location: index.php');
//             exit();
//         }
//         elseif(!empty($_POST))
//         {
//             $login= ($_POST['login']);
//             $password=($_POST['password']);
//             if (isset($login,$password) && !empty($login) && !empty($password))
//             {

//                 $requete=mysqli_query($bdd,"SELECT * FROM `utilisateurs` WHERE `login`='$login'");
//                 $utilisateur = mysqli_fetch_assoc($requete);
//                 if($password==$utilisateur["password"])
//                 {
//                     $_SESSION['utilisateur'] = $utilisateur;
//                     header('Location: index.php');
//                     exit();
//                 }
//                 else
//                 {
//                     echo "votre mot de passe est incorrect.";
//                 }
//             }
//         }
require_once ('controller/c_utilisateur.php');
// $utilisateur = new Utilisateur;
// $utilisateur->utilisateur_connect();
// $error = $utilisateur->connexion($_POST);
// var_dump($sql);
?>
    <h1>CONNEXION</h1>
        <div class="form">
            <form action="connexion.php" method="post">
                <label for="login">Login:</label>
                <input id = "input" type="text" name="login" id="login">
                <label for="password">Mot de passe:</label>
                <input id = "input" type="password" name="password" id="password">
                <input type="submit" value="submit" name="connexion">
            </form>
        </div>
        <a href="inscription.php">Pas encore inscrit?</a





<?php
include 'footer.php';
?>