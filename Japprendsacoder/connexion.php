<?php
include ("bdd.php");

if (isset($_POST['connexion'])) 
{
  $_SESSION['email'] = $email = $_POST['email'];
  $mdp = sha1($_POST['mdp']);
  $ip = $_SERVER['REMOTE_ADDR'];// On récupère l'ip de l'utilisateur
  

  $verifUserEmail = $bdd -> prepare("SELECT * FROM inscription WHERE Email=?");
  $verifUserEmail -> execute(array($email));
  $existeUserEmail = $verifUserEmail ->rowcount();

  if ($existeUserEmail==1) 
  {
    $verifUserMdp = $bdd -> prepare("SELECT * FROM inscription WHERE Password=?");
    $verifUserMdp -> execute(array($mdp));
    $existeUserMdp = $verifUserMdp ->rowcount();
    if ($existeUserMdp==1) 
    {
      // On récupère toutes les informations de l'utilisateur enregistré dans notre base de donnée
      $CompteUser = $bdd->prepare("SELECT * FROM inscription WHERE Email=? and Password=?");
      $CompteUser ->execute(array($email,$mdp));
      $RecupInfoUser = $CompteUser -> fetch();
      $_SESSION['nom'] = $RecupInfoUser['Nom'];
      $_SESSION['prenom'] = $RecupInfoUser['Prenom'];
      $_SESSION['id'] = $RecupInfoUser['Id'];
      $_SESSION['telephone'] = $RecupInfoUser['Telephone'];
      $_SESSION['email'] = $RecupInfoUser['Email'];
      $_SESSION['mdp'] = $RecupInfoUser['Password'];
      $_SESSION['formation'] = $RecupInfoUser['Formation'];

      header("location:cursus.php");
    }
    else
    {
      $mdpExiste = "<font color=red>Mot de passe est incorrect</font>";
    }
  }
  else
  {
    $emailExiste = "<font color=red>Votre mail est incorrect</font>";
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
  <link rel="stylesheet" href="css/connexion.css">
</head>
<body style="background-image:url('images/informatique-4.jpg'); background-size: cover;margin: 0;padding: 0;">

  <div class="wrapper row1">
    <header id="header" class="hoc clear"> 
      <div id="logo" class="fl_left">
        <h1><a href="index.php" style="float: left;margin-left: 0px;">JAC <span style="text-transform: lowercase; font-style: italic; font-size: 19px;">( J'apprends à coder )</span></a></h1>
      </div>
      <nav id="mainav" class="fl_right" style="float: right;margin-right: 0px;">
          <ul class="clear">
            <li class="active"><a href="index.php">Accueil</a></li>
          </ul>
      </nav>
    </header>
  </div>
  <!-- FORMULAIRE DE CONNEXION  -->
    <div id="formu">
      <form class="formulaire" action="connexion.php" method="post">
          <p class="clearfix">
            <h3 style="text-transform: uppercase;text-align: center;">Connexion</h3>
          </p>
          <p class="clearfix" style="width: 100%;">
              <label for="login">Email</label>
              <input type="email" name="email" id="login" placeholder="Email" required value="
              <?= 
                isset($_SESSION['email']) ? $_SESSION['email'] :'';
              ?>">
              <span style="float: right;font-size: 14px;">
                <?= isset($emailExiste) ? $emailExiste :"" ; ?>                
              </span>
          </p>
          <p class="clearfix" style="width: 100%;">
              <label for="password">Mot de passe</label>
              <input type="password" name="mdp" id="password" placeholder="Mot de passe" required>
              <span style="float: right;font-size: 14px;">
                <?= isset($mdpExiste) ? $mdpExiste :"" ; ?>
              </span>
          </p>
          <p class="clearfix" style="width: 100%;">
              <input type="checkbox" name="remember" id="remember" style="display: inline;">
              <label for="remember">Se souvenir de moi</label>
              <a href="forgot.php">
                <span style="float: right;" class="mdpForget">Mot de passe oublié ?</span>
              </a>
          </p>
          <p class="clearfix" style="width: 100%;">
              <input type="submit" name="connexion" value="Se Connecter" style="display: inline;background: linear-gradient(to left,black,#F7AF9D);margin-right: 2px">
          </p>  
          <p style="clear: left;" style="width: 100%;">
            Vous n'avez pas de compte ? <a href="inscription.php" style="color: blue;">Inscrivez-vous</a>
          </p>    
      </form>

    </div>
  </div>

</div>

</body>
</html>