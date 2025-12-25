<?php
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require_once "../classes/reservation.php";

$reservation = new reservation(1,1,1);
$reservation->getSeanceId();

?>