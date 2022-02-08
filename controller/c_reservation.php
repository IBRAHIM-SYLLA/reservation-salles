<?php
require_once('./model/m_Reservations.php');
$resrvation = new Reservationpdo;

if(!empty($_POST)){
    $titre = ($_POST['titre']);
    $desci = ($_POST['description']);
    $debut = ($_POST['datedebut']).' '.($_POST['heuredebut']);
    if(empty($titre) || empty($desci) || empty($debut)){
                echo 'un champs est vide.';
    }
    elseif(isset($titre, $desci, $debut) && !empty($titre) && !empty($desci) && !empty($debut)){
        $resrvation->register_reservation($titre, $desci, $debut);
        header('Location: planning.php');
    }
}

?>