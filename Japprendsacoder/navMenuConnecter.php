<?php include 'bootstrap.php';?>
<head>
  <style type="text/css">
  #premium:hover::before
    {
      content: "Vous êtes ";
      background-color: red;
      border-radius: 5px;
    }
    #premium:hover::after
    {
      content: "emium";
      background-color: red;
    }
  </style>
</head>
<div class="wrapper row1">
    <header id="header" class="hoc clear"> 
      <div id="logo" class="fl_left">
        <h1>JAC <span style="text-transform: lowercase; font-style: italic; font-size: 19px;">( J'apprends à coder )</span>
          <?php

            if (isset($_SESSION['premium']) and $_SESSION['premium']==true)
            {
            ?>
            
          <span class="badge" id="premium" style="text-transform: none;background-color: red;">Pr</span></h1>
          <?php
            }
          ?>
      </div>
      <nav id="mainav" class="fl_right">
  <ul class="clear">
    <li class="active"><a href="cursus.php" style="text-transform: none;font-size: 17px">Accueil</a></li>
    <li><a class="drop" href="#" style="text-transform: none;font-size: 17px">Quiz</a>
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
    <li><a href="#" style="text-transform: none;font-size: 17px">Exercices</a></li>
    <li><a class="drop" href="#" style="text-transform: none;font-size: 17px">Compétitions</a>
      <ul>
        <li><a href="#">Participer aux Battles</a></li>
      </ul>
    </li>
    <li><a href="forum.php" style="text-transform: none;font-size: 17px">Forum</a></li>
    <li><a class="drop" href="#" style="text-transform: none;font-size: 17px"><img src="images/demo/avatar.png" style="min-width: 30px;min-height: 30px;"title="
      <?php
        if(isset($_SESSION['nom']))
        {
          echo $_SESSION['nom'].' '.$_SESSION['prenom'];
        }
      ?>
      "></a>
      <ul id="profil">
        <li><a href="#">Devenir Premium</a></li>
        <li><a href="profil.php">Mon Profil</a></li>
        <li><a href="deconnexion.php">Déconnexion <small class="fa fa-lg fa-sign-out"></small></a></li>
      </ul>
    </li>
  </ul>
</nav>
    </header>
  </div>