<?php
include("bdd.php");
$affiche=false;
if (isset($_POST['reinitialiser'])) 
{
	$_SESSION['Email_reini'] = $email = $_POST['email'];
	if (filter_var($email,FILTER_VALIDATE_EMAIL)) 
	{
		$VerifEmail = $bdd->prepare("SELECT Email from inscription WHERE Email=?");
		$VerifEmail ->execute(array($email));
		$ExisteEmail = $VerifEmail->rowcount();
		if ($ExisteEmail==1) 
		{
			$EnvoieMail = mail($email,"Réinitialisation du mot de passe ","<a href='reinitialiser.php'>Cliquez sur ce lien pour réinitialiser votre mot de passe</a>");
			if ($EnvoieMail) 
			{
				 $affiche= true;
			}
			else
			{
				$EchecMail = "<font color=red>Le mail n'a pas pu être envoyé.</font>";
			}
		}
		else
		{
			$EmailNotExiste = "<font color=red> Ce mail n'existe pas.</font>";
		}
	}
	else
	{
		$EmailInvalide = "<font color=red>Votre Email n'est pas valide. </font>";
	}
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>JAC || J'apprends à coder une formation en ligne de qualité et d'expertise.</title>
  <meta charset="utf-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <link rel="stylesheet" href="css/forgot.css">
</head>
<body style="background-image:url('images/informatique-4.jpg'); background-size: cover;">

<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <ul>
      <li><i class="fa fa-clock-o"></i> Lundi. - Dimanche. 08h - 18h</li>
      <li><i class="fa fa-phone"></i> +00 (225) 68 971 041 || +00 (225) 72 151 686</li>
      <li><i class="fa fa-envelope-o"></i> japprendsacoder@gmail.com</li>
    </ul>
  </div>
</div>
<div class="bgded overlay">

  <div class="wrapper row1">
    <header id="header" class="hoc clear"> 
      <div id="logo" class="fl_left">
        <h1><a href="index.php">JAC <span style="text-transform: lowercase; font-style: italic; font-size: 19px;">( J'apprends à coder )</span></a></h1>
      </div>
      <nav id="mainav" class="fl_right">
          <ul class="clear">
            <li class="active"><a href="index.php">Accueil</a></li>
          </ul>
      </nav>
    </header>
  </div>

    <div id="formu">
		 <!-- Formulaire de réinitialisation de mot de passe en ajouant l'email -->
      <form class="formulaire" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" style="
      <?php  
		
		if($affiche==true)
		{
			echo "display: none";
		}

      ?>">
          <p class="clearfix">
            <h3 style="text-transform: none;text-align: center;">Réinitialisation de mot de passe</h3>
            <hr style="width: 30%;height: 2px;margin: 0 auto;background-color: blue;">
          </p>
          <p class="clearfix" style="width: 100%;margin-top: 20px;">
              <label for="email" style="text-transform: none;">Email</label>
              <input type="email" name="email" id="email" placeholder="Email" required value="<?= isset($email) ? $email: ''; ?>">
              <span style="float: right;font-size: 14px;">
              	<?= isset($EmailNotExiste) ? $EmailNotExiste : ""; ?>
              	<?= isset($EmailInvalide) ? $EmailInvalide : ""; ?>
              	<?= isset($EchecMail) ? $EchecMail : ""; ?>
              </span>
          </p>
          <p class="clearfix" style="width: 100%;">
              <input type="submit" name="reinitialiser" value="Recevoir le lien de réinitialisation" style="display: inline;background: linear-gradient(to left,black,#F7AF9D);margin-right: 2px;text-transform: uppercase;">
          </p>    
      </form>
      <!-- Fin du premier formulaire -->

      <!-- Début du formulaire de contact -->
		<form class="formulaire" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" style="
      <?php  
		
		if($affiche==false)
		{
			echo "display: none";
		}

      ?>;"
          <p class="clearfix">
			Nous vous avons envoyé un email pour vous aider à réinitialiser votre mot de passe.<br>
			<span style="color: blue;">&raquo;&raquo;&raquo;</span><a class="retour" href="connexion.php" style="color: #F7AF9D"> Retourner à la page de connexion.</a>
          </p>
          <p class="clearfix">
			
          </p>
      </form>
      <!-- Fin du formulaire de contact -->

    </div>
  </div>

</div>

</body>
</html>