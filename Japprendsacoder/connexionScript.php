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
      exit();
    }
    else
    {
      $_SESSION['mdpExiste'] = "<font color=red>Mot de passe est incorrect</font>";
      header("location:connexion.php");
      exit();
    }
  }
  else
  {
    $_SESSION['emailExiste'] = "<font color=red>Votre mail est incorrect</font>";
    header("location:connexion.php");
    exit();
  }
}

?>