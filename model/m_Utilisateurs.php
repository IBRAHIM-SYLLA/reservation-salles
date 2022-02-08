<?php

class Userpdo{
    private $id;
    public $login;
    public $password;
    public $bdd;

    public function __construct(){
        $bdd = new PDO("mysql:host=localhost;dbname=reservationsalles",'root','');
        $bdd->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        $this->bdd = $bdd;
        return $bdd;
    }

    public function register($login, $password){

        $insert = "INSERT INTO `utilisateurs`( `login`, `password`) VALUES (:login, :password)";
        $result = $this->bdd->prepare($insert);
        $result->bindValue(':login', $login, PDO::PARAM_STR);
        $result->bindValue(':password', $password, PDO::PARAM_STR);
        $result->execute();

    }
    public function connect($login, $password){
        $error = "";
        $requete2 = "SELECT * FROM utilisateurs WHERE login = :login";
        $result2 = $this->bdd->prepare($requete2);
        $result2->bindValue(':login', $login, PDO::PARAM_STR);
        $result2->execute();

        $fetch = $result2->fetchAll();
        if (count($fetch) > 0)
        {
            if(password_verify($password,$fetch[0]['password']) || $password==$fetch[0]['password'])
            {
                $_SESSION['utilisateurs']=
                [
                    'id'=>$fetch[0]['id'],
                    'login'=>  $fetch[0]["login"],
                    'password'=> $fetch[0]["password"],
                ];
                header('Location: index.php');
            }
        }
        else
        {
            $error = 'utilisateurs inconnu';
        }
        return $error;

    }
    public function disconnect(){
        session_destroy();
    }
    public function delete(){
        $requete3 = "DELETE FROM `utilisateurs` WHERE id = :id";
        $result3 = $this->bdd->prepare($requete3);
        $result3->bindValue(':id',$this->id, PDO::PARAM_STR);
        $result3->execute();
    }
    public function update($login, $password){
        $id =  $_SESSION['utilisateurs']['id'];
        $requete4 = "UPDATE utilisateurs SET login = :login, password = :password WHERE id = :iduser";
        $result4 = $this->bdd->prepare($requete4);
        $result4->bindValue( ':iduser', $id, PDO::PARAM_STR);
        $result4->bindValue(':password', $password, PDO::PARAM_STR);
        $result4->bindValue(':login', $login, PDO::PARAM_STR);
        $result4->execute();

        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $_SESSION['utilisateurs']['login']= $login;
        $_SESSION['utilisateurs']['password']= $password_hash;
        $message = '<h3>Bravo ! Profil mis a jour !</h3>';
        echo $message;
    }
    public function isConnected(){
        if(!empty($_SESSION['utilisateur'])){
            return true;
        }
        else{
            return false;
        }
    }
    public function getLogin(){
        return $this -> login;
    }
    public function getPassword(){
        return $this -> password;
    }
    public function getEmail(){
        return $this -> email;
    }
    public function getFirstname(){
        return $this -> firstname;
    }
    public function getLastname(){
        return $this -> lastname;
    }
}

?>