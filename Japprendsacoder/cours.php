<?php
include ("bdd.php");
if (isset($_SESSION['nom']) and isset($_SESSION['email']))
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profil de <?= isset($_SESSION['nom']) ? $_SESSION['nom']." ".$_SESSION['prenom'] : "";  ?></title>
	<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
	<link rel="stylesheet" href="css/cours.css">
</head>
<body style="background-image:url('images/informatique-4.jpg'); background-size: cover;">

<!-- MENU -->

<div class="bgded overlay" style="background: initial;

<?php
	if (isset($_SESSION['email']) and $_SESSION['email']=="yapialex293@gmail.com") 
	{
		echo "height: 100%";
	}
	else
	{
		echo "height: 100%";
	}

?>"> 
 <?php include('navMenuConnecter.php'); ?>
  <div id="formu">
  	<form class="formulaire" method="post">
    	
    	<p class="clearfix" style="margin-left: 15px;width: 100%">
    		<span>Cours_php.pdf</span><br>
    		<span>FastPHP.pdf</span><br>
    		<span>Php_Mysql.pdf</span>
    	</p>
		<p class="clearfix">
			<a href="#" download="php_mysql.zip" title="Télécharger le cour en pdf">
	    	<div style="width: 100%;border: 1px solid white;">
	    		<h4 align="center" class="mattelechar" style="margin: 4px 4px;color: #F7AF9D;text-transform: none;">Télécharger Pdf</h4>
	    	</div>
    	</p>
    	<p class="clearfix" style="margin-left: 15px;width: 100%;color: white">
    		<span>Dans ces différentes vidéos vous découvrirez comment :</span><br>
    		<span>- Apprendre à créer sa base de donnéé avec Mysql</span><br>
    		<span>- Comment connecter php avec sa base de donnée</span><br>
    		<span>- Envoyer des mails en local</span><br>
    		<span>- Gestion d'administration</span><br>
    		<span>...</span>
    	</p>
        <p class="clearfix">
			<a href="#" download="php_mysql_videos.zip" title="Télécharger les vidéos">
	    	<div style="width: 100%;border: 1px solid white" class="telecharge">
	    		<h4 align="center" class="mattelechar" style="margin: 4px 4px;color: #F7AF9D;text-transform: none;">Télécharger Vidéos</h4>
	    	</div>
    	</p>

	</form>
</div>

</body>
</html>
<?php
}
else
  header("location:connexion.php");
?>