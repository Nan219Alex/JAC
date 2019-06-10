<?php
include("bdd.php");
if (isset($_SESSION['nom']) and isset($_SESSION['nom'])) 
{

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cursus</title>
	<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

</head>
<body style="background-image:url('images/informatique-4.jpg'); background-size: cover;">

<!-- MENU -->
	<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <ul>
      <li><i class="fa fa-clock-o"></i> Lundi. - Dimanche. 08h - 18h</li>
      <li><i class="fa fa-phone"></i> +00 (225) 68 971 041 || +00 (225) 72 151 686</li>
      <li><i class="fa fa-envelope-o"></i> japprendsacoder@gmail.com</li>
      <li><a href="profil.php" title="<?php echo $_SESSION['nom'].' '.$_SESSION['prenom'] ?>"><img src="images\demo\avatar.png" style="max-width: 18px;max-height: 18px;"></a></li>
      <li><a href="deconnexion.php" title="Déconnexion"><i class="fa fa-lg fa-sign-out"></i></a></li>
    </ul>
  </div>
</div>
<div class="bgded overlay" style="background: initial;

<?php
	if (isset($_SESSION['email']) and $_SESSION['email']=="yapialex293@gmail.com") 
	{
		echo "background-size: cover;";
	}
	else
	{
		echo "height: 450px";
	}

?>"> 
  <div class="wrapper row1">
    <header id="header" class="hoc clear"> 
      <div id="logo" class="fl_left" style="border:1px solid black;">
        <h1><a href="index.php">JAC <span style="text-transform: lowercase; font-style: italic; font-size: 19px;">( J'apprends à coder )</span></a></h1>
      </div>
      <nav id="mainav" class="fl_right">
  <ul class="clear">
    <li class="active"><a href="index.php">Accueil</a></li>
    <li><a class="drop" href="#">quiz</a>
      <ul>
        <li><a href="#">Level 1</a></li>
        <li><a class="drop" href="#">Level 2</a>
          <ul>
            <li><a href="#">Level 1</a></li>
            <li><a href="#">Level 2</a></li>
            <li><a href="#">Level 3</a></li>
          </ul>
        </li>
        <li><a href="#">Level 3</a></li>
      </ul>
    </li>
    <li><a class="drop" href="#">cours</a>
      <ul>
        <li><a href="pages/gallery.html">HTML-CSS</a></li>
        <li><a href="pages/full-width.html">BOOTSTRAP</a></li>
        <li><a href="pages/sidebar-left.html">JAVASCRIPT</a></li>
        <li><a href="pages/sidebar-right.html">PHP-Mysql</a></li>
        <li><a href="pages/basic-grid.html">SQL</a></li>
      </ul>
    </li>
    
    	<li><a href="#" class="drop">Forum</a></li>
    <?php
	?>
    <li><a href="profil.php">Mon Profil</a></li>
  </ul>
</nav>
    </header>
  </div>
  <div id="pageintro" class="hoc clear" style="margin-top: 70px;">
    <article> 
      <h3 class="heading">Bienvenue <span style="color: #F7AF9D"><?php echo $_SESSION['nom']; ?></span> sur la plateforme</h3><br>
      <?php
      if (isset($_SESSION['email']) and $_SESSION['email']=="yapialex293@gmail.com") 
		{
	  ?>
	  	<p align="center" style="color: blue;">Vous êtes l'administrateur de cette plateforme</p>
    <?php
    }
      if (isset($_SESSION['email']) and $_SESSION['email']=="yapialex293@gmail.com")
      {
    ?>
      <p style="color: #F7AF9D;bottom: 1px;" align="center">Etudiants Connectés (<?php $Connectes = $bdd ->query("SELECT count(*) FROM inscription WHERE En_ligne=1");$MesConnectes = $Connectes ->RowCount();echo $MesConnectes;?>)</p>
      <?php
      }
      if($_SESSION['email']!="yapialex293@gmail.com")
      {
    ?>
      <h2 align="center" style="color: blue;"><?= isset($_SESSION['formation']) ? $_SESSION['formation']: ""; ?></h2>
    <?php
      }
      if (isset($_SESSION['email']) and $_SESSION['email']!="yapialex293@gmail.com") 
		{
	?>
      <p style="font-size: 16px; text-shadow: 5px 5px 5px black;">Vous avez décidé d'apprendre le <span style="color: blue;" title=""><?= isset($_SESSION['formation']) ? $_SESSION['formation']:""; ?></span> nous verrons ensemble les<br> notions de bases et tout ce qu'il faut pour que vous puissez programmer de vous-même.</p>
    <?php
  		}
  		else
  		{
  	?>
  			<p style="color: #F7AF9D;">Voir les activités de la plateforme et apporter des améliorations s'il y'a lieu.</p>
  	<?php
  		}
  	?>
      <footer>
        <ul class="nospace inline pushright">
    <?php
      if (isset($_SESSION['email']) and $_SESSION['email']!="yapialex293@gmail.com") 
		{
	?>
          <li><a class="btn" href="cours.php">Télecharger les cours</a></li>
    <?php
      }
      else
      {
      ?>	
			<li><a class="btn" href="#">Voir les cours</a></li>
      	<?php
      }
    ?>
        <li><a class="btn inverse" href="#">
      	<?php 

      		if (isset($_SESSION['email']) and $_SESSION['email']=="yapialex293@gmail.com") 
      		{
      			echo "Messages... ";
      		}
      		else
      		{
      			echo "Passer les quiz";
      		}
      	?>
       	</a></li>

          <li><a class="btn" href="" onclick="projetmois();">Projet</a></li>
			<?php
				if(isset($_SESSION['email']) and $_SESSION['email']=="yapialex293@gmail.com")
				{
			?>
				<li><a class="btn inverse" href="#">Voir les participants</a></li>
				<li><a class="btn" href="#">Resultats quiz</a></li>
			<?php

				}
			?>
        </ul>
      </footer>
      
    
    </article>
  </div>
	<?php
		if (isset($_SESSION['email']) and $_SESSION['email']!="yapialex293@gmail.com") 
		{
	?>
			<div style="margin-top: 60px;text-align: center;text-transform: uppercase;">
				<p style="color: #F7AF9D;bottom: 1px;">Apprendre tout en restant chez soi.</p>
			</div>
	<?php
		}
	?>
	

</div>

<!-- FIN MENU -->

<?php include("js.html"); ?>
</body>
</html>
<?php
}
else
{
  header("location:connexion.php");
}
?>