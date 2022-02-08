<?php

class Reservationpdo{

    private $id;
    public $titre;
    public $desci;
    public $debut;
    public $event;
    public $idresa;

    public function __construct(){
        $bdd = new PDO("mysql:host=localhost;dbname=reservationsalles",'root','');
        $bdd->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        $this->bdd = $bdd;
        return $bdd;
    }

    public function register_reservation($titre, $desci, $debut){
        $id =  $_SESSION['utilisateurs']['id'];
        $insert = "INSERT INTO `reservations`(`titre`,`description`, `debut`, `id_utilisateur`) VALUE (:titre, :desci, :debut, :id)";
        $result = $this->bdd->prepare($insert);
        $result->bindValue(':titre', $titre, PDO::PARAM_STR);
        $result->bindValue(':desci', $desci, PDO::PARAM_STR);
        $result->bindValue(':debut', $debut, PDO::PARAM_STR);
        $result->bindValue(':id', $id, PDO::PARAM_STR);
        $result->execute();

    }
    public function affiche_reservation($event){

        $recup_reservation = "SELECT reservations.id, titre, description, DATE_FORMAT(debut,'%d/%m/%Y à %Hh%imin%ss') as debut, id_utilisateur, login
        FROM reservations INNER JOIN utilisateurs ON utilisateurs.id=reservations.id_utilisateur
        WHERE debut = :event";
        $result = $this->bdd->prepare($recup_reservation);
        $result->bindValue(':event', $event, PDO::PARAM_STR);
        $result->execute();
        $fetch = $result->fetch();
        return $fetch;
    }
    public function reservation($idresa){
        $reservation = "SELECT reservations.id, `titre`, `description`, `login`, DATE_FORMAT(debut,'%d/%m/%Y à %Hh%imin%ss') as `debut`,`id_utilisateur`,`login`
        FROM `reservations` INNER JOIN utilisateurs ON utilisateurs.id=reservations.id_utilisateur WHERE reservations.id = :idresa";
        $result = $this->bdd->prepare($reservation);
        $result->bindValue(':idresa', $idresa, PDO::PARAM_INT);
        $result->execute();
        $fetch = $result->fetchAll();
        return $fetch;
    }
}