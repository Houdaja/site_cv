<?php require("../connexion/connexion.php"); 

session_start();

if (isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connecté') {
    $id_utilisateur=$_SESSION['id_utilisateur'];
    $prenom=$_SESSION['prenom'];
    $nom=$_SESSION['nom'];
}else{
    header('location:authentification.php');
}

$donnee = $pdoCV->query("SELECT * FROM t_utilisateur"); 
        $donnee->execute();
        $count_utilisateur = $donnee->rowCount();

$donnee = $pdoCV->query("SELECT * FROM t_experiences"); 
        $donnee->execute();
        $count_experience = $donnee->rowCount();

$donnee = $pdoCV->query("SELECT * FROM t_formations"); 
        $donnee->execute();
        $count_formation = $donnee->rowCount();

$donnee = $pdoCV->query("SELECT * FROM t_loisir"); 
        $donnee->execute();
        $count_loisir = $donnee->rowCount();

$donnee = $pdoCV->query("SELECT * FROM t_competences"); 
        $donnee->execute();
        $count_competence = $donnee->rowCount();

$donnee = $pdoCV->query("SELECT * FROM t_realisations"); 
        $donnee->execute();
        $count_realisation = $donnee->rowCount();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://use.fontawesome.com/30a190e011.js"></script>
   
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <title>Site CV - Administratif</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css"  href="css/styleAdmin.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<body id="fond">
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Top Menu Items -->
            <!-- Menu deroulant gauche -->
            <ul class="nav navbar-right top-nav">  
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $prenom . ' ' . $nom ;  ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="../index.php"><i class="fa fa-diamond" aria-hidden="true"></i>Accès au site</a>
                        </li>
                        <li>
                            <a href="contact.php?action=affichageModification"><i class="fa fa-fw fa-envelope"></i> Boite de réception</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <!-- <a id="deco" href="../index.php?deconnect">Deconnexion</a> -->
                            <a href="../connexion/deconnexion.php"><i class="fa fa-fw fa-power-off"></i>Déconnexion</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <!-- Menu droite -->
  <!-- Sidebar Menu -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
          <li class="active">
            <a href="index.php?action=affichageModification"><i class="fa fa-home"></i> Acceuil</a>
          </li>
          <li>
            <a href="utilisateur.php?action=affichageModification"><i class="fa fa-address-card-o" aria-hidden="true"></i> Profil</a> 
          </li>
           <li>
            <a href="autreCompetences.php?action=affichageModification"><i class="fa fa-plus" aria-hidden="true"></i> Compétences numérique</a>
          </li>
          <li>
            <a href="competence.php?action=affichageModification"><i class="fa fa-cubes" aria-hidden="true"></i> Compétences</a>
          </li>
    
          <li>
            <a href="experience.php?action=affichageModification"><i class="fa fa-briefcase" aria-hidden="true"></i> Expériences</a> 
          </li>
          <li>
            <a href="formation.php?action=affichageModification"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Formations</a>
          </li>
          <li>
            <a href="loisir.php?action=affichageModification"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Centre d'intérêts</a>
          <li>
            <a href="contact.php?action=affichageModification"><i class="fa fa-commenting-o" aria-hidden="true"></i> Messages</a>
          </li>
        </ul>
      </div>
        <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 id="adminitratif" class="page-header">Site Cv administratif de <?php echo $prenom . ' ' . $nom ;  ?></h1>
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-home" aria-hidden="true"></i> Accueil
                            </li>
                        </ol>
                    </div>
                            <?php    echo '<p id="heure"> Nous sommes le ' . DATE('d/m/y') . ' et il est ' . DATE('H:i') . ' heures.</p>'; ?>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-table" aria-hidden="true"></i> Tables</h3>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">



                                    <a href="utilisateur.php?action=affichageModification" class="list-group-item">
                                       <span class="badge"> Voir le profil</span>
                                        <i class="fa fa-address-card-o" aria-hidden="true"></i> Profil
                                    </a>

                                    <a href="competence.php?action=affichageModification" class="list-group-item">
                                    <?php
                                      $sql = $pdoCV->query("SELECT * FROM t_competences");
                                      $sql->execute();
                                      $nbr_competence = $sql->rowCount();//affiche et compte les compétences
                                      ?>                                   
                                        <span class="badge">Vous avez <?php echo $nbr_competence; ?> compétences dans votre base de donnée.</span>
                                        <i class="fa fa-cubes" aria-hidden="true"></i> Compétences
                                    </a>

                                    <a href="experience.php?action=affichageModification" class="list-group-item">
                                       <?php
                                      $sql = $pdoCV->query("SELECT * FROM t_experiences");
                                      $sql->execute();
                                      $nbr_experiences = $sql->rowCount();//affiche et compte les compétences
                                      ?>                                   
                                        <span class="badge">Vous avez <?php echo $nbr_experiences; ?> experiences dans votre base de donnée.</span>
                                        <i class="fa fa-briefcase" aria-hidden="true"></i> Experiences
                                    </a>



                                    <a href="formation.php?action=affichageModification" class="list-group-item">
                                        <?php
                                      $sql = $pdoCV->query("SELECT * FROM t_formations");
                                      $sql->execute();
                                      $nbr_formation = $sql->rowCount();//affiche et compte les compétences
                                      ?>                                   
                                        <span class="badge">Vous avez <?php echo $nbr_formation; ?> formations dans votre base de donnée.</span>
                                        <i class="fa fa-graduation-cap" aria-hidden="true"></i> Formations
                                    </a>

                                    <a href="loisir.php?action=affichageModification" class="list-group-item">
                                        <?php
                                      $sql = $pdoCV->query("SELECT * FROM t_loisir");
                                      $sql->execute();
                                      $nbr_loisir = $sql->rowCount();//affiche et compte les compétences
                                      ?>                                   
                                        <span class="badge">Vous avez <?php echo $nbr_loisir; ?> centres d'intérêts dans votre base de donnée.</span>
                                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Centre d'intérêts
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-lg-offset-1 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <!-- <i class="fa fa-comments fa-5x"></i> -->
                                        <i class="fa fa-envelope-o fa-5x"></i>
                                    </div>

                                        <?php   
                                        $donnee = $pdoCV->query("SELECT * FROM t_contact WHERE vu = 0"); 
                                        $donnee->execute();
                                        $count = $donnee->rowCount();
                                        if ($count == 0) { ?> 
                                          
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?= $count ?></div>
                                        <div>Aucun nouveau message</div>
                                    </div>

                                <?php   }elseif($count == 1){ ?>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?= $count ?></div>
                                        <div>Nouveau message</div>
                                    </div>

                                <?php   }elseif($count > 1){ ?>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?= $count ?></div>
                                        <div>Nouveaux messages</div>
                                    </div>

                                <?php   } ?>                                  

                                </div>
                            </div>
                            <a href="contact.php?action=affichageModification">
                                <div class="panel-footer">


        <table> 
                <?php while($contact = $donnee -> fetch(PDO::FETCH_ASSOC ) ):?>

                        <?php $message = substr($contact['message'],0,30); ?>
                        <?php $contact = substr($contact['email'],0,30); ?>
                        <tr>    
                            <td> <span class="pull-left"><?=$contact.' '.$message?></span> </td>
                           
                            <td><span class="pull-right"> <i class="fa fa-arrow-circle-right" style="display:inline-block; margin-left:5px;"> </i> </span></td>
                        </tr>

                <?php endwhile;?>

        </table>
        
                                <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
    <script src="https://use.fontawesome.com/30a190e011.js"></script>
</body>
</html>