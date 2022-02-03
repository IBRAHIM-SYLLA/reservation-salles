<?php
require_once('./model/m_Utilisateurs.php');
$user = new Userpdo;
// class Utilisateur extends Userpdo{


     //Redirige l'utilisateurs si il est déja connecter.

  function utilisateur_connect()
    {
        if($_SESSION)
        {
            header('location: index.php');
            exit();
        }
    }
   function utilisateurs_deconnect()
    {
        if(empty($_SESSION))
        {
            header('location: connection.php');
            exit();
        }
    }

            if(!empty($_POST))
            {
            $login= $_POST['login'];
            $password=$_POST['password'];
            $passw2=$_POST['password2'];
            if(empty($login) || empty($password))
            {
                echo 'un champs est vide.';
            }
            elseif($password != $passw2)
            {
                    echo 'les mots de passes ne sont pas identiques.';
            }
            else
            {

                    $password = password_hash($password,PASSWORD_DEFAULT);
                    $user->register($login,$password);
                    header('Location: connexion.php');
            }
            }
    /**
     * Cette method permet a un utilisateur de se connecter.
     * @param array formulaires de connexion
     * @return string ou reconduit
     */
        if(!empty($_POST)){
            $login= $_POST['login'];
            $password=$_POST['password'];
            $utilisateurs->connect($login,$password);
            if(count($utilisateurs) > 0){
                $_SESSION['utilisateur'] = [
                    'id' => $utilisateurs[0]['id'],
                    'login' => $utilisateurs[0]['login'],
                    'password' => $utilisateurs[0]['password'],
                ];
            }
        }
                // else
                // {

                // if (!empty($_POST)){
                //     if (isset($_POST['login']) && isset($_POST['password']) && !empty($_POST['login']) && !empty($_POST['password'])){
                //         $login = $_POST['login'];
                //         $password = $_POST['password'];
                //         $this->connect_utilisateur($login,$password);
                //         if (count($utilisateurs) > 0){
                //             if(password_verify($password, $utilisateurs[0]['password']) || $password == $utilisateurs[0]['password']){
                //                 $_SESSION['utilisateurs'] = [
                //                     'id' => $utilisateurs[0]['id'],
                //                     'login' => $utilisateurs[0]['login'],
                //                     'password' => $utilisateurs[0]['password'],
                //                 ];
                //                 header('Location: index.php');
                //                 exit();
                //             }
                //         }
                //     }
                //     else{
                //         echo "<h3>login ou password incorrect</h3>";
                //     }
    // }

?>