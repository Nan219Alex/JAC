<?php
include ("bdd.php");
if (isset($_SESSION['nom']) and isset($_SESSION['email']))
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profil de <?= isset($_SESSION['nom']) ? $_SESSION['nom']." ".$_SESSION['prenom'] : "";  ?></title>
	<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
	<style>
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

      .formulaire input[type=text],
      .formulaire input[type=number],
      .formulaire input[type=email],
      .formulaire input[type=password] 
      {
          width: 50%;
          float: left;
          padding: 8px 5px;
          margin-bottom: 10px;
          font-size: 15px;

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

      .formulaire input[type=text]:hover,
      .formulaire input[type=email]:hover,
      .formulaire input[type=number]:hover,
      .formulaire input[type=password]:hover,
      .formulaire label:hover ~ input[type=text],
      .formulaire label:hover ~ input[type=password] 
      {
          background: #27292c;
      }

      .formulaire input[type=text]:focus, 
      .formulaire input[type=email]:focus, 
      .formulaire input[type=number]:focus,
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
      .formulaire input[name=modifier],
      .formulaire input[name=retour]
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

      .formulaire input[type=submit]:hover 
      { 
          box-shadow: inset 0 1px 0 rgba(255,255,255,0.6);
      }
      .formulaire input[type=submit]:active 
      { 
          background: #287db5;
          box-shadow: inset 0 0 3px rgba(0,0,0,0.6);
          border-color: #000; 
          border-color: rgba(0,0,0,0.9);
      }
      .no-boxshadow .formulaire input[type=submit]:hover 
      {
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
    <li class="active"><a href="cursus.php">Accueil</a></li>
    <li><a class="drop" href="#">cours</a>
      <ul>
        <li><a href="pages/gallery.html">Gallery</a></li>
        <li><a href="pages/full-width.html">Full Width</a></li>
        <li><a href="pages/sidebar-left.html">Sidebar Left</a></li>
        <li><a href="pages/sidebar-right.html">Sidebar Right</a></li>
        <li><a href="pages/basic-grid.html">Basic Grid</a></li>
      </ul>
    </li>
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
    <?php
    if (isset($_SESSION['email']) and $_SESSION['email']!="yapialex293@gmail.com") 
		{
	?>
    	<li><a href="#" class="drop">mode de paiement</a></li>
    <?php
		}
	?>
    <li><a href="profil.php">Mon Profil</a></li>
  </ul>
</nav>
    </header>
  </div>
  	<form class="formulaire" method="post">
    	
    	<p class="clearfix" style="margin-left: 15px;width: 100%">
    		<span>Cours_php.pdf</span><br>
    		<span>FastPHP.pdf</span><br>
    		<span>Php_Mysql.pdf</span>
    	</p>
		<p class="clearfix">
			<a href="#" download="php_mysql.zip" title="Télécharger le cour en pdf">
	    	<div style="width: 100%;border: 1px solid white;">
	    		<h4 align="center" class="mattelechar" style="margin: 4px 4px;color: #F7AF9D;text-transform: none;">Télécharger Pdf</h4>
	    	</div>
    	</p>
    	<p class="clearfix" style="margin-left: 15px;width: 100%;color: white">
    		<span>Dans ces différentes vidéos vous découvrirez comment :</span><br>
    		<span>- Apprendre à créer sa base de donnéé avec Mysql</span><br>
    		<span>- Comment connecter php avec sa base de donnée</span><br>
    		<span>- Envoyer des mails en local</span><br>
    		<span>- Gestion d'administration</span><br>
    		<span>...</span>
    	</p>
        <p class="clearfix">
			<a href="#" download="php_mysql_videos.zip" title="Télécharger les vidéos">
	    	<div style="width: 100%;border: 1px solid white" class="telecharge">
	    		<h4 align="center" class="mattelechar" style="margin: 4px 4px;color: #F7AF9D;text-transform: none;">Télécharger Vidéos</h4>
	    	</div>
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