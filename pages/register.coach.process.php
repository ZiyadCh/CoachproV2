<?php
require_once "../classes/utilisateur.php";
$user = new user(1,$_POST['nom'],$_POST['prenom'],$_POST['email'],'coach',$_POST['password']);
$user->insert();
header("location: ../pages/dashboard.coach.php");
?>
