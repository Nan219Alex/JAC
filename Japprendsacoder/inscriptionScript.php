<?php
include("bdd.php");

if (isset($_POST['enregister'])) 
{
  mb_internal_encoding('UTF-8');
  $nom = htmlentities($_POST['nom']);
  $prenom = htmlentities($_POST['prenom']);
  $email = $_POST['email'];
  $sexe = $_POST['sexe'];
  $mdp1 = $_POST['mdp']; // Récupère le mot de passe sans le crypter
  $mdp = sha1($_POST['mdp']);
  $r_mdp = sha1($_POST['r_mdp']);
  $telephone = $_POST['telephone'];
  $formation = $_POST['formation'];

  if (strlen($_SESSION['MdpCourt']) <3) 
  {
  	$_SESSION['MdpCourt'] = "<font color=red>Votre mot de passe est trop court.</font>";
    header("location :Inscription.php");
  }
  else
  {
  	if ($_SESSION['diffMdp'] != $_SESSION['diffMdp']) 
  	{
  		$_SESSION['diffMdp'] = "<font color=red>Votre mot de passe est différent.</font>";
      header("location :Inscription.php");
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
      header("location:inscription.php");
		}
		else
		{
			if ($CompteTelephone==1) 
			{
				$ExisteTelephone = "<font color=red>Ce Téléphone existe déjà.</font>";
        header("location :inscription.php");
			}
			else
			{
				$inserer = $bdd -> prepare("INSERT INTO inscription(Nom,Prenom,Email,Sexe,Telephone,Password,Formation) VALUES(?,?,?,?,?,?,?)");
				$inserer->execute(array($nom,$prenom,$email,$sexe,$telephone,$mdp,$formation));
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