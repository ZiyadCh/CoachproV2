<?php
session_start();
require_once "../classes/utilisateur.php";
require_once "../classes/coach.php";
$_SESSION['nom'] = $_POST['nom'];
$_SESSION['prenom'] = $_POST['prenom'];
$user = new user(null,$_POST['nom'],$_POST['prenom'],$_POST['email'],'coach',$_POST['password']);
$userId= $user->insert();
$coach = new coach($_POST['discipline'], $_POST['anneExp'], $_POST['bio']);
$coach->insertCoach($userId);
header("location: ../pages/dashboard.coach.php");
 exit();
?>
