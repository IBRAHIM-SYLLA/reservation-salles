<?php
require_once('./model/m_Utilisateurs.php');
$user = new Userpdo;
if (!empty($_POST)){
    if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['password2'])){
        $login = $_POST['login'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        $result = $user->update($login, $password);
    }
}

?>