<?php
include("bdd.php");

if (isset($_POST['enregister'])) 
{
  
  $nom = htmlentities($_POST['nom']);
  $prenom = htmlentities($_POST['prenom']);
  $email = $_POST['email'];
  $sexe = $_POST['sexe'];
  $mdp1 = $_POST['mdp']; // Récupère le mot de passe sans le crypter
  $mdp = sha1($_POST['mdp']);
  $r_mdp = sha1($_POST['r_mdp']);
  $telephone = $_POST['telephone'];
  $formation = $_POST['formation'];

  if (strlen($mdp1) <3) 
  {
    $MdpCourt = "<font color=red>Votre mot de passe est trop court.</font>";
  }
  else
  {
    if ($mdp != $r_mdp) 
    {
      $diffMdp = "<font color=red>Votre mot de passe est différent.</font>";
    }
    else
    {
      // Vérifier si le Email existe déjà

    $VerifEmail = $bdd -> prepare("SELECT * FROM inscription WHERE Email=?");
    $VerifEmail -> execute(array($email));
    $CompteEmail = $VerifEmail -> RowCount();

    // Vérifier si le Téléphone existe déjà

    $VerifTelephone = $bdd -> prepare("SELECT * FROM inscription WHERE Telephone=?");
    $VerifTelephone -> execute(array($telephone));
    $CompteTelephone = $VerifTelephone -> RowCount();

    if ($CompteEmail==1) 
    {
      $ExisteEmail = "<font color=red>Ce mail existe déjà.</font>";
    }
    else
    {
      if ($CompteTelephone==1) 
      {
        $ExisteTelephone = "<font color=red>Ce Téléphone existe déjà.</font>";
      }
      else
      {
        $inserer = $bdd -> prepare("INSERT INTO inscription(Nom,Prenom,Email,Sexe,Telephone,Password,Formation,En_Ligne) VALUES(?,?,?,?,?,?,?,?)");
        $inserer->execute(array($nom,$prenom,$email,$sexe,$telephone,$mdp,$formation,0));
        // Insérer l'utilisateur dans la table(base de donnée) de la formation choisie
          if ($inserer and $formation == "Html-Css-Bootstrap") 
          {
            $HtmlUser = $bdd -> prepare("INSERT INTO html_css_bootstrap(Nom,Prenom,Email,Sexe,Formation) VALUES(?,?,?,?,?)");
            $HtmlUser->execute(array($nom,$prenom,$email,$sexe,$formation));
          }
          if ($inserer and $formation == "Php-Mysql")
          {
            $PhpUser = $bdd -> prepare("INSERT INTO php_mysql(Nom,Prenom,Email,Sexe,Formation) VALUES(?,?,?,?,?)");
            $PhpUser->execute(array($nom,$prenom,$email,$sexe,$formation));
          }
          if($inserer and $formation == "Javascript")
          {
            $javascriptUser = $bdd -> prepare("INSERT INTO javascript(Nom,Prenom,Email,Sexe,Formation) VALUES(?,?,?,?,?)");
            $javascriptUser->execute(array($nom,$prenom,$email,$sexe,$formation));
          }
          if ($inserer and $formation == "sql") 
          {
            $sqltUser = $bdd -> prepare("INSERT INTO sql(Nom,Prenom,Email,Sexe,Formation) VALUES(?,?,?,?,?)");
            $sqltUser->execute(array($nom,$prenom,$email,$sexe,$formation));
          }
          if($inserer and $formation == "Python")
          {
            $PythontUser = $bdd -> prepare("INSERT INTO python(Nom,Prenom,Email,Sexe,Formation) VALUES(?,?,?,?,?)");
            $PythontUser->execute(array($nom,$prenom,$email,$sexe,$formation));
          }
          if($inserer and $formation == "Langage C")
          {
            $LangageCUser = $bdd -> prepare("INSERT INTO langage_C(Nom,Prenom,Email,Sexe,Formation) VALUES(?,?,?,?,?)");
            $LangageCUser->execute(array($nom,$prenom,$email,$sexe,$formation));
          }
          if ($inserer and $formation == "Java") 
          {
            $JavaUser = $bdd -> prepare("INSERT INTO java(Nom,Prenom,Email,Sexe,Formation) VALUES(?,?,?,?,?)");
            $JavaUser->execute(array($nom,$prenom,$email,$sexe,$formation));
          }


        if ($inserer)
        {
          $envoieMail =mail($email, "Inscription réussi", "Félicitation votre inscription a bien été effectué avec succèes sur la pateforme jac(j'apprends à coder ). Nous vous souhaitons un très bon cursus tout au long de la formation.");
          // On cré un fichier contenant les information de l'utilisateur

            // $fichier = fopen($nom." ".$prenom.".txt","a");
            // fwrite($fichier,"Nom : $nom \rPrénom : $prenom \rEmail : $email \rTéléphone : $telephone \rFormation : $formation");

          // Fin de la création du fichier
          header("location:connexion.php");
        }
        else
        {
          echo "Veuillez réessayer svp votre inscription a échoué";
        }
      }
    }

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
	<link rel="stylesheet" href="css/inscription.css">
</head>
<body style="background-image:url('images/informatique-4.jpg'); background-size: cover;">

<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <ul>
      <li><i class="fa fa-clock-o"></i> Lundi. - Dimanche. 08h - 18h</li>
      <li><i class="fa fa-phone"></i> +00 (225) 68 971 041 || +00 (225) 72 151 686</li>
      <li><i class="fa fa-envelope-o"></i> japprendsacoder@gmail.com</li>
      <li><a href="index.php"><i class="fa fa-lg fa-home"></i></a></li>
      <li><a href="connexion.php" title="Se Connecter"><i class="fa fa-lg fa-sign-in"></i></a></li>
      <li><a href="inscription.php" title="S'inscrire"><i class="fa fa-lg fa-edit"></i></a></li>
    </ul>
  </div>
</div>
<div class="bgded overlay" style="background: inherit;

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
  <!-- FORMULAIRE D'INSCRIPTION  -->
    <div id="formu">
      <form class="formulaire" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
		  <p align="center" style="text-transform: uppercase;">
		  	<h3 style="text-transform: uppercase;text-align: center;">Inscription</h3>
  		  </p><br>
  		  <p class="clearfix" style="width: 100%">
  		  	<label for="nom">Nom</label>
  		  	<input type="text" name="nom" id="nom" placeholder="Nom" required value="<?= isset($nom)? $nom :''; ?>">
  		  </p>
  		  <p class="clearfix" style="width: 100%">
  		  	<label for="prenom">Prenom</label>
  		  	<input type="text" name="prenom" id="prenom" placeholder="Prénom" required value="<?= isset($prenom)? $prenom:''; ?>">
  		  </p>
          <p class="clearfix" style="width: 100%">
              <label for="login">Email</label>
              <input type="email" name="email" id="login" placeholder="Email" required value="<?= isset($email)? $email:''; ?>">
              <span style="float: right;font-size: 14px;">
                 <?= isset($ExisteEmail)? $ExisteEmail:""; ?>
              </span>
          </p>
          <p class="clearfix" style="width: 100%;">
          	<label for="sexe">Sexe</label>
  		  	<select id="sexe" name="sexe" style="float: right;">
  		  		<option value="Homme">Homme</option>
  		  		<option value="Femme">Femme</option>
  		  	</select>
  		  </p>
        <p class="clearfix" style="width: 100%;">
          <label for="formation">Choisir le langage de formation</label>
          <select id="formation" name="formation">
            <option value="Html-Css-Bootstrap">Html-Css-Bootstrap</option>
            <option value="Php-Mysql">Php-Mysql</option>
            <option value="Javascript">Javascript</option>
            <option value="Sql">Sql</option>
            <option value="Python">Python</option>
            <option value="Langage C">C#</option>
            <option value="Java">Java  </option>
          </select>
        </p>
  		  <p class="clearfix" style="width: 100%">
              <label for="telephone">Téléphone</label>
              <input type="number" name="telephone" id="telephone" value="<?= isset($telephone)? $telephone:''; ?>" placeholder="Ex:01020304" required>
              <span style="float: right;font-size: 14px;">
                <?= isset($ExisteTelephone) ? $ExisteTelephone : ""; ?>
              </span>
          </p>
          <p class="clearfix" style="width: 100%">
              <label for="mdp">Mot de passe</label>
              <input type="password" name="mdp" id="mdp" required>
              <span style="float: right;font-size: 14px;">
                <?= isset($MdpCourt)? $MdpCourt:""; ?>
              </span>
          </p>
          <p class="clearfix" style="width: 100%">
              <label for="r_mdp">Confirmer Mot de passe</label>
              <input type="password" name="r_mdp" id="r_mdp" required>
              <span style="float: right;font-size: 14px;">
                <?= isset($diffMdp)? $diffMdp:""; ?>
              </span>
          </p>
          <p class="clearfix">
              <input type="submit" name="enregister" value="S'inscrire" style="display: inline;background: linear-gradient(to left,black,#F7AF9D);margin-right: 2px">
          </p>  
          <p style="clear: left;">
            Vous déjà un compte ? <a href="connexion.php" style="color: blue;">Connecter-vous</a>
          </p>    
      </form>
    </div>
  </div>

</div>
	
</body>
</html>
