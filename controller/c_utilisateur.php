<?php
require_once('./model/user.php');
$user = new User;
    if(!empty($_POST['login']) && !empty($_POST['password']) && isset($_POST['login']) && isset($_POST['password']))
    {   
        $login=$_POST['login'];
        $password=$_POST['password'];
        $user->connect($login,$password);
            if(!empty($_SESSION["utilisateur"]) && isset($_SESSION["utilisateur"]))
            {
                if($_SESSION["utilisateur"]['login']=="admin")
                {
                    header('Location:profil.php');
                    exit();
                    
                }
                else
                {
                    header('Location:planning.php');
                    exit();
                }
            }    
    }
?>