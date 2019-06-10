<?php
session_start();
$_SESSION = array();
session_destroy();
if (isset($_POST['envoyer'])) 
{
  $nom = $_POST['nom'];
  $mail = $_POST['mail'];
  $sujet = $_POST['sujet'];
  $message = $_POST['message'];

  if (empty($nom)) 
  {
    $nomVide = " <font color=red>Veuillez renseigner ce champs.</font>";
  }
  else if (empty($mail)) 
  {
    $mailVide = " <font color=red>Veuillez renseigner ce champs.</font>";
  }
  else if (empty($sujet)) 
  {
    $sujetVide = " <font color=red>Veuillez renseigner ce champs.</font>";
  }
  else if (empty($message)) 
  {
    $messageVide = " <font color=red>Veuillez renseigner ce champs.</font>";
  }
  else
  {
    $message = "
          <html>
            <head>
                <strong> 
                    Nom : $nom <br>
                    Email : $mail 
                </strong><br><br>
                $message;
            </head>
          </html>
        ";
      $envoyer = mail("japprendsacoder@gmail.com",$sujet,$message);
      if ($envoyer) 
      {
        $SuccesSend = "<font color=#f7af9d>Votre mail a bien été envoyé.</font>";
      }
      else
      {
        $FailSend = "<font color=red>Votre mail n'a pas été envoyé.</font>";
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
</head>
<body id="top">
<?php include("Menu.php"); ?>

<div class="wrapper row3">
  <main class="hoc container clear"> 
  
    <div class="sectiontitle">
      <h6 class="heading">Programmer c'est ce que nous avons choisis</h6>
      <p>La Programmation est devenue une passion .</p>
    </div>
    <div class="group">
      <div class="two_third first">
        <p><strong>Pourquoi apprendre à coder ?</strong></p>
        <p>Un argument ultime si vous n’êtes pas déjà convaincus : on ignore aujourd’hui quels seront les métiers de demain, ceux que nos élèves vont pratiquer. La seule certitude est que la programmation de systèmes, le codage, seront nécessaires à ce monde du futur. Et qui saura manier ce langage en détiendra les clefs.<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Les métiers du futur ? Nous ignorons jusqu’à leurs noms. Sachant que, selon une étude de l’Université d’Oxford (09/13), dans 20 ans, 50% des métiers seront remplacés par la machine, aux US, on imagine bien que l’autre moitié devra se réinventer. Mais dans quoi ? Une piste pour le digital, peut-être ? <strong>Aujourd’hui, un “ethical hacker” gagne entre 80 000€  et 115 000€ (Enquête The Guardians US – 07/14). Et ce n’est pas prêt de faiblir.</strong> </p>
        <p class="btmspace-30"><span style="color: red;">Anecdote de geek</span> : Sachez que lorsqu’un programmeur écrit des lignes de code, il dit, dans son vocabulaire fleuri, qu’il « pisse des lignes de code ». [&hellip;]</p>
        <footer><a class="btn" href="#" onclick="ReadPlus();">Lire plus &raquo;</a></footer>
      </div>
      <div class="one_third">
        <p><strong>Sit amet lobortis ipsum</strong></p>
        <figure class="videocontainer"> 
          <object width="425" height="355">
              <param name="movie" value=""></param>
              <param name="wmode" value="transparent"></param>
              <embed src="" type="application/x-shockwave-flash" wmode="transparent" width="425" height="355"></embed>
          </object>
          <figcaption style="color: red;">Je dois trouver une vidéo parlant de la programmation</figcaption>
        </figure>
      </div>
    </div>
  
    <div class="clear"></div>
  </main>
</div>
<div class="wrapper bgded overlay light" style="background-image:url('images/demo/backgrounds/02.png');">
  <section class="hoc container clear"> 
  
    <div class="sectiontitle">
      <h6 class="heading">Queleques langages de programmation</h6>
      <p>Ooouuula!!! vous ne commprenez rien à ces langages ? <br>Pas grave nous les verrons un par un.</p>
    </div>
    <ul class="nospace group">
      <li class="one_third first btmspace-30">
        <article><i class="btmspace-30 fa fa-3x fa-ravelry"></i>
          <h6 class="heading"><a href="#">PHP-MYSQL</a></h6>
          <p>Non id nulla quisque laoreet ullamcorper enim vel porta nam interdum [&hellip;]</p>
        </article>
      </li>
      <li class="one_third btmspace-30">
        <article><i class="btmspace-30 fa fa-3x fa-s15"></i>
          <h6 class="heading"><a href="#">JAVASCRIPT  </a></h6>
          <p>Nunc posuere imperdiet nam pharetra urna nec vulputate consectetur nam [&hellip;]</p>
        </article>
      </li>
      <li class="one_third btmspace-30">
        <article><i class="btmspace-30 fa fa-3x fa-ge"></i>
          <h6 class="heading"><a href="#">PYTHON</a></h6>
          <p>Augue sed velit tempor vehicula ultricies interdum interdum et malesuada [&hellip;]</p>
        </article>
      </li>
      <li class="one_third first">
        <article><i class="btmspace-30 fa fa-3x fa-gg"></i>
          <h6 class="heading"><a href="#">Langage C</a></h6>
          <p>Fames ac ante ipsum primis in faucibus nam lacus diam pulvinar quis [&hellip;]</p>
        </article>
      </li>
      <li class="one_third">
        <article><i class="btmspace-30 fa fa-3x fa-superpowers"></i>
          <h6 class="heading"><a href="#">C++</a></h6>
          <p>Semper cursus dolor suspendisse dictum quam eu consectetur donec [&hellip;]</p>
        </article>
      </li>
      <li class="one_third">
        <article><i class="btmspace-30 fa fa-3x fa-yelp"></i>
          <h6 class="heading"><a href="#">Scratch</a></h6>
          <p>Blandit elementum quam ac imperdiet turpis ultrices quis sed enim [&hellip;]</p>
        </article>
      </li>
    </ul>
  
  </section>
</div>
<div class="wrapper row3">
  <section class="hoc container clear"> 
  
    <div class="sectiontitle">
      <h6 class="heading">Testons nos compétences</h6>
      <p>Des <strong>quiz</strong> à la fin de chaque module et des <strong>projets</strong> chaque mois.</p>
    </div>
    <div class="group testimonials">
      <article class="one_half first"><img src="images/Informatique.large.jpeg" alt="">
        <blockquote>
          <h4 style="font-size: 18px;">
            <strong>Des quiz ?</strong>
          </h4>
          Nous vous donnons la possibilité de tester ce que vous apprenez avec des quiz et des exercices pratiques.
          Il y'aura des niveaux et il vous fraudra débloquer le niveau suivant pour pouvoir poursuivre le cursus.
        </blockquote>
        <h6 class="heading" style="color: silver;">JAC</h6>
        <em>Coder n'a rien de sorcier</em>
      </article>
      <article class="one_half"><img src="images/Informatique.large.jpeg" alt="">
        <blockquote>
          <h4 style="font-size: 18px;">
            <strong>Des projets ?</strong>
          </h4>
          Des projets qui vont au délà de ce que vous allez apprendre. Des projets qui vous pousserons à chercher et à trouver les réponses à vos questions. Ventez-vous de vos projets car au bout de l'effort se trouve la récompense.
        </blockquote>
        <h6 class="heading" style="color: silver;">JAC</h6>
        <em>La connaissance est la clé du succès</em></article>
    </div>
  
  </section>
</div>
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/03.png');">
  <figure class="hoc clear"> 
  <h3 align="center">Plusieurs langages de programmation pour un seul but</h3>
        <p align="center" style="color: #F7AF9D;font-size: 20px;"><i>&raquo;&raquo; <u>savoir coder</u> &laquo;&laquo;</i></p>
    <ul class="nospace group logos">
      <li class="one_quarter first"><a href="#"><img src="https://www.pierre-giraud.com/php-mysql/cours-complet/imgs/logos-php-mysql.png" alt="PHP-MYSQL"></a></li>
      <li class="one_quarter"><a href="#"><img src="https://oschool.ci/wp-content/uploads/2019/02/Image-des-cours-oschool-1-120x72.png" alt="JAVASCRIPT"></a></li>
      <li class="one_quarter"><a href="#"><img src="https://4.bp.blogspot.com/-gTiw6OELPy0/XJorCue1joI/AAAAAAAACkA/mII85pOuZKYLQlFx6wjkxgkJYrULjv4hQCLcBGAs/w1200-h630-p-k-no-nu/java.png" alt="JAVA"></a></li>
      <li class="one_quarter"><a href="#"><img src="https://www.pierre-giraud.com/html-css/cours-complet/imgs/logo-html5-css3.png" alt="HTML-CSS"></a></li>
    </ul>
    <figcaption><a class="btn" <?php echo "href='inscription.php'"; ?> >Rejoignez-nous maintenant</a></figcaption>
  
  </figure>
</div>
<div class="wrapper row3">
  <section class="hoc container clear"> 
  
    <div class="sectiontitle">
      <h6 class="heading">Les lignes de code payent.</h6>
      <p>Ces personnes n'ont pas fait de longues études mais elles se sont fait des noms dans la société grâce aux <strong>lignes de code</strong>.</p>
    </div>
    <div class="group latest">
      <article class="one_third first">
        <figure><a href="#"><img src="images/demo/320x220.png" alt=""></a>
          <figcaption>
            <time datetime="2045-04-06T08:15+00:00"><strong>1</strong> <em>Facebook</em></time>
          </figcaption>
        </figure>
        <div class="txtwrap">
          <h4 class="heading">Yapi Alexandre Bérenger</h4>
          <ul class="nospace meta">
            <li><i class="fa fa-user"></i> <a href="#">Admin</a></li>
            <li><i class="fa fa-tag"></i> <a href="#">Category Name</a></li>
          </ul>
          <p>Lorem posuere magna quis fermentum lorem elit nec lorem curabitur in finibus urna vivamus magna enim semper [&hellip;]</p>
          <footer><a href="#">Read More &raquo;</a></footer>
        </div>
      </article>
      <article class="one_third">
        <figure><a href="#"><img src="images/demo/320x220.png" alt=""></a>
          <figcaption>
            <time datetime="2045-04-05T08:15+00:00"><strong>2</strong> <em>Microsoft</em></time>
          </figcaption>
        </figure>
        <div class="txtwrap">
          <h4 class="heading">Yapi Alexandre Bérenger</h4>
          <ul class="nospace meta">
            <li><i class="fa fa-user"></i> <a href="#">Admin</a></li>
            <li><i class="fa fa-tag"></i> <a href="#">Category Name</a></li>
          </ul>
          <p>Tellus integer viverra ante nec ullamcorper ullamcorper nulla tempus placerat ultricies interdum et malesuada fames [&hellip;]</p>
          <footer><a href="#">Read More &raquo;</a></footer>
        </div>
      </article>
      <article class="one_third">
        <figure><a href="#"><img src="images/demo/320x220.png" alt=""></a>
          <figcaption>
            <time datetime="2045-04-04T08:15+00:00"><strong>3</strong> <em>Twiter</em></time>
          </figcaption>
        </figure>
        <div class="txtwrap">
          <h4 class="heading">Yapi Alexandre Bérenger</h4>
          <ul class="nospace meta">
            <li><i class="fa fa-user"></i> <a href="#">Admin</a></li>
            <li><i class="fa fa-tag"></i> <a href="#">Category Name</a></li>
          </ul>
          <p>Curabitur tincidunt at quam sed fermentum in at leo non quam rutrum aliquet nullam quam odio fermentum [&hellip;]</p>
          <footer><a href="#">Read More &raquo;</a></footer>
        </div>
      </article>
    </div>
  
    <div class="clear"></div>
  </section>
</div> 
<!-- footer -->
<div class="wrapper row4 bgded overlay" style="background-image:url('images/demo/backgrounds/04.png');">
  <footer id="footer" class="hoc clear"> 
  
    <div class="one_third first">
      <h6 class="heading">Contactez-moi</h6>
      <ul class="nospace btmspace-30 linklist contact">
        <li><i class="fa fa-map-marker"></i>
          <address>
            Abidjan Cocody Riviera 2
          </address>
        </li>
        <li><i class="fa fa-phone"></i> +00 (225) 68 971 041</li>
        <li><i class="fa fa-fax"></i> +00 (225) 72 151 686</li>
        <li><i class="fa fa-envelope-o"></i> japprendsacoder@gmail.com</li>
      </ul>
    </div>
    <div class="one_third">
      <h6 class="heading">M'envoyer un mail ?</h6>
      <form method="post" action="index.php">
        <fieldset>
          <legend>Newsletter:</legend>
          <input class="btmspace-15" type="text" placeholder="Nom" name="nom">
          <?= isset($nomVide) ? $nomVide:""; ?>
          <input class="btmspace-15" type="text" placeholder="Email" name="mail">
          <?= isset($mailVide) ? $mailVide:"" ;?>
          <input class="btmspace-15" type="text" placeholder="Objet" name="sujet">
          <?= isset($sujetVide) ? $sujetVide:"" ;?>
          <textarea class="btmspace-15 textarea" cols="35" name="message" rows="5" placeholder="Entrer votre message ici..." style="background-color: #222222;"></textarea>
          <?= isset($messageVide) ? $messageVide:"" ;?>
          <button type="submit" name="envoyer">Envoyer un mail</button>
          <label>
            <?= isset($SuccesSend) ? $SuccesSend:"" ;?>
            <?= isset($FailSend) ? $FailSend:"" ;?>
          </label>
        </fieldset>
      </form>
    </div>
    <div class="one_third">
      <h6 class="heading">YAPI Aexandre Bérenger</h6>
      <figure><img class="borderedbox inspace-10 btmspace-15" src="images/yapi_alexandre.jpg" alt="">
        <figcaption>
          <h6 class="nospace font-x1"><a href="#">Jeune développeur passionné de la programmation</a></h6>
          <time class="font-xs block btmspace-10" datetime="2045-04-06">Mardi 14 MAi 2019</time>
        </figcaption>
      </figure>
    </div>
  
  </footer>
</div>
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
  
    <p align="center">Copyright &copy; 2018 - All Rights Reserved</p>
  
  </div>
</div>
<!-- fin footer -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<?php include("js.html"); ?>
</body>
</html>