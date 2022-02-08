<?php
require_once('./model/m_Utilisateurs.php');
$user = new Userpdo;

if (!empty($_POST)){
    $login = $_POST['login'];
    $password = $_POST['password'];

    $result = $user->connect($login, $password);
}
if (empty($_POST)){
    echo "un champ et vide";
}
?>