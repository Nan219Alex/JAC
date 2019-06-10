<?php
include("bdd.php");
$PasEnLigne = $bdd -> prepare("UPDATE inscription SET En_ligne=? WHERE Email=? ");
$PasEnLigne -> execute(array(0,$_SESSION['email']));// Faire une mise à jour dans la base de donnée en mettant 0 pour dire que l'utilisateur s'est déconnecté
if ($PasEnLigne) 
{
	$_SESSION=array();
	session_destroy();
	header("location:index.php");
}

?>