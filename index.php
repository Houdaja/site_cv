
<?php require 'connexion/connexion.php';?>
<?php
$sql = $pdoCV->query("SELECT * FROM t_utilisateur");
$utilisateur = $sql->fetch();

$sql = $pdoCV->query("SELECT * FROM t_experiences");
$experience = $sql->fetchAll();

$sql = $pdoCV->query("SELECT * FROM t_formations");
$formation = $sql->fetchAll();
?>


<?php
  //COMPETENCES 
    $sql_comp = $pdoCV->query("SELECT * FROM t_competences");
    $sql_comp -> execute();
    $nb_comp= $sql_comp->rowCount();
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $utilisateur['prenom'].' ' .$utilisateur['nom'];?> - Developpeuse & Integratrice Web</title>

    <!-- Bootstrap Core CSS -->
    <link href="front/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="front/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="front/css/agency.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="front/css/styleFront.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"><?php echo $utilisateur['prenom'].' ' .$utilisateur['nom'];?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">A propos</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">Expériences</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Compétences</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#formation">Formations</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#interet">Intérêts</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text row">
                <div class="intro-heading col-lg-7 col-lg-offset-5"><?php echo $utilisateur['prenom'].' ' .$utilisateur['nom'];?></div>
                <div class="intro-lead-in col-lg-7 col-lg-offset-5 text-left">
                    
                    <div class="sp"><span >Développeuse</span></div>                 
                    <div class="sp"><span >Intégratrice</span></div>
                    <div class="sp"><span >Web</span></div>
                </div>
                <div>   
                <a href="#services" class="page-scroll btn btn-xl" >En savoir plus</a>
                </div>
            </div>
        </div>
    </header>

    <!-- A propos-->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">A propos</h2>
                    <h3 class="section-subheading text-muted">Mon profil en quelques mots.</h3>
                    <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. 
                    Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla
                    ensemble des mots texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles,</p>
                </div>
            </div>			
        </div>
    </section>


	<!-- Mes expériences -->
 	<section id="about" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Experiences</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                   <?php 
                    $i=0;
                    while($i<count($experience)){
                            ?><li <?php if (($i % 2) == 0)
                                { echo 'class="timeline-inverted"';}?>>
                                <div class="timeline-image">
                                    <img class="img-circle img-responsive" id="img_e" src="front/img/about/<?= $experience[$i]['img_e'];?>" alt="" style="width:160px;  height:160px;" >
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4><?= $experience[$i]['dates_e']; ?></h4>
                                            <h4 class="subheading"><?= $experience[$i]['titre_e'].' - '.$experience[$i]['sous_titre_e'];?></h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted"><?= $experience[$i]['description_e'];?></p>
                                    </div>
                                </div>
                            </li><?php
                            $i++;
                    }                        
                     ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
 


 <!-- Mes compétences -->
     <section id="portfolio" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Compétences</h2>
                    <h3 class="section-subheading text-muted">Je m'adapte et m'intègre à tout type de situations.</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-6">
                    <span class="fa-stack fa-4x">
                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                    <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Front-end</h4>
                    <p class="text-muted">HTML / CSS / Boostrap </p>
                    </div>
                <div class="col-md-6">
                    <span class="fa-stack fa-4x">
                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                    <i class="fa fa-spinner fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Back-end</h4>
                    <p class="text-muted">PHP / MySQL</p>
                </div>           
            </div>
            <div class="col-lg-6 col-lg-offset-3" >
            <?php
            while ($resultat=$sql_comp->fetch()){
            echo '<tr><td>'.$resultat['competence'].' <div class="progress"><div class="progress-bar progress-bar-success" style="width: '.$resultat['niveau'].'%;"></div></div></td></tr>';
            }?>
            </div>
        </div> 
    </section>

    <!-- Mes formations -->
    <section id="formation" class="bg-light-gray">
        <div class="container">
             <div class="row">
                <div class="col-lg-12 text-center">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-graduation-cap fa-stack-1x fa-inverse"></i>
                    </span>
                    <h2 class="section-heading">Mes formation</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
           
            <?php
                $i=0;
                while($i<count($formation)){?>
                <div class="col-md-6">
                <h4 class="service-heading"><?= $formation[$i]['titre_f'].' - '.$formation[$i]['sous_titre_f']; ?></h4>
                <p class="text-muted"><?= $formation[$i]['dates_f'].'<br>'.$formation[$i]['description_f'];?></p>
                </div>
                 <?php
                 $i++;
             }

                 ?>
           
        </div>
    </section>

 <!-- Mes interets -->
     <section id="interet" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Intérêts</h2>
                    <h3 class="section-subheading text-muted">Curieuse - Passionnée - Aventurière</h3>
                </div>
            </div>
            <div class="row text-center">
              <div class="col-md-3">
                    <span class="fa-stack fa-4x">
                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                    <i class="fa fa-camera fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Photographie</h4>
                    <p class="text-muted">J'aime immortaliser un moment que la nature nous offre.</p>
                </div>
                <div class="col-md-3">
                    <span class="fa-stack fa-4x">
                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                    <i class="fa fa-trophy fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Sport</h4>
                    <p class="text-muted">Basket-ball en club / Athlétisme</p>
                </div>
                <div class="col-md-3">
                    <span class="fa-stack fa-4x">
                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                    <i class="fa fa-cutlery fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Cuisine</h4>
                    <p class="text-muted">Essayer de nouvelles recettes, mijoter de petits plats et séduire les papilles de mes convives.</p>
                </div>  
                <div class="col-md-3">
                    <span class="fa-stack fa-4x">
                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                    <i class="fa fa-film fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Cinéma</h4>
                    <p class="text-muted">S'interroger sur un thriller, moment d'émotion avec un film romantique ou  retomber en enfance avec un disney.</p>
                </div>              
            </div>
            <div class="col-lg-6 col-lg-offset-3" >
            <?php
            while ($resultat=$sql_comp->fetch()){
            echo '<tr><td>'.$resultat['competence'].' <div class="progress"><div class="progress-bar progress-bar-success" style="width: '.$resultat['niveau'].'%;"></div></div></td></tr>';
            }?>
            </div>
        </div> 
    </section>


















<!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact</h2>
                    <h3 class="section-subheading text-muted">Besoin d'un devis pour un projet Web ?</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Votre nom *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Votre email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Vos coordonnées téléphonique *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Votre message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright © <?php echo DATE('Y').' - ' .$utilisateur['prenom'].' ' .$utilisateur['nom'];?></span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>


<!-- **************
********************
******************
******************
*********************
********************
*    mettre mon cv a télécharger ici -->

    <!-- jQuery -->
    <script src="front/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="front/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="front/js/jqBootstrapValidation.js"></script>
    <script src="front/js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="front/js/agency.min.js"></script>

</body>

</html>
