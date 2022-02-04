<?php

class Reservationpdo{

    private $id;
    public $titre;
    public $desci;
    public $debut;
    public $fin;

    public function __construct(){
        $bdd = new PDO("mysql:host=localhost;dbname=reservationsalles",'root','');
        $bdd->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        $this->bdd = $bdd;
        return $bdd;
    }

    public function register_reservation($titre, $desci, $debut, $fin){
        $id =  $_SESSION['utilisateurs']['id'];
        $insert = "INSERT INTO `reservations`(`titre`,`description`, `debut`, `fin`, `id_utilisateur`) VALUE (:titre, :desci, :debut, :fin, :id)";
        $result = $this->bdd->prepare($insert);
        $result->bindValue(':titre', $titre, PDO::PARAM_STR);
        $result->bindValue(':desci', $desci, PDO::PARAM_STR);
        $result->bindValue(':debut', $debut, PDO::PARAM_STR);
        $result->bindValue(':fin', $fin, PDO::PARAM_STR);
        $result->bindValue(':id', $id, PDO::PARAM_STR);
        $result->execute();

    }
}