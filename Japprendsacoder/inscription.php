<?php
session_start();
$_SESSION = array();
session_destroy();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>JAC || J'apprends à coder une formation en ligne de qualité et d'expertise.</title>
	<meta charset="utf-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
	<style type="text/css">
      @import url(http://fonts.googleapis.com/css?family=Ubuntu:400,700);
      *,
      *:after,
      *:before {
          -webkit-box-sizing: border-box;
          -moz-box-sizing: border-box;
          -ms-box-sizing: border-box;
          -o-box-sizing: border-box;
          box-sizing: border-box;
          padding: 0;
          margin: 0;
      }

      .clearfix:after 
      {
          content: "";
          display: table;
          clear: both;
      }

      .formulaire 
      {
          font-family: 'Ubuntu', 'Lato', sans-serif;
          font-weight: 400;
          width: 500px;
          position: relative;
          margin: 60px auto 30px;
          padding: 10px;
          overflow: hidden;

          background: #111; 
          border-radius: 0.4em;
          border: 1px solid #191919;
          box-shadow: 
              inset 0 0 2px 1px rgba(255,255,255,0.08), 
              0 16px 10px -8px rgba(0, 0, 0, 0.6);
      }

      .formulaire label 
      {
          width: 50%;
          float: left;
          padding-top: 9px;

          color: #ddd;
          font-size: 12px;
          letter-spacing: 1px;
          text-shadow: 0 1px 0 #000;
          text-indent: 10px;
          font-weight: 700;
          cursor: pointer;
      }
	  .formulaire select,
      .formulaire input[type=email],
      .formulaire input[type=text],
      .formulaire input[type=number],
      .formulaire input[type=password] 
      {
          width: 50%;
          float: left;
          padding: 8px 5px;
          margin-bottom: 10px;
          font-size: 14px;

          background: #1f2124;
          background: -moz-linear-gradient(#1f2124, #27292c);
          background: -ms-linear-gradient(#1f2124, #27292c);
          background: -o-linear-gradient(#1f2124, #27292c);
          background: -webkit-gradient(linear, 0 0, 0 100%, from(#1f2124), to(#27292c));
          background: -webkit-linear-gradient(#1f2124, #27292c);
          background: linear-gradient(#1f2124, #27292c);    
          border: 1px solid #000;
          box-shadow:
              0 1px 0 rgba(255,255,255,0.1);
          border-radius: 3px;

          font-family: 'Ubuntu', 'Lato', sans-serif;
          color: #fff;

      }

	  .formulaire select,
      .formulaire input[type=email]:hover,
      .formulaire input[type=text]:hover,
      .formulaire input[type=bumber]:hover,
      .formulaire input[type=password]:hover,
      .formulaire label:hover ~ input[type=email],
      .formulaire label:hover ~ input[type=text],
      .formulaire label:hover ~ input[type=number],
      .formulaire label:hover ~ input[type=password] 
      {
          background: #27292c;
      }
	  
	  .formulaire select,
      .formulaire input[type=email]:focus, 
      .formulaire input[type=password]:focus 
      {
          box-shadow: inset 0 0 2px #000;
          background: #494d54;
          border-color: #51cbee;
          outline: none;
      }

      .formulaire p:nth-child(3),
      .formulaire p:nth-child(4) 
      {
          float: left;
          width: 50%;
      }
      .formulaire input[type=submit] 
      {
          width: 100%;
          padding: 8px 5px;
        
          border: 1px solid #0273dd;
          border: 1px solid rgba(0,0,0,0.4);
          box-shadow:
          inset 0 1px 0 rgba(255,255,255,0.3),
          inset 0 10px 10px rgba(255,255,255,0.1);
          border-radius: 3px;
          background: #F7AF9D/*#38a6f0*/;
          cursor:pointer;

          font-family: 'Ubuntu', 'Lato', sans-serif;
          color: white;
          font-weight: 700;
          font-size: 15px;
          text-shadow: 0 -1px 0 rgba(0,0,0,0.8);
      }

      .formulaire input[type=submit]:hover { 
          box-shadow: inset 0 1px 0 rgba(255,255,255,0.6);
      }

      .formulaire input[type=submit]:active { 
          background: #287db5;
          box-shadow: inset 0 0 3px rgba(0,0,0,0.6);
          border-color: #000; 
          border-color: rgba(0,0,0,0.9);
      }

      .no-boxshadow .formulaire input[type=submit]:hover {
          background: #2a92d8;
      }

      .formulaire:after 
      {
          content: "";
          height: 1px;
          width: 33%;
          position: absolute;
          left: 20%;
          top: 0;

          background: -moz-linear-gradient(left, transparent, #444, #b6b6b8, #444, transparent);
          background: -ms-linear-gradient(left, transparent, #444, #b6b6b8, #444, transparent);
          background: -o-linear-gradient(left, transparent, #444, #b6b6b8, #444, transparent);
          background: -webkit-gradient(linear, 0 0, 100% 0, from(transparent), color-stop(0.25, #444), color-stop(0.5, #b6b6b8), color-stop(0.75, #444), to(transparent));
          background: -webkit-linear-gradient(left, transparent, #444, #b6b6b8, #444, transparent);
          background: linear-gradient(left, transparent, #444, #b6b6b8, #444, transparent);
      }

      .formulaire:before {
          content: "";
          width: 8px;
          height: 5px;
          position: absolute;
          left: 34%;
          top: -7px;
          
          border-radius: 50%;
          box-shadow: 0 0 6px 4px #fff;
      }

      .formulaire p:nth-child(1):before
      {
          content:"";
          width:250px;
          height:100px;
          position:absolute;
          top:0;
          left:45px;

          -webkit-transform: rotate(75deg);
          -moz-transform: rotate(75deg);
          -ms-transform: rotate(75deg);
          -o-transform: rotate(75deg);
          transform: rotate(75deg);
          background: -moz-linear-gradient(50deg, rgba(255,255,255,0.15), rgba(0,0,0,0));
          background: -ms-linear-gradient(50deg, rgba(255,255,255,0.15), rgba(0,0,0,0));
          background: -o-linear-gradient(50deg, rgba(255,255,255,0.15), rgba(0,0,0,0));
          background: -webkit-linear-gradient(50deg, rgba(255,255,255,0.15), rgba(0,0,0,0));
          background: linear-gradient(50deg, rgba(255,255,255,0.15), rgba(0,0,0,0));
          pointer-events:none;
      }

      .no-pointerevents .formulaire p:nth-child(1):before 
      {
          display: none;
      }
  </style>
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
    <div>

      <form class="formulaire" action="inscriptionScript.php" method="post">
		  <p align="center" style="text-transform: uppercase;">
		  	<h3 style="text-transform: uppercase;text-align: center;">Inscription</h3>
  		  </p><br>
  		  <p class="clearfix" style="width: 100%">
  		  	<label for="nom">Nom</label>
  		  	<input type="text" name="nom" id="nom" placeholder="Nom" required value="<?= isset($_SESSION['nom'])? $_SESSION['nom']:''; ?>">
  		  </p>
  		  <p class="clearfix" style="width: 100%">
  		  	<label for="prenom">Prenom</label>
  		  	<input type="text" name="prenom" id="prenom" placeholder="Prénom" required value="<?= isset($_SESSION['prenom'])? $prenom:''; ?>">
  		  </p>
          <p class="clearfix" style="width: 100%">
              <label for="login">Email</label>
              <input type="email" name="email" id="login" placeholder="Email" required value="<?= isset($_SESSION['email'])? $email:''; ?>">
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
            <option value="Javascript">JAVASCRIPT</option>
            <option value="Sql">Sql</option>
            <option value="Python">Python</option>
            <option value="Langage C">C#</option>
            <option value="Java">Java  </option>
          </select>
        </p>
  		  <p class="clearfix" style="width: 100%">
              <label for="telephone">Téléphone</label>
              <input type="number" name="telephone" id="telephone" value="<?= isset($_SESSION['telephone'])? $_SESSION['telephone']:''; ?>" placeholder="Ex:01020304" required>
              <span style="float: right;font-size: 14px;">
              </span>
          </p>
          <p class="clearfix" style="width: 100%">
              <label for="mdp">Mot de passe</label>
              <input type="password" name="mdp" id="mdp" required>
              <span style="float: right;font-size: 14px;">
                <?= isset($_SESSION['MdpCourt'])? $_SESSION['MdpCourt']:""; ?>
              </span>
          </p>
          <p class="clearfix" style="width: 100%">
              <label for="r_mdp">Confirmer Mot de passe</label>
              <input type="password" name="r_mdp" id="r_mdp" required>
              <span style="float: right;font-size: 14px;">
                <?= isset($_SESSION['diffMdp'])? $_SESSION['diffMdp']:""; ?>
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
