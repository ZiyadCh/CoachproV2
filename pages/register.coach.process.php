<?php
require_once "../classes/utilisateur.php";
$user = new user(null,$_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['password']);
$user->show();
?>
