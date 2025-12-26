<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ./login.php");
    exit();
}

require_once "../classes/seance.php";

$coach_id = $_SESSION['id'];
$date   = $_POST['date'];
$heure  = $_POST['heure'];
$duree  = $_POST['duree'];
$statut = 'disponible';


$seance = new seance($coach_id, $date, $heure, $duree, $statut);

$seance->creer();

header("location: dashboard.coach.php");
exit();
