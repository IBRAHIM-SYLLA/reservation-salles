<?php
require_once('./model/m_Reservations.php');
$resrvation = new Reservationpdo;

if(!empty($_POST)){
    $titre = ($_POST['titre']);
    $desci = ($_POST['description']);
    $debut = ($_POST['datedebut']).' '.($_POST['heuredebut']);
    $fin = ($_POST['datefin']).' '.($_POST['heurefin']);
    if(isset($titre, $desci, $debut, $fin) && !empty($titre) && !empty($desci) && !empty($debut) && !empty($fin))
    {
        $resrvation->register_reservation($titre, $desci, $debut, $fin);
    }
    header('Location: planning.php');
}

?>