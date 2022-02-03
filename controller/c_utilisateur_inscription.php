<?php
require_once('./model/m_Utilisateurs.php');
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
            $user = new Userpdo;
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
   ?>