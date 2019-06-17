<?php
include("bdd.php");
if (isset($_SESSION['nom']) and isset($_SESSION['nom'])) 
{
  $EnLigne = $bdd->prepare("UPDATE inscription SET En_ligne=1 WHERE Email=?");
  $EnLigne->execute(array($_SESSION['email']));

  $premium = $bdd -> prepare("SELECT Premium from premium WHERE Premium=1 and Email =?");
  $premium ->execute(array($_SESSION['email']));
  $premiumYes = $premium->rowcount();
  if ($premiumYes ==1 ) 
  {
    $_SESSION['premium'] = true;
  }
  else
  {
    $_SESSION['premium'] =false;
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cursus</title>
	<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <link rel="stylesheet" href="css/cursus.css">
</head>
<body style="background-image:url('images/Informatique.large.jpeg');background-repeat: no-repeat; background-size: cover">

<!-- MENU -->
	
<div class="bgded overlay" style="

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
  <?php include('navMenuConnecter.php'); ?>
  <div id="pageintro" class="hoc clear" >
    <div id="formu">
    <article>
      <?php
    if (isset($_SESSION['email']) and $_SESSION['email']!="yapialex293@gmail.com") 
    {
  ?>
      <marquee>
        <div id="apprendre" style="text-transform: uppercase;text-shadow: 2px 10px 3px black;text-align: center;background: linear-gradient(to left,silver,black,#F7AF9D);margin-bottom: 50px;" class="badge">
        <p style="padding-top: 30px;padding-bottom: 30px;padding-left: 100px;padding-right: 100px;">Apprendre tout en restant chez soi.</p>
      </div>
    </marquee>
  <?php
    }
  ?>
      <h3 class="heading">Bienvenue <span style="color: #F7AF9D"> JAC 1.19</span> sur la plateforme</h3><br>
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
  </div>
	
	

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