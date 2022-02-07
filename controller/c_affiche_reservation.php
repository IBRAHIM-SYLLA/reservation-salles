<?php
require_once('./model/m_Reservations.php');
$reservation = new Reservationpdo;

$idresa = $_GET['resa'];
$fetch = $reservation->reservation($idresa);
?>