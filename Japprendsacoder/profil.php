<?php
include ("bdd.php");
if (isset($_SESSION['nom']) and isset($_SESSION['email']))
{
  if (isset($_POST['retour'])) 
  {
  	header("location:cursus.php?id=".$_SESSION['id']);
  }
  if (isset($_POST['modifier'])) 
  {
  	$nom = htmlentities($_POST['nom']);
  	$prenom = htmlentities($_POST['prenom']);
  	$telephone = $_POST['telephone'];
    $mdp1 = $_POST['mdp'];
  	$mdp = sha1($_POST['mdp']);
  	$r_mdp = sha1($_POST['r_mdp']);


  	// MODIFICATION DU NOM
  	if ($_SESSION['nom'] != $nom) 
  	{
  		// mise à jour de du nom dans la base de donnée
  		$UpdateNom = $bdd -> prepare ("UPDATE inscription SET Nom=? WHERE Email=?");
  		$UpdateNom -> execute(array($nom,$_SESSION['email']));
  		if ($UpdateNom) 
  		{
  			// Mise à jour de la session nom
  			$_SESSION['nom'] = $nom;
  		}
  	}
  	// MODIFICATION DU PRENOM
  	if ($_SESSION['prenom'] != $prenom) 
  	{
  		// mise à jour de du prénom dans la base de donnée
  		$UpdatePrenom = $bdd -> prepare ("UPDATE inscription SET Prenom=? WHERE Email=?");
  		$UpdatePrenom -> execute(array($prenom,$_SESSION['email']));
  		if ($UpdatePrenom) 
  		{
  			// Mise à jour de la session prénom
  			$_SESSION['prenom'] = $prenom;
  		}
  	}
  	// MODIFICATION DU TELEPHONE
  	if ($_SESSION['telephone'] != $telephone) 
  	{
  		// Vérifier si le téléphone existe déjà

  		$VerifTelephone = $bdd -> prepare("SELECT * FROM inscription WHERE Telephone=?");
  		$VerifTelephone -> execute(array($telephone));
  		$CompteTelephone = $VerifTelephone -> RowCount();
  		if ($CompteTelephone==1) 
  		{
  			$ExisteTelephone = "<font color=red>Ce téléphone existe déjà.</font>";
  		}
  		else
  		{
  			// mise à jour de du téléphone dans la base de donnée
  			$Updatetelephone = $bdd -> prepare ("UPDATE inscription SET Telephone=? WHERE Email=?");
  			$Updatetelephone -> execute(array($telephone,$_SESSION['email']));
  			if ($Updatetelephone) 
  			{
  				// Mise à jour de la session telephone
  				$_SESSION['telephone'] = $telephone;
  			}
  		}
  	}
    if (strlen($mdp1)<=3) 
    {
      $MdpCourt = "<font color=red> Votre mot de passe est trop court </font>";
    }
    else
    {
      // VERIFIER SI LE MOT DE PASSE EST IDENTIQUE
      if ($mdp == $r_mdp) 
      {
        // mise à jour du mot de passe dans la base de donnée
        $UpdateMdp = $bdd -> prepare("UPDATE inscription set Password=? WHERE Email=?");
        $UpdateMdp -> execute(array($mdp,$_SESSION['email']));
      }
      else
      {
        $mdpInc= "<font color=red>Mot de passe incorrect</font>";
      }
    }


  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profil de <?= isset($_SESSION['nom']) ? $_SESSION['nom']." ".$_SESSION['prenom'] : "";  ?></title>
	<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <?php include "bootstrap.php"; ?>
	<link rel="stylesheet" href="css/profil.css">
</head>
<body style="background-image:url('images/informatique-4.jpg'); background-size: cover;">


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
  <form class="formulaire" action="profil.php" method="post">

          <p class="clearfix" style="width: 100%;">
              <label for="nom">Nom</label>
              <input type="text" name="nom" id="nom" value="<?= isset($_SESSION['nom']) ? $_SESSION['nom']: ""; ?>">
          </p>
          <p class="clearfix" style="width: 100%;">
              <label for="prenom">Prénom</label>
              <input type="text" name="prenom" id="prenom" value="<?= isset($_SESSION['prenom']) ? $_SESSION['prenom']: ""; ?>">
          </p>
           <p class="clearfix" style="width: 100%;">
              <label for="email">Email</label>
              <span style="text-align: center;font-size: 16px;color: blue"><?= isset($_SESSION['email']) ? $_SESSION['email'] : ""; ?></span>
          </p>
           <p class="clearfix" style="width: 100%;">
              <label for="tel">Téléphone</label>
              <input type="number" name="telephone" id="tel" value="<?= isset($_SESSION['telephone']) ? $_SESSION['telephone']: ""; ?>">
              <span style="float: right;">
              	<?= isset($ExisteTelephone)? $ExisteTelephone: ""; ?>
              </span>
          </p>
          <p class="clearfix" style="width: 100%;">
            <label for="formation">Formation</label>
            <span style="text-align: center; font-size: 16px;color: blue"><?= isset($_SESSION['formation']) ? $_SESSION['formation'] : ""; ?></span>
          </p>
          <p class="clearfix" style="width: 100%;">
          	<label for="mdp">Mot de passe</label>
          	<input type="password" name="mdp" id="mdp" value="<?= isset($_SESSION['mdp1']) ? $_SESSION['mdp1']: ""; ?>">
            <span style="float: right;">
              <?= isset($MdpCourt)? $MdpCourt: ""; ?>
            </span>
          </p>
          <p class="clearfix" style="width: 100%;"><nobr>
          	<label for="r_mdp">Confirmer votre Mot de passe</label>
          	<input type="password" name="r_mdp" id="r_mdp">
            <span style="float: right;">
              <?= isset($mdpInc)? $mdpInc: ""; ?>
            </span>
          </p>
          <?php
            if (isset($_SESSION['email']) and $_SESSION['email']!="yapialex293@gmail.com") 
          {
          ?>
          <p class="clearfix" style="color: red;width: 100%">
          	<div class="progress">
              <div class="progress-bar" role="progressbar" style="width:50%">50%</div>
            </div>
          </p>
          <?php
          }
          ?>
          <p class="clearfix" style="color: red;width: 100%">
          	<input type="submit" name="modifier" value="modifier" style="text-transform: uppercase;display: inline;background: linear-gradient(to left,black,#F7AF9D);margin-right: 2px">
          	<input type="submit" name="retour" value="retour" style="text-transform: uppercase;float: right;display: inline;background: linear-gradient(to left,black,#F7AF9D)">
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