<?php require("../connexion/connexion.php"); 

session_start(); 

// TRAITEMENT POUR SUPPRIMER UNE COMPETENCE
if(isset($_GET['action']) && $_GET['action'] == 'suppression'){ // Si une action de supprimer un produit est demandée dans l'url : 

$resultat = $pdoCV -> prepare('DELETE FROM t_competences WHERE id_competence = :id_competence');
$resultat -> bindParam(':id_competence', $_GET['id'], PDO::PARAM_INT);
$resultat -> execute();
header('location:?action=affichageModification');
}

// TRAITEMENT POUR MODIFIER OU AJOUTER UNE COMPETENCE
// TRAITEMENT POUR MODIFIER OU AJOUTER UNE COMPETENCE
if($_POST){

  if(isset($_GET['action']) && $_GET['action'] == 'affichageModification' && isset($_GET['id'])){
  
    $resultat = $pdoCV -> prepare("UPDATE t_competences SET competence = :competence , niveau = :niveau, specificite = :specificite WHERE id_competence = :id_competence ");
    $resultat -> bindParam(':competence', $_POST['competence'], PDO::PARAM_STR);
    $resultat -> bindParam(':niveau', $_POST['niveau'], PDO::PARAM_STR);
    $resultat -> bindParam(':specificite', $_POST['specificite'], PDO::PARAM_STR);
    $resultat -> bindParam(':id_competence', $_GET['id'], PDO::PARAM_INT);
    $resultat -> execute(); 

    header('location:?action=affichageModification');
  }else{
    $resultat = $pdoCV -> prepare("INSERT INTO t_competences (competence , niveau, specificite) VALUES (:competence , :niveau, :specificite)");
    $resultat -> bindParam(':competence', $_POST['competence'], PDO::PARAM_STR);
    $resultat -> bindParam(':niveau', $_POST['niveau'], PDO::PARAM_STR);
    $resultat -> bindParam(':specificite', $_POST['specificite'], PDO::PARAM_STR);

    $resultat -> execute(); 

    header('location:?action=affichageModification');
  }  
}

$sql = $pdoCV->query("SELECT * FROM t_utilisateur");
$utilisateur = $sql->fetch();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Site CV - Compétences</title>

  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="https://use.fontawesome.com/30a190e011.js"></script>
  <!-- Custom CSS -->
  <link href="css/sb-admin.css" rel="stylesheet">
  <!-- Custom Fonts -->
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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

      <!-- Menu Haut -->
      <ul class="nav navbar-right top-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $utilisateur['prenom'] . ' ' . $utilisateur['nom'] ;  ?> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li>
              <a href="../index.php"><i class="fa fa-diamond" aria-hidden="true"></i> Accès au site</a>
            </li>                       
            <li>
              <a href="#"><i class="fa fa-fw fa-envelope"></i> Boite de réception</a>
            </li>
            <li class="divider"></li>
            <li>
             <a href="../connexion/deconnexion.php"><i class="fa fa-fw fa-power-off"></i> Déconnexion</a>
           </li>
         </ul>
        </li>
      </ul>

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
          <li class="active">
            <a href="competence.php?action=affichageModification"><i class="fa fa-cubes" aria-hidden="true"></i> Compétences</a>
          </li>
    
          <li>
            <a href="experience.php?action=affichageModification"><i class="fa fa-briefcase" aria-hidden="true"></i> Expériences</a> 
          </li>
          <li>
            <a href="formation.php?action=affichageModification"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Formations</a>
          </li>
          <li >
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
            <h1 class="page-header"> Table t_competences </h1>
            <ol class="breadcrumb">
              <li>
                <i class="fa fa-home" aria-hidden="true"></i>  <a href="index.php"> Acceuil</a>
              </li>
              <li class="active">
                <i class="fa fa-cubes" aria-hidden="true"></i> Compétences 
              </li>
            </ol>
          </div>
        </div>

        <!-- /.row -->
        <div class="row">
          <div class="col-lg-12">
            <?php
              $sql = $pdoCV->query("SELECT * FROM t_competences");
              $sql->execute();
              $nbr_competence = $sql->rowCount();//affiche et compte les compétences
              ?>
              <div class="table-responsive">
              <p class="nbr">Vous avez <?php echo $nbr_competence; ?> compétences dans votre base de donnée.</p> 

<?php // AFFICHAGE
if(isset($_GET['action']) && $_GET['action'] == 'affichageModification'){ //Si une action est demandée via l'URL et que cette action c'est l'affichage.
$donnee = $pdoCV->query("SELECT * FROM t_competences"); ?>

              <table class="table table-hover table-striped">
                <thead>
                  <tr>
                    <th>Compétence</th>
                    <th>niveau</th>
                    <th>specificite</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                  </tr>
                </thead>
                <tbody>

<?php  while ( $competences = $donnee -> fetch(PDO::FETCH_ASSOC ) ) {
      echo '<tr><td>'. $competences['competence'] . '</td><td>' . $competences['niveau'] . '%</td><td>'. $competences['specificite'] .'</td>';
      echo '<td><a href="?action=affichageModification&id='. $competences['id_competence'] .'"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>';
      echo '<td><a href="?action=suppression&id='. $competences['id_competence'] .'"><i class="fa fa-times" aria-hidden="true"></i></a></td>';
      echo '</tr>';
    }
    echo '</table>';        
  } ?> 

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- /.row -->

<?php if(isset($_GET['action']) && ($_GET['action'] == 'affichageModification')){
// Si une action est demandée dans l'URL et que cette action est soit "affichageModification" alors on va afficher le formulaire. 

  //Modification : j'ai un id_produit dans l'URL
  if(isset($_GET['id'])){ // S'il y a un id_produit dans l'url on est dans le cadre d'une modification et on récupère les infos de ce produit pour les insérer dans le formulaire. 
  $resultat = $pdoCV -> prepare("SELECT * FROM t_competences WHERE id_competence = :id_competence");
  $resultat -> bindParam(':id_competence', $_GET['id'], PDO::PARAM_INT);
  $resultat -> execute();
  // je récupère un array avec toutes les infos du produit à modifier : 
  $competences = $resultat -> fetch(PDO::FETCH_ASSOC);
}

$id_competence =   (isset($competences['id_competence']))  ? $competences['id_competence'] : '';
$competence =  (isset($competences['competence']))   ? $competences['competence'] : '';
$niveau =  (isset($competences['niveau']))   ? $competences['niveau'] : ''; 
$specificite =  (isset($competences['specificite']))   ? $competences['specificite'] : ''; 
$bouton =     (isset($competences['id_competence']))        ? 'Modifier' : 'Enregistrer';

//Ajout : je n'ai pas d'id_produit dans l'URL ?>

<!-- AFFICHAGE D'UN FORMULAIRE POUR ENREGISTRER ET MODIFIER UN PRODUIT-->
        <div class="row">
          <div class="col-lg-offset-3 col-lg-6">
            <h2>Formulaire d'ajout et de modification d'une compétence</h2>
            <form action="" method="post" enctype="multipart/form-data">

              <input type="hidden" name="id_competence" value="<?= $id_competence ?>" />

              <div class="form-group">
                <label>Compétence :</label>
                <input class="form-control" placeholder="ex: AJAX" type="text" name="competence" value="<?= $competence ?>"/>

                <label>Niveau : </label>
                <input class="form-control" placeholder="ex: 65" type="text" name="niveau" value="<?= $niveau ?>"/>
              
                 <label>Spécificité</label>
                    <select name="specificite">                   
                        <option value="front" <?= ($specificite == 'front') ? 'selected' : ''; ?>>Front</option>
                        <option  value="back" <?= ($specificite == 'back') ? 'selected' : ''; ?>>Back</option>
                    </select> 

              </div>

              <button class="btn btn-primary col-md-offset-5 col-xs-offset-4"><?= $bouton ?></button>
            </form>
          </div>
        </div>

<?php   } ?>
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