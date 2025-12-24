<?php
session_start();
require_once "../classes/utilisateur.php";
require_once "../classes/sportif.php";
$_SESSION['nom'] = $_POST['nom'];
$_SESSION['prenom'] = $_POST['prenom'];
$user = new user(1,$_POST['nom'],$_POST['prenom'],$_POST['email'],'sportif',$_POST['password']);
$userId= $user->insert();
$sportif = new sportif();
$sportif->insertId($userId);
header("location: ../pages/dashboard.sportif.php");
?>

