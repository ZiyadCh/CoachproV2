<?php 
session_start();
require "../classes/utilisateur.php";

if ($_POST) {
$user = new user(null,null,null,null,null,0);
   $user->login($_POST['email'],$_POST['password']);
}

?>