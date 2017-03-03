<?php require("../connexion/connexion.php"); 
 
session_start(); 

// TRAITEMENT POUR SUPPRIMER UNE COMPETENCE PRO
if(isset($_GET['action']) && $_GET['action'] == 'suppression'){ // Si une action de supprimer un produit est demandée dans l'url : 
  
  $resultat = $pdoCV -> prepare('DELETE FROM t_experiences WHERE id_experiences = :id_experiences');
  $resultat -> bindParam(':id_experiences', $_GET['id'], PDO::PARAM_INT);
  $resultat -> execute();
  header('location:?action=affichageModification');   
}

// TRAITEMENT POUR MODIFIER OU AJOUTER UNE EXPERIENCE
if($_POST){

  if(isset($_GET['action']) && $_GET['action'] == 'affichageModification' && isset($_GET['id'])){
  
    $resultat = $pdoCV -> prepare("UPDATE t_experiences SET titre_e = :titre_e , sous_titre_e = :sous_titre_e, dates_e = :dates_e, description_e = :description_e, img_e = :img_e WHERE id_experience = :id_experience ");
    $resultat -> bindParam(':titre_e', $_POST['titre_e'], PDO::PARAM_STR);
    $resultat -> bindParam(':sous_titre_e', $_POST['sous_titre_e'], PDO::PARAM_STR);
    $resultat -> bindParam(':dates_e', $_POST['dates_e'], PDO::PARAM_STR);
    $resultat -> bindParam(':description_e', $_POST['description_e'], PDO::PARAM_STR);
    $resultat -> bindParam(':img_e', $_POST['img_e'], PDO::PARAM_STR);
    $resultat -> bindParam(':id_experience', $_GET['id'], PDO::PARAM_INT);
    $resultat -> execute(); 

    header('location:?action=affichageModification');
  }else{
    $resultat = $pdoCV -> prepare("INSERT INTO t_experiences (titre_e , sous_titre_e, dates_e, description_e, img_e) VALUES (:titre_e , :sous_titre_e, :dates_e, :description_e, :img_e)");
    $resultat -> bindParam(':titre_e', $_POST['titre_e'], PDO::PARAM_STR);
    $resultat -> bindParam(':sous_titre_e', $_POST['sous_titre_e'], PDO::PARAM_STR);
    $resultat -> bindParam(':dates_e', $_POST['dates_e'], PDO::PARAM_STR);
    $resultat -> bindParam(':description_e', $_POST['description_e'], PDO::PARAM_STR);
    $resultat -> bindParam(':img_e', $_POST['img_e'], PDO::PARAM_STR);
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

    <title>Site CV - Expérience professionelle</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="../ckeditor/ckeditor.js"></script>
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
          <li>
            <a href="competence.php?action=affichageModification"><i class="fa fa-cubes" aria-hidden="true"></i> Compétences</a>
          </li>
    
          <li class="active">
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
            <h1 class="page-header"> Table t_experiences </h1>
              <ol class="breadcrumb">
                <li>
                  <i class="fa fa-home" aria-hidden="true"></i>  <a href="index.php"> Acceuil</a>
                </li>
                <li class="active">
                  <i class="fa fa-briefcase" aria-hidden="true"></i> Expériences
                </li>
              </ol>
          </div>
        </div>

        <!-- /.row -->              
        <div class="row">
          <div class="col-lg-12">
           <?php
              $sql = $pdoCV->query("SELECT * FROM t_experiences");
              $sql->execute();
              $nbr_experience = $sql->rowCount();//affiche et compte les compétences
              ?>
              <div class="table-responsive">
              <p class="nbr">Vous avez <?php echo $nbr_experience; ?> expériences dans votre base de donnée.</p> 

<?php // AFFICHAGE
if(isset($_GET['action']) && $_GET['action'] == 'affichageModification'){ //Si une action est demandée via l'URL et que cette action c'est l'affichage.
  $donnee = $pdoCV->query("SELECT * FROM t_experiences"); ?>

              <table class="table table-hover table-striped">
                <thead>
                  <tr>
                    <th>Poste</th>
                    <th>Entreprise</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Logo</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                  </tr>
                </thead>
                <tbody>
<?php while ( $experience = $donnee -> fetch(PDO::FETCH_ASSOC ) ) {   
        echo '<tr><td>'. $experience['titre_e'] . '</td><td>' . $experience['sous_titre_e'] . '</td><td>'. $experience['dates_e'] . '</td><td>' . $experience['description_e'] . '</td><td>' . $experience['img_e'] . '</td><td>';
        echo '<td><a href="?action=affichageModification&id='. $experience['id_experience'] .'"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>';
        echo '<td><a href="?action=suppression&id='. $experience['id_experience'] .'"><i class="fa fa-times" aria-hidden="true"></i></a></td>';
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
// Si une action est demandée dans l'URL et que cette action est soit "modification" SOIT "ajout" alors on va afficher le formulaire. 
  
        //Modification : j'ai un id_produit dans l'URL
        if(isset($_GET['id'])){ // S'il y a un id_produit dans l'url on est dans le cadre d'une modification et on récupère les infos de ce produit pour les insérer dans le formulaire. 
          $resultat = $pdoCV -> prepare("SELECT * FROM t_experiences WHERE id_experience = :id_experience");
          $resultat -> bindParam(':id_experience', $_GET['id'], PDO::PARAM_INT);
          $resultat -> execute();
          // je récupère un array avec toutes les infos du produit à modifier : 
           $experience = $resultat -> fetch(PDO::FETCH_ASSOC);
        }
          
        $id_experience =   (isset($experience['id_experience']))  ? $experience['id_experience'] : '';
        $titre_e =  (isset($experience['titre_e']))   ? $experience['titre_e'] : '';
        $sous_titre_e =  (isset($experience['sous_titre_e']))   ? $experience['sous_titre_e'] : '';
        $dates_e =  (isset($experience['dates_e']))   ? $experience['dates_e'] : '';
        $description_e =  (isset($experience['description_e']))   ? $experience['description_e'] : '';
        $img_e =  (isset($experience['img_e']))   ? $experience['img_e'] : '';
        $bouton =     (isset($xp['id_xp']))        ? 'Modifier' : 'Enregistrer';
//Ajout : je n'ai pas d'id_produit dans l'URL ?>

        <div class="row">
          <div class="col-lg-offset-3 col-lg-6">
            <h2>Formulaire d'ajout et de modification d'une expérience</h2>
            <form action="" method="post" enctype="multipart/form-data">

              <input type="hidden" name="id_xp" value="<?= $id_experience ?>" />

              <div class="form-group">
                <label>Poste</label>
                <input class="form-control" placeholder="ex: 20/2010 - 05/2011" type="text" name="titre_e" value="<?= $titre_e ?>"/>

                <label>Entreprise </label>
                <input class="form-control" placeholder="ex: Vendeur" type="text" name="sous_titre_e" value="<?= $sous_titre_e ?>"/>

                <label>Date</label>
                <input class="form-control" placeholder="ex: Carrefour" type="text" name="dates_e" value="<?= $dates_e ?>"/>


                <label>Description</label>
                <textarea class="form-control" id="editor1" name="description_e" value="" size="100" cols="80" rows="10" required> <?= $description_e ?></textarea>
                <script>CKEDITOR.replace('editor1');</script>
                

                <label>logo</label>
                <input class="form-control" placeholder="ex: Paris" type="text" name="img_e" value="<?= $img_e ?>"/>
                                                          
              </div>

              <button class="btn btn-primary col-md-offset-5 col-xs-offset-4"><?= $bouton ?></button>
            </form>
          </div>
        </div>

<?php   }?>

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
