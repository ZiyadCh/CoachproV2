<?php
session_start();
require_once "../classes/utilisateur.php";
$_SESSION['nom'] = $_POST['nom'];
$_SESSION['prenom'] = $_POST['prenom'];
$user = new user(1,$_POST['nom'],$_POST['prenom'],$_POST['email'],'sportif',$_POST['password']);
$user->insert();
header("location: ../pages/dashboard.sportif.php");
?>

