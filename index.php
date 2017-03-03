<?php require 'connexion/connexion.php';?>
<?php
$sql = $pdoCV->query("SELECT * FROM t_utilisateur");
$utilisateur = $sql->fetch();

$sql = $pdoCV->query("SELECT * FROM t_experiences");
$experience = $sql->fetchAll();

$sql = $pdoCV->query("SELECT * FROM t_formations");
$formation = $sql->fetchAll();

  //COMPETENCES 
$sql_comp = $pdoCV->query("SELECT * FROM t_competences");
$sql_comp -> execute();
$nb_comp= $sql_comp->rowCount();

$sql = $pdoCV->query("SELECT competence, niveau, specificite FROM t_competences WHERE specificite='back' ");
$specifiteBack = $sql->fetchAll();

$sql = $pdoCV->query("SELECT competence, niveau, specificite FROM t_competences WHERE specificite='front' ");
$specifiteFront = $sql->fetchAll();

$sql = $pdoCV->query("SELECT * FROM t_autre_competences");
$autre_competence = $sql->fetchAll();

$sql = $pdoCV->query("SELECT * FROM t_loisir");


/*$sql = $pdoCV->query("SELECT loisir FROM t_loisir WHERE loisir_categorie='sport' ");
$loisirSport = $sql->fetchAll();

$sql = $pdoCV->query("SELECT loisir FROM t_loisir WHERE loisir_categorie='cimema' ");
$loisirCimema = $sql->fetchAll();

$sql = $pdoCV->query("SELECT loisir FROM t_loisir WHERE loisir_categorie='cuisine' ");
$loisirCuisine = $sql->fetchAll();

$sql = $pdoCV->query("SELECT loisir FROM t_loisir WHERE loisir_categorie='photographie' ");
$loisirPhoto = $sql->fetchAll();*/

/*
if($_POST){
  $resultat = $pdoCV -> prepare("INSERT INTO t_contact (nom, email, telephone, objet, message) VALUES (:nom, :email, :telephone, :objet, :message)");
  $resultat -> bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
  $resultat -> bindParam(':email', $_POST['email'], PDO::PARAM_STR);
  $resultat -> bindParam(':telephone', $_POST['telephone'], PDO::PARAM_STR);
  $resultat -> bindParam(':objet', $_POST['objet'], PDO::PARAM_STR);
  $resultat -> bindParam(':message', $_POST['message'], PDO::PARAM_STR);
  $resultat -> execute();
  header('location:index.php');
} */

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $utilisateur['prenom'].' ' .$utilisateur['nom'];?> - Développeuse & Intégratrice Web</title>
    <meta name="description" content="Your Description Here">
    <meta name="keywords" content="free boostrap, bootstrap template, freebies, free theme, free website, free portfolio theme, portfolio, personal, cv">
    <meta name="author" content="Jenn, ThemeForces.com">
    
    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="front/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="front/img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="front/img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="front/img/apple-touch-icon-114x114.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"  href="front/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="front/font-awesome-4.2.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="front/css/jasny-bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="front/css/animate.css">
  

    <!-- Slider
    ================================================== -->
    <link href="front/css/owl.carousel.css" rel="stylesheet" media="screen">
    <link href="front/css/owl.theme.css" rel="stylesheet" media="screen">

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css"  href="front/css/style.css">
    <link rel="stylesheet" type="text/css" href="front/css/responsive.css">
    <link rel="stylesheet" type="text/css"  href="front/css/styleFront.css">
    <link rel="stylesheet" type="text/css"  href="front/css/styleFrontButtons.css">


    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="front/js/modernizr.custom.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <!-- Off Canvas Navigation
    ================================================== -->
    <div class="navmenu navmenu-default navmenu-fixed-left offcanvas"> <!--- Off Canvas Side Menu -->
        <div class="close" data-toggle="offcanvas" data-target=".navmenu">
            <span class="fa fa-close"></span>
        </div>
        <div class="add-margin"></div>
        <ul class="nav navmenu-nav"> <!--- Menu -->
            <li><a href="#home" class="page-scroll">Accueil</a></li>
            <li><a href="#competence" class="page-scroll">Compétences<!-- Overview --></a></li>
            <li><a href="#works" class="page-scroll">Réalisations<!-- Portfolio --></a></li>
            <li><a href="#experience" class="page-scroll">Expériences<!-- Services --></a></li>
            <li><a href="#formation" class="page-scroll">Formations<!-- Services --></a></li>
            <li><a href="#interet" class="page-scroll">Centre d'intéret<!-- About Us --></a></li>
            <li><a href="#contact" class="page-scroll">Contact</a></li>
            <li><a href="hjaadarCv.pdf" target="_blank" >CV <i class="fa fa-download" id="telechargement" aria-hidden="true"></i></a></li>           
        </ul><!--- End Menu -->
    </div> <!--- End Off Canvas Side Menu -->

    <!-- Home Section -->
    <div id="home">
        <div class="container text-center">
            <!-- Navigation -->
            <nav id="menu" data-toggle="offcanvas" data-target=".navmenu">
                <span class="fa fa-bars"></span>
            </nav>

            <div class="content">
                <h4 id="houda"><?php echo $utilisateur['prenom'].' ' .$utilisateur['nom'];?></h4>
                <hr id="trait">
                <div class="header-text btn">
                    <h1><span id="head-title"></span></h1>
                </div>
            </div>

            <a href="#competence" class="down-btn page-scroll">
                <span class="fa fa-angle-down"></span>
            </a>
        </div>
    </div>

    <!-- Mes compétences -->
    <div id="competence">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="section-title">
                        <h2>Mes compétences</h2>
                        <hr>
                    </div>
                    <p><h3>Je m'adapte et m'intègre à tout type de situations.</h3></p>
                </div>
            </div>

            <div class="space"></div>

            <div class="row">

                <div class="col-md-4 col-sm-4">
                    <div class="service" style="height:475px;">
                        <span class="fa fa-cog" aria-hidden="true"></span>
                        <h4>Front-end</h4>
                         <?php 
                        $i=0;
                        while($i<count($specifiteFront)){   
                        ?>
                    <p><?=$specifiteFront[$i]['competence'].' '.$specifiteFront[$i]['niveau'].'%'?></p>
                    <?php 
                    $i++;
                        }  ?>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="service" style="height:475px;">
                        <span class="fa fa-desktop" aria-hidden="true"></span>
                        <h4>Back-end</h4>
                          <?php 
                        $i=0;
                        while($i<count($specifiteBack)){   
                        ?>
                    <p><?=$specifiteBack[$i]['competence'].' '.$specifiteBack[$i]['niveau'].'%'?></p>
                    <?php 
                    $i++;
                        }  ?>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="service" style="height:475px;">
                        <span class="fa fa-plus "></span>
                        <h4>Numérique</h4>
                        <?php 
                        $i=0;
                        while($i<count($autre_competence)){   
                        ?>
                        <p><?=$autre_competence[$i]['autre_competence'].' '.$autre_competence[$i]['niveau'].'%'?></p>
                        <?php 
                        $i++;
                            }  ?>
                    </div>
                </div>
            </div>
            <div>              
               <a href="#works" class="down-btn page-scroll">
                <span class="fa fa-angle-down"></span>
            </a>
        </div>
    </div>
        <!-- FIN Mes compétences -->

    <!-- Overview Video Section -->
    <div id="overview-video">
        <div class="overlay">
            <div class="container1">
                <div class="buttons1">              
                    <a href="hjaadarCv.pdf" id="abouton"class="btn btn-1">
                    <svg>
                    <rect x="0" y="0" fill="none" width="100%" height="100%"/>
                    </svg>
                     CV <i class="fa fa-download" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- MES REALISATIONS -->
    <div id="works">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-8 col-md-offset-2">
                    <div class="section-title">
                        <h2>Mes réalisations</h2>
                        <hr>
                    </div>
                    <p>Développeuse web curieuse, rigoureuse, j'aime découvrir et apprendre de nouveaux languages.</p>
                </div>
            </div>
            <div class="space"></div>
        </div>
        <div class="container-fluid">
            <div class="row col-md-offset-4">
                <div class="col-md-3 col-sm-6 nopadding">
                    <div class="portfolio-item">
                        <div class="hover-bg" >
                            <a href="index.php">
                                <div class="hover-text">
                                    <h5>Site CV</h5>
                                    <p class="lead">Houda Jaadar</p>
                                    <div class="hline"></div>
                                </div>
                                <img src="front/img/photocv.png" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 nopadding">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="http://www.sentinelle-asso.org/">
                                <div class="hover-text">
                                    <h5>Site web</h5>
                                    <p class="lead">Sentinelle Association</p>
                                    <div class="hline"></div>
                                </div>
                                <img src="front/img/sentinelle.png" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>              
            </div>
        </div>


        <div class="space"></div>
        <div class="text-center">
            <a href="#experience" class="down-btn page-scroll"><span class="fa fa-angle-down"></span></a>
        </div>
    </div>

    <!-- Clients Section -->
    <div id="clients">
        <div class="overlay">
            <div class="container text-center">
                <div class="section-title">
                    <h2>Mes employeurs</h2>
                    <hr>
                </div>

                <ul class="clients">
                    <li><a href="http://lepoles.org/" target="_blank"><img src="front/img/logo/lepoles.jpg" class="img-responsive" alt="..."></a></li>
                    <li><a href="http://www.una.fr/7313-D/famille-et-sante-villeneuve-la-garenne.html" target="_blank"><img src="front/img/logo/fs.jpg" class="img-responsive" alt="..."></a></li>
                    <li><a href="https://www.sacem.fr/" target="_blank"><img src="front/img/logo/sacem.jpg" class="img-responsive" alt="..."></a></li>
                    <li><a href="https://www.allianz.fr/" target="_blank"><img src="front/img/logo/agf.jpg" class="img-responsive" alt="..."></a></li>
                    <li><a href="http://www.ad-mg.com/" target="_blank"><img src="front/img/logo/admg.png" class="img-responsive" alt="..."></a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- About Us Section -->
    <div id="experience">
       
            <div class="row text-center">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Expériences professionnelles</h2>
                        <hr>
                    </div>
                    <p>Ayant l'esprit d'équipe, polyvalente, je m'adapte rapidement en milieu professionnel.</p>
                </div>
            </div>
            <div class="space"></div>
            <div class="row text-center">
                <div class="col-md-10 col-sm-10 col-md-offset-1">
                    <div class="row text-center">
                        <?php 
                        $i=0;
                        while($i<count($experience)){
                            ?>
                        <div  class="col-md-4 col-sm-4 ">
                           <div class="team">
                               <img src="front/img/logo/<?= $experience[$i]['img_e'];?>"class="img-responsive img-circle"  alt="...">
                               <br>
                               <h3><?= $experience[$i]['dates_e']; ?></h3>
                               <h4><span id="exp"><?= $experience[$i]['titre_e'].'</span>'.' - '.$experience[$i]['sous_titre_e'];?></h4>
                               <p id="description"><?= $experience[$i]['description_e'];?></p>
                               <hr>
                           </div>
                        </div>
                                <?php
                            $i++;
                        }                        
                        ?>
                    </div>                   
                </div>
            </div>

            <div class="text-center">
                <a href="#contact" class="page-scroll down-btn">
                    <span class="fa fa-angle-down"></span>
                </a>
            </div>       
    </div>

<!-- Mes formations-->
    <div id="formation">
         
        <div id="testimonials">
            <div class="overlay">
                <div class="container">
                    <div class="section-title">
                        <h2>Mes formations</h2>
                        <hr>
                
                    </div>
                    <div id="testimonial" class="owl-carousel owl-theme">
                       <?php 
                        $i=0;
                        while($i<count($formation)){?>
                      <div class="item">
                        <h3><?= $formation[$i]['dates_f']; ?> <br><?= $formation[$i]['titre_f'].' - '.$formation[$i]['sous_titre_f'];?><br><?= $formation[$i]['description_f'];?> </h3>

                      </div>
                      <?php
                        $i++;
                        }                 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CENTRE D'INTERETS -->
  <!-- Mes compétences -->
    <div id="interet">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="section-title">
                        <h2>Mes centres d'intérêts</h2>
                        <hr>
                    </div>
                    <p><h3>Curieuse - Passionée - Aventurière</h3></p>
                </div>
            </div>

          
            <div class="row">
                <?php 

                    while($loisir = $sql->fetch()):
                  ?>      
                      <?php  if($loisir['loisir_categorie'] == 'cuisine'):?>                
                <div class="col-md-3 col-sm-4 centre" >
                    <div class="service centre">
                     <span class="fa fa-cutlery "aria-hidden="true"></span>
                     <h4>Cuisine</h4>
                     <?=$loisir['loisir']; ?>
                    </div>
                </div>

                <?php elseif($loisir['loisir_categorie'] == 'cinema'): ?>
                 <div class="col-md-3 col-sm-4 ">
                    <div class="service centre">       
                        <span class="fa fa-film "aria-hidden="true"></span>
                        <h4>Cinéma</h4>
                     <?=$loisir['loisir']; ?>
                     </div>
                </div>


                 <?php elseif($loisir['loisir_categorie'] == 'sport'):?>
                <div class="col-md-3 col-sm-4">
                    <div class="service centre" >
                        <span class="fa fa-trophy "aria-hidden="true"></span>
                        <h4>Sport</h4>
                     <?=$loisir['loisir']; ?>
                    </div>
                </div>

                 <?php elseif($loisir['loisir_categorie'] == 'photographie'):?>
                 <div class="col-md-3 col-sm-4">
                    <div class="service centre" >
                        <span class="fa fa-camera "aria-hidden="true"></span>
                        <h4>Photographie</h4>
                     <?=$loisir['loisir']; ?>
                    </div>
                </div>
                <?php endif;?>
                <?php endwhile?>
                
            </div>
        </div>
    </div>
        <!-- FIN Mes compétences -->

    <!-- FIN CENTRE D'INTERET -->

    <!-- Contact Section -->
    <div id="contact">
        <div class="container">
            <div class="section-title text-center">
                <h2>Contactez moi</h2>
                <hr>
            </div>
            <div class="space"></div>

            <div class="row">
                <div class="col-md-3">
                    <address>
                        <strong>Adresse</strong><br>
                        <br>
                        <?php 
                        $sql = $pdoCV->query("SELECT * FROM t_utilisateur");
                        $resultat = $sql->fetch();
                        echo '<p id="ad">'.$resultat['prenom'].' '.$resultat['nom'].'<br>';
                        echo $resultat['email'].'<br/>';
                        echo $resultat['telephone'].'<br/>';
                        echo $resultat['ville'].'<br/>';
                        echo $resultat['code_postal'].' - '.$resultat['pays'].'<br/></p>';
                         ?>
                        <ul class="social">
                            <li><a href="https://www.facebook.com/houda.canyon" target="_blank"><span class="fa fa-facebook"></span></a></li>
                            <li><a href="https://github.com/Houdaja" target="_blank"><span class="fa fa-github"></span></a></li>
                            <li><a href="https://www.linkedin.com/in/houda-jaadar-64a667100" target="_blank"><span class="fa fa-linkedin"></span></a></li>
                            <li><a href="https://www.instagram.com/denosfenetres" target="_blank"><span class="fa fa-instagram"></span></a></li>
                          </ul>
                    </address>
                </div>

                <div class="col-md-9">
                    <div id="messageRetour"></div>
                    <form autocomplete="off" method="POST" class="formulaire" id="formulaire">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control nom" placeholder="Votre nom" name="nom" id="nom">
                                <input type="text" class="form-control telephone" placeholder="Vos coordonnées téléphoniques" name="telephone" id="telephone">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control email" placeholder="Email" name="email" id="email">
                                <input type="text" class="form-control objet" placeholder="Objet" name="objet" id="objet">
                            </div>
                        </div>
                        <textarea class="form-control message" rows="4" placeholder="Message" name="message" id="message"></textarea>
                        <div class="text-right">
                            <button id="btnForm" class="btn send-btn">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <nav id="footer">
        <div class="container">
             <div class="pull-left">
             <?php date_default_timezone_set('Europe/Paris'); ?>
             <p>Copyright © <?= date('Y').' - ' .$utilisateur['prenom'].' ' .$utilisateur['nom'];?></p>
            </div>
            <div class="pull-right"> 
                <a href="#home" class="page-scroll">Retourner en haut<span class="fa fa-angle-up"></span></a>
            </div>
        </div>
    </nav>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  
    <script type="text/javascript" src="front/js/jquery.1.11.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="front/js/bootstrap.js"></script>
    <script type="text/javascript" src="front/js/SmoothScroll.js"></script>
    <script type="text/javascript" src="front/js/jasny-bootstrap.min.js"></script>
    <script src="front/js/scriptFront.js"></script>
    <script src="front/js/owl.carousel.js"></script>
    <script src="front/js/typed.js"></script>
    <script>
      $(function(){
          $("#head-title").typed({
            strings: ["Développeuse, intégratrice Web" ,"Disponible et motivée"],
            typeSpeed: 100,
            loop: true,
            startDelay: 100
          });
      });
    </script>

    <!-- Javascripts
    ================================================== -->
    <script type="text/javascript" src="front/js/main.js"></script>

  </body>
</html>