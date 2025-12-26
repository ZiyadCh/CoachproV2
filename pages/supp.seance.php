<?php
require "../classes/seance.php";
$s = new seance(0,0,0,0,0);
$s->delete($_POST['seance_id']);
?>