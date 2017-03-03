<?php require("../connexion/connexion.php"); 
 
session_start(); 

// TRAITEMENT POUR SUPPRIMER UNE COMPETENCE 
if(isset($_GET['action']) && $_GET['action'] == 'suppression'){ // Si une action de supprimer un produit est demandée dans l'url : 
  
  $resultat = $pdoCV -> prepare('DELETE FROM t_contact WHERE id_contact = :id_contact');
  $resultat -> bindParam(':id_contact', $_GET['id'], PDO::PARAM_INT);
  $resultat -> execute();
  header('location:?action=affichageModification'); 
}
if(isset($_GET['id_contact'])){

                $vu = $pdoCV -> prepare("UPDATE t_contact SET vu = 1 WHERE id_contact = :id_contact ");
                $vu->bindParam(':id_contact',$_GET['id_contact'],PDO::PARAM_STR);
                $vu->execute();
                header('location:contact.php?action=affichageModification');
 } 

$donnee = $pdoCV->query("SELECT * FROM t_utilisateur");
$utilisateur = $donnee->fetch();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Site CV - Contact</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="https://use.fontawesome.com/30a190e011.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
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
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $utilisateur['prenom'] . ' ' . $utilisateur['nom'] ;  ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">  
                        <li>
                            <a href="../index.php"><i class="fa fa-diamond" aria-hidden="true"></i> Accès au site</a>
                        </li>                    
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Boite réception</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../connexion/deconnexion.php"><i class="fa fa-fw fa-power-off"></i> Déconnexion</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

 <!-- Sidebar Menu -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
          <li>
            <a href="index.php?action=affichageModification"><i class="fa fa-home"></i> Acceuil</a>
          </li>
          <li>
            <a href="utilisateur.php?action=affichageModification"><i class="fa fa-address-card-o" aria-hidden="true"></i> Profil</a> 
          </li>
           <li>
            <a href="autreCompetences.php?action=affichageModification"><i class="fa fa-plus" aria-hidden="true"></i> Compétences numérique</a>
          </li>
          <li>
            <a href="competence.php?action=affichageModification"><i class="fa fa-cubes" aria-hidden="true"></i></i> Compétences</a>
          </li>
    
          <li>
            <a href="experience.php?action=affichageModification"><i class="fa fa-briefcase" aria-hidden="true"></i> Expériences</a> 
          </li>
          <li>
            <a href="formation.php?action=affichageModification"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Formations</a>
          </li>
          <li>
            <a href="loisir.php?action=affichageModification"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Centre d'intérêts</a>
        </li>
          <li class="active">
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
                        <h1 class="page-header">Table t_contact</h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>  <a href="index.php">Acceuil</a>
                            </li>
                            <li class="active">
                               <i class="fa fa-commenting-o" aria-hidden="true"></i> Messages

                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
 
                <div class="row">
                    <div class="col-lg-12">
            <?php
            $sql = $pdoCV->query("SELECT * FROM t_contact");
            $sql->execute();
            $nbr_contact = $sql->rowCount();//affiche et compte les compétences
            ?>
                        <p class="nbr">Vous avez <?php echo $nbr_contact; ?> messages dans votre base de donnée.</p>                   
                        <div class="table-responsive">
                        <?php   if(isset($_GET['action']) && $_GET['action'] == 'affichageModification')
                         { //Si une action est demandée via l'URL et que cette action c'est l'affichage.
                        $donnee = $pdoCV->query("SELECT * FROM t_contact"); ?>

                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Objet</th>
                                        <th>Message</th>
                                        <th>Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody>
        <?php
            while ( $contact = $donnee -> fetch(PDO::FETCH_ASSOC ) ) {

                if($contact['vu'] != 1){
                echo '<tr><td>'. $contact['nom'] . '</td><td>' . $contact['email'] . '</td><td>' . $contact['telephone'] . '</td><td>' . $contact['objet'] . '</td><td>' . $contact['message']. '</td>';
                echo'<td><a href="contact.php?id_contact='.$contact['id_contact'].'">Message non lu</a></td>';
                echo '<td><a href="?action=suppression&id='. $contact['id_contact'] .'"><i class="fa fa-times" aria-hidden="true"></i></a></td>';
                echo '</tr>';
                    
                }else{
                    echo '<tr id="messagerie"><td>'. $contact['nom'] . '</td><td>' . $contact['email'] . '</td><td>' . $contact['telephone'] . '</td><td>' . $contact['objet'] . '</td><td>'.$contact['message'].'</td>';
                echo'<td>Message lu</td>';
                echo '<td><a href="?action=suppression&id='. $contact['id_contact'] .'"><i class="fa fa-times" aria-hidden="true"></i></a></td>';
                echo '</tr>';
                }
            }
            echo '</table>';


        } ?>
                                </tbody>
                            </table>
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

</body>
</html>