<?php
include 'bdd.php';
$affiche =false;
if (isset($_POST['reinitialiser'])) 
{
  $mdp1 = $_POST['mdp']; // Récupère le mot de passe sans le crypter
  $mdp = sha1($_POST['mdp']);
  $r_mdp = sha1($_POST['r_mdp']);

  if (strlen($mdp1) <3) 
  {
    $MdpCourt = "<font color=red>Votre mot de passe est trop court </font>";
  }
  else
  {
    if ($mdp == $r_mdp) 
    {
      $UpdateMdp = $bdd -> prepare("UPDATE inscription SET Password = ? WHERE Email = ?");
      $UpdateMdp -> execute(array($mdp,$_SESSION['Email_reini']));

      if ($UpdateMdp) 
      {
        $affiche =true;
      }
    }
    else
    {
      $MdpDiff = "<font color=red>Votre mot de passe n'est identique.</font>";
    }

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
  <link rel="stylesheet" href="css/reinitialiser.css">
</head>
<body style="background-image:url('images/informatique-4.jpg'); background-size: cover;">

  <!-- Reinitilisation du mot de passe  -->
    <div id="formu">
      <form class="formulaire" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" style="
      <?php 

        if ($affiche==true) 
        {
          echo "display: none";
        }
      ?>">
          <p class="clearfix">
            <h3 style="text-transform: none;text-align: center;">Réinitialisation du mot de passe</h3>
            <hr style="width: 30%;height: 2px;margin: 0 auto;background-color: blue;">
          </p>
          <p class="clearfix" style="width: 100%;margin-top: 20px;">
              <label for="password" style="text-transform: none;">Mot de passe</label>
              <input type="password" name="mdp" id="password" placeholder="Mot de passe" required>
              <span style="float: right;font-size: 14px;">
                <?= isset($MdpCourt) ? $MdpCourt :""; ?>
              </span>
          </p>
          <p class="clearfix" style="width: 100%;">
              <label for="password" style="text-transform: none;">Confirmer le mot de passe</label>
              <input type="password" name="r_mdp" id="password" placeholder="Mot de passe" required>
              <span style="float: right;font-size: 14px;">
                <?= isset($MdpDiff) ? $MdpDiff :""; ?>
              </span>
          </p>
          <p class="clearfix" style="width: 100%;">
              <input type="submit" name="reinitialiser" value="Réinitialiser mot de passe" style="display: inline;background: linear-gradient(to left,black,#F7AF9D);margin-right: 2px;text-transform: uppercase;">
          </p>   
      </form>

      <!-- Message de réinitialisation de mot de passe OK -->
    <form class="formulaire" id="formu" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" style="
    <?php 

    if ($affiche==false) 
    {
      echo "display: none";
    }
    ?>">
      <p class="clearfix">
        <h3 style="text-transform: none;color:white;text-shadow: 13px 14px 1px black; ">Votre mot de passe a été réinitialiser avec succès.</h3>
        <div style="text-align: center">
          <span style="color: blue;">
            &raquo;&raquo;&raquo;
          </span>
          <a class="retour" href="connexion.php" style="color: #F7AF9D"> 
            Connectez-vous avec votre nouveau mot de passe.
          </a>
          <span style="color: blue;">
            &laquo;&laquo;&laquo;
          </span>
        </div>
      </p>
    </form>
      <!-- Fin de réinitialisation de mot de passe -->

    </div>
  </div>

</div>

</body>
</html>