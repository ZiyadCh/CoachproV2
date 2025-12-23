<?php
require_once "../classes/utilisateur.php";
$user = new user(1,$_POST['nom'],$_POST['prenom'],$_POST['email'],'sportif',$_POST['password']);
$user->show();
?>

