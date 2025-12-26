<?php
session_start();
require_once "../classes/reservation.php";

$reservation = new reservation(1,1,1);
$seance_id = $_POST['seance_id'];
echo $seance_id;
$reservation->insert($seance_id,$_SESSION['id']);
header("location: dashboard.sportif.php");
exit();

?>